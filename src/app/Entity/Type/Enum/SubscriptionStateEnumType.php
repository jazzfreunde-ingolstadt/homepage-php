<?php declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum;

use Jazzfreunde\App\Type\SubscriptionStateEnum;

/**
 * Enity type for the possible states of a subscription.
 * @see Jazzfreunde\App\Type\SubscriptionStateEnum
 */
final class SubscriptionStateEnumType extends AbstractEnumType
{
    public const ENTITY_NAME = 'subscription_state';
    public const ENUM_CLASS_NAME = SubscriptionStateEnum::class;
}
