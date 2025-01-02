<?php declare(strict_types=1);

namespace Jazzfreunde\App\Type\Enum\Contract;

/**
 * Enumerates the possible states of a confirmation contract.
 */
enum ConfirmationStateEnum: string
{
    case PendingConfirmation = 'pending';
    case Confirmed = 'confirmed';
    case Cancelled = 'cancelled';
}
