<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Type\Enum\Contract;

/**
 * Enumerates the possible states of a confirmation contract.
 */
enum ConfirmationStateEnum: string
{
    case New = 'new';
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Cancelled = 'cancelled';
}
