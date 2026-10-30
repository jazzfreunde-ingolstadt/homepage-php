<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Contract;

/**
 * Purges expired and unconfirmed confirmation contracts.
 */
interface ConfirmationContractPurgingInterface
{
    public function purgeVacantContracts(): void;
}
