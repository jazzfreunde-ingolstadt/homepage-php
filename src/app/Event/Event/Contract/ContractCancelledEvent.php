<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Event\Event\Contract;

use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event that is triggered when a contract is cancelled.
 */
final class ContractCancelledEvent extends Event
{
    /**
     * @param ConfirmationContract $contract
     */
    public function __construct(
        public readonly ConfirmationContract $contract
    ) {
    }
}
