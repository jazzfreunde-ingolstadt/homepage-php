<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email;

use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\KnownMail;
use Jazzfreunde\App\Service\Email\Exception\MailException;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\App\Type\Primitive\Email;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerAwareInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

/**
 * Service zum Senden von E-Mails
 */
class MailService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @param ManagerRegistry $doctrine
     * @param MailerInterface $mailer
     * @psalm-suppress PossiblyUnusedMethod dependency injection
     */
    public function __construct(
        private ManagerRegistry $doctrine,
        private MailerInterface $mailer
    ) {
    }

    /**
     * Sendet eine E-Mail
     *
     * @param KnownMailHandleEnum $from
     * @param KnownMailHandleEnum|Email $to
     * @param string $subject
     * @param string $twigTemplate
     * @return void
     * @throws MailException
     */
    public function send(
        KnownMailHandleEnum $from,
        KnownMailHandleEnum|Email $to,
        string $subject,
        string $twigTemplate,
        array $twigContext = []
    ): void {
        if (strlen($subject) < 5) {
            throw new \InvalidArgumentException('Subject must be at least 5 characters long.');
        }
        if (!str_ends_with($twigTemplate, '.html.twig')) {
            throw new \InvalidArgumentException('Template must have a ".html.twig" file extension.');
        }

        $sender = $this->getKnownMail($from)->address->__toString();

        $recipient = '';
        if ($to instanceof KnownMailHandleEnum) {
            $recipient = $this->getKnownMail($to)->address->__toString();
        }
        if ($to instanceof Email) {
            $recipient = $to->__toString();
        }

        $email = (new TemplatedEmail())
            ->from($sender)
            ->to($recipient)
            ->subject($subject)
            ->htmlTemplate($twigTemplate)
            ->context($twigContext);

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
