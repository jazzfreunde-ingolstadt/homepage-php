<?php declare(strict_types=1);

namespace Jazzfreunde\App\Message\Handler\Email;

use Jazzfreunde\App\Message\Messages\Email\EmailNotification;
use Doctrine\Persistence\ManagerRegistry;
use InvalidArgumentException;
use Jazzfreunde\App\Entity\KnownMail;
use Jazzfreunde\App\Message\Exception\MailException;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerAwareInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Message handler for sending emails
 * @psalm-api
 */
#[AsMessageHandler(method: 'send')]
class EmailNotificationHandler implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @param ManagerRegistry $doctrine
     * @param MailerInterface $mailer
     * @param ValidatorInterface $validator
     * @psalm-suppress PossiblyUnusedMethod dependency injection
     */
    public function __construct(
        private ManagerRegistry $doctrine,
        private MailerInterface $mailer,
        private ValidatorInterface $validator,
    ) {
    }

    /**
     * Sendet eine E-Mail
     *
     * @param EmailNotification $message
     * @throws MailException
     */
    public function send(
        EmailNotification $message
    ): void {
        $violations = $this->validator->validate($message);
        if (0 < count($violations)) {
            throw new ValidationFailedException($message, $violations);
        }

        $sender = $this->getSender($message);
        $recipient = $this->getRecipient($message);

        $email = (new TemplatedEmail())
            ->from($sender)
            ->to($recipient)
            ->subject($message->subject)
            ->htmlTemplate($message->twigTemplate)
            ->context($message->twigContext);

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->logger?->error(
                'Failed to send mail.',
                [
                    'from' => $sender,
                    'to' => $recipient,
                    'inner-exception' => $e->getMessage()
                ]
            );

            throw new MailException('Failed to send email.', previous: $e);
        }
    }

    /**
     * Get the recipient address from the message
     *
     * @param EmailNotification $message
     * @return Address
     * @throws \InvalidArgumentException If the recipient is not a KnownMailHandleEnum or Address
     */
    private function getRecipient(EmailNotification $message): Address
    {
        if ($message->recipient instanceof Address) {
            return $message->recipient;
        }
        
        $mail = $this->getKnownMail($message->recipient)->address;
        return new Address($mail->__toString());
    }

    /**
     * Get the sender address from the message
     *
     * @param EmailNotification $message
     * @return Address
     */
    private function getSender(EmailNotification $message): Address
    {
        $mail = $this->getKnownMail($message->sender)->address;
        return new Address($mail->__toString(), name: 'Jazzfreunde Ingolstadt e.V.');
    }

    /**
     * @param KnownMailHandleEnum $handle
     * @return KnownMail
     */
    private function getKnownMail(KnownMailHandleEnum $handle): KnownMail
    {
        $knownMails = $this->doctrine->getRepository(KnownMail::class);
        $mail = $knownMails->findOneBy([ 'handle' => $handle ]);

        if (is_null($mail)) {
            $this->logger?->error('Tried to send mail to unconfigured handle.', [
                'handle' => $handle->name,
            ]);

            throw new MailException(sprintf('%s: Mail with Handle "%s" is not configured.', KnownMail::class, $handle->name));
        }

        return $mail;
    }
}
