<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Event\Event\Contract;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event that is triggered when a contract is canceled.
 */
final class ContractCanceledEvent extends Event
{
    public string $token;
}
