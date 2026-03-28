<?php declare(strict_types=1);

namespace Jazzfreunde\App\Message\Handler\Tasks;

use Jazzfreunde\App\Message\Messages\Tasks\PurgeVacantConfirmationContractsMessage;
use Jazzfreunde\App\Service\Contract\ConfirmationContractPurgingService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Deletes all unfulfilled confirmation contracts that are older than a certain time period.
 * Related entities should configure cascade delete to ensure that all related data is also removed.
 * @psalm-api
 */
#[AsMessageHandler(handles: PurgeVacantConfirmationContractsMessage::class, method: 'handlePurgeVacantConfirmationContracts')]
class ConfirmationContractPurgeHandler
{
    /**
     * Dependency injection
     *
     * @param  ConfirmationContractPurgingService $confirmationContractRepository
     */
    public function __construct(
        private ConfirmationContractPurgingService $confirmationContractRepository,
    ) {
    }

    /**
     * Purge all vacant newsletter subscriptions
     *
     * @return void
     */
    public function handlePurgeVacantConfirmationContracts(): void
    {
        $this->confirmationContractRepository->purgeVacantContracts();
    }
}
