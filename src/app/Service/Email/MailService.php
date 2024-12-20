<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email;

use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\KnownMail;
use Jazzfreunde\App\Service\Email\Exception\MailException;
use Jazzfreunde\App\Type\KnownMailHandleEnum;
use Psr\Log\LoggerAwareTrait;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

/**
 * Service zum Senden von E-Mails
 */
final class MailService
{
    use LoggerAwareTrait;

    /**
     * @param ManagerRegistry $doctrine
     * @param MailerInterface $mailer
     */
    public function __construct(private ManagerRegistry $doctrine, private MailerInterface $mailer)
    {
    }

    /**
     * Sendet eine E-Mail
     *
     * @param KnownMailHandleEnum $from
     * @param KnownMailHandleEnum|string $to
     * @param string $subject
     * @param string $twigTemplate
     * @return void
     */
    public function send(KnownMailHandleEnum $from, KnownMailHandleEnum|string $to, string $subject, string $twigTemplate): void
    {
        if (strlen($subject) < 5) {
            throw new \InvalidArgumentException('Subject must be at least 5 characters long.');
        }
        if (!str_ends_with($twigTemplate, '.html.twig')) {
            throw new \InvalidArgumentException('Template must have a ".html.twig" file extension.');
        }

        $sender = $this->getKnownMail($from)->address;

        $recipient = $to;
        if ($to instanceof KnownMailHandleEnum) {
            $recipient = $this->getKnownMail($to)->address;
        }

        $email = (new TemplatedEmail())
            ->from($sender)
            ->to($recipient)
            ->subject($subject)
            ->htmlTemplate($twigTemplate)
            ->context([]);

        $this->mailer->send($email);
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
            throw new MailException(sprintf('%s: Mail with Handle "%s" is not configured.', KnownMail::class, $handle));
        }

        return $mail;
    }
}
