<?php declare(strict_types=1);

namespace Jazzfreunde\App\Type;

/**
 * Enumerates the possible states of a subscription.
 */
enum SubscriptionStateEnum: string
{
    case PendingConfirmation = 'pending_confirmation';
    case Active = 'active';
    case ScheduledForDeletion = 'scheduled_for_deletion';
}
