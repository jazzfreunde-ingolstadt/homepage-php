<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email;

use Doctrine\ORM\EntityManagerInterface;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationPeriodExpiredException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Jazzfreunde\App\Event\Event\Contract\ContractConfirmedEvent;
use Jazzfreunde\App\Event\Event\Contract\ContractCancelledEvent;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\App\Service\Email\Exception\MailException;

/**
 * Service for email confirmation of contract
 */
final class EmailConfirmationService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    private const TOKEN_LENGTH = 32;

    /**
     * @param EntityManagerInterface $entityManager
     * @param MailService $mailer
     * @param EventDispatcherInterface $dispatcher
     * @psalm-suppress PossiblyUnusedMethod dependency injection
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private MailService $mailer,
        private EventDispatcherInterface $dispatcher
    ) {
    }

    /**
     * Ask user to confirm a request via email.
     *
     * @param Email $email Recipient
     * @param string $subject title of confirmation
     * @param array $context Context embedded into the email template
     * @return void
     * @throws MailException Thrown by mailer server incase mail can not be sent
     */
    public function askForConfirmation(
        ConfirmationContract $contract,
        Email $email,
        string $subject,
        array $context
    ): void {
        if ($contract->hasConfirmationPeriodExpired()) {
            throw new ConfirmationPeriodExpiredException($contract);
        }

        $this->mailer->send(
            KnownMailHandleEnum::NoReply,
            $email,
            $subject,
            'email/email-confirmation.html.twig',
            $context + [ 'token' => $contract->token ]
        );
    }

    /**
     * Confirm a request.
     *
     * @param string $token Token generated before initializing a new confirmation request
     * @return void
     * @throws ConfirmationContractNotFoundException
     * @throws ConfirmationPeriodExpiredException
     */
    public function confirm(string $token): void
    {
        $contract = $this->retrieveContract($token);

        if ($contract->hasConfirmationPeriodExpired()) {
            throw new ConfirmationPeriodExpiredException($contract);
        }

        $contract->confirm();

        $this->entityManager->beginTransaction();
        try {
            $this->entityManager->flush();

            $this->dispatchConfirmation($contract);

            $this->entityManager->commit();
        } catch (\Throwable $e) {
            $this->entityManager->rollBack();
            throw $e;
        }
    }

    /**
     * Cancel a request.
     *
     * @param string $token Token generated before initializing a new confirmation request
     * @return void
     * @throws ConfirmationContractNotFoundException
     * @throws ConfirmationPeriodExpiredException
     */
    public function cancel(string $token): void
    {
        $contract = $this->retrieveContract($token);
        $contract->cancel();

        $this->entityManager->beginTransaction();
        try {
            $this->entityManager->flush();

            $this->dispatchCancelation($contract);

            $this->entityManager->commit();
        } catch (\Throwable $e) {
            $this->entityManager->rollBack();
            throw $e;
        }
    }

    /**
     * Retrieve a confirmation contract by token.
     *
     * @param string $token
     * @return ConfirmationContract
     * @throws ConfirmationContractNotFoundException
     * @throws ConfirmationPeriodExpiredException
     */
    private function retrieveContract(string $token): ConfirmationContract
    {
        $repository = $this->entityManager->getRepository(ConfirmationContract::class);
        $contract = $repository->findOneBy([ 'token' => $token ])
            ?? throw new ConfirmationContractNotFoundException($token);

        return $contract;
    }

    /**
     * Dispatch confirmation event.
     *
     * @param ConfirmationContract $contract
     * @return void
     */
    private function dispatchConfirmation(ConfirmationContract $contract): void
    {
        $event = new ContractConfirmedEvent(
            $contract
        );

        $this->dispatcher->dispatch($event);
    }

    /**
     * Cancel a request.
     *
     * @param ConfirmationContract $contract
     * @return void
     */
    private function dispatchCancelation(ConfirmationContract $contract): void
    {
        $event = new ContractCancelledEvent(
            $contract
        );

        $this->dispatcher->dispatch($event);
    }
}
