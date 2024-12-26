<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email;

use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\EmailConfirmation;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationNotFoundException;
use Jazzfreunde\App\Type\KnownMailHandleEnum;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

/**
 * Service zur Verwaltung des Newsletters
 */
final class EmailConfirmationService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    private const TOKEN_LENGTH = 32;

    /**
     * @param ManagerRegistry $doctrine
     * @param MailService $mailer
     */
    public function __construct(private ManagerRegistry $doctrine, private MailService $mailer)
    {
    }

    /**
     * Ask user to confirm a request via email.
     *
     * @param string $email Recipient
     * @param string $subject title of confirmation
     * @return void
     */
    public function askForConfirmation(string $email, string $subject, array $context): void
    {
        /**
         * @var Connection @connection
         */
        $connection = $this->doctrine->getConnection();
        $entityManager = $this->doctrine->getManager();
        
        $connection->beginTransaction();
        try {
            $confirmation = new EmailConfirmation();
            $confirmation->token = bin2hex(random_bytes($this::TOKEN_LENGTH));
            $confirmation->expiresAt = new \DateTimeImmutable('+1 day');
            
            $entityManager->persist($confirmation);
            $entityManager->flush();

            $connection->commit();
        } catch (\Throwable $e) {
            $connection->rollBack();
            throw $e;
        }

        $this->mailer->send(KnownMailHandleEnum::NoReply, $email, $subject, 'email/email-confirmation.html.twig');
    }

    /**
     * Undocumented function
     *
     * @param string $token Token generated before initializing a new confirmation request
     * @return void
     */
    public function confirm(string $token): void
    {
        if (strlen($token) != $this::TOKEN_LENGTH) {
            throw new \InvalidArgumentException('Invalid token length.');
        }

        $repository = $this->doctrine->getRepository(EmailConfirmation::class);
        $confirmation = $repository->findOneBy([ 'token' => $token ]);
        
        if (is_null($confirmation)) {
            throw new ConfirmationNotFoundException("Confirmation");
        }

        /**
         * @var Connection @connection
         */
        $connection = $this->doctrine->getConnection();
    }
}
