<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email;

use Doctrine\ORM\EntityManagerInterface;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Type\KnownMailHandleEnum;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationPeriodExpiredException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Jazzfreunde\App\Event\Event\Contract\ContractConfirmedEvent;
use Jazzfreunde\App\Event\Event\Contract\ContractCanceledEvent;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Service for email confirmation of contract
 */
final class EmailConfirmationService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    private const TOKEN_LENGTH = 32;

    /**
     * @param EntityManagerInterface $entityManager
     * @param ValidatorInterface $validator
     * @param MailService $mailer
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ValidatorInterface $validator,
        private MailService $mailer,
        private EventDispatcherInterface $dispatcher
    ) {
    }

    /**
     * Ask user to confirm a request via email.
     *
     * @param string $email Recipient
     * @param string $subject title of confirmation
     * @param array $context Context embedded into the email template
     * @return void
     */
    public function askForConfirmation(
        ConfirmationContract $contract,
        string $email,
        string $subject,
        array $context
    ): void {
        $this->entityManager->beginTransaction();
        try {
            if (0 < count($this->validator->validate($contract))) {
                throw new \DomainException('Invalid confirmation contract');
            }

            $this->entityManager->persist($contract);
            $this->entityManager->flush();

            $this->entityManager->commit();
        } catch (\Throwable $e) {
            $this->entityManager->rollBack();
            throw $e;
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
        if (strlen($token) != $this::TOKEN_LENGTH) {
            throw new \InvalidArgumentException('Invalid token length.');
        }

        $contract = $this->retrieveContract($token);
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
        if (strlen($token) != $this::TOKEN_LENGTH) {
            throw new \InvalidArgumentException('Invalid token length.');
        }

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

        if ($contract->IsExpired()) {
            throw new ConfirmationPeriodExpiredException($contract);
        }

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
        $event = new ContractConfirmedEvent();
        $event->token = $contract->token;

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
        $event = new ContractCanceledEvent();
        $event->token = $contract->token;

        $this->dispatcher->dispatch($event);
    }
}
