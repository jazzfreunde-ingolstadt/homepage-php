<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Contract;

/**
 * Purges expired and unconfirmed confirmation contracts.
 */
interface ConfirmationContractPurgingService
{
    /**
     * @return void
     */
    public function purgeVacantContracts(): void;
}
