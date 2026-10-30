<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Message\Handler\Tasks;

use Jazzfreunde\Api\Message\Messages\Tasks\PurgeVacantConfirmationContractsMessage;
use Jazzfreunde\Api\Service\Contract\ConfirmationContractPurgingInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Deletes all unfulfilled confirmation contracts that are older than a certain time period.
 * Related entities should configure cascade delete to ensure that all related data is also removed.
 *
 * @psalm-api
 */
#[AsMessageHandler(handles: PurgeVacantConfirmationContractsMessage::class, method: 'handlePurgeVacantConfirmationContracts')]
final class ConfirmationContractPurgeHandler
{
    /**
     * Dependency injection.
     *
     * @param ConfirmationContractPurgingInterface $confirmationContractRepository
     */
    public function __construct(
        private ConfirmationContractPurgingInterface $confirmationContractRepository,
    ) {}

    /**
     * Purge all vacant newsletter subscriptions.
     */
    public function handlePurgeVacantConfirmationContracts(): void
    {
        $this->confirmationContractRepository->purgeVacantContracts();
    }
}
