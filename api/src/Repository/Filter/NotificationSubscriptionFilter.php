<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Repository\Filter;

use Jazzfreunde\Api\Repository\Filter\Trait\ConfirmationContractFilterTrait;

/**
 * Filter for querying NotificationSubscription entities.
 *
 * @psalm-api
 */
final class NotificationSubscriptionFilter
{
    use ConfirmationContractFilterTrait;

    public function __construct(
        /**
         * The resource scope for which the subscription is made.
         * If the resource scope is more specific than the subscription's resource scope, it will still match.
         *
         * @var string
         */
        public string $resourceScope,

        /**
         * The email of the subscriber.
         *
         * @var null|string
         */
        public ?string $email = null,
    ) {}
}
