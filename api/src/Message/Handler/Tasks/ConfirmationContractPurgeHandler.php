<?php declare(strict_types=1);

namespace Jazzfreunde\App\Message\Handler\Tasks;

use Jazzfreunde\App\Message\Messages\Tasks\PurgeVacantConfirmationContractsMessage;
use Jazzfreunde\App\Service\Contract\ConfirmationContractPurgingService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Handle purge of any vacant confirmation contracts by deleting all unfullfilled newsletter subscriptions
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
