<?php declare(strict_types=1);

namespace Jazzfreunde\App\Type\Contract;

/**
 * Enumerates the possible states of a confirmation contract.
 */
enum ConfirmationStateEnum: string
{
    case PendingConfirmation = 'pending';
    case Confirmed = 'confirmed';
    case Canceled = 'canceled';
}
