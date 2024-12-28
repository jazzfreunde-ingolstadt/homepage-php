<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Event\Event\Contract;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event that is triggered when a contract is confirmed.
 */
final class ContractConfirmedEvent extends Event
{
    public string $token;
}
