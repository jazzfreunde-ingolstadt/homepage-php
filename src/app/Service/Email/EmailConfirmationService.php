<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email;

use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\EmailConfirmation;
use Jazzfreunde\App\Type\KnownMailHandleEnum;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

/**
 * Service zur Verwaltung des Newsletters
 */
final class EmailConfirmationService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @param ManagerRegistry $doctrine
     * @param MailService $mailer
     */
    public function __construct(private ManagerRegistry $doctrine, private MailService $mailer)
    {
    }

    /**
     * Fordert den Benutzer zur Bestätigung auf.
     *
     * @param string $email
     * @param string $subject
     * @return void
     */
    public function askForConfirmation(string $email, string $subject): void
    {
        /**
         * @var Connection @connection
         */
        $connection = $this->doctrine->getConnection();
        $confirmations = $this->doctrine->getRepository(EmailConfirmation::class);

        $connection->beginTransaction();
        try {
            $confirmation = new EmailConfirmation();
            $confirmation->email = $email;
            $confirmation->token = bin2hex(random_bytes(32));
            $confirmation->expiresAt = new \DateTimeImmutable('+1 day');

            $confirmations->save($confirmation);

            $connection->commit();
        } catch (\Throwable $e) {
            $connection->rollBack();
            throw $e;
        }

        $this->mailer->send(KnownMailHandleEnum::NoReply, $email, $subject, 'email/email-confirmation.html.twig');
    }

    public function confirm(): void
    {
    }
}
