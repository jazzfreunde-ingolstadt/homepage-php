<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Platform\Notification;

use ApiPlatform\Metadata as API;
use DateTimeImmutable;

/**
 * Data needed to request a notification subscription.
 *
 * @psalm-api
 */
final readonly class NotificationSource
{
    public function __construct(
        /**
         * Resource scope associated with the notification subscription.
         */
        #[API\ApiProperty(required: true)]
        public string $resourceScope,

        /**
         * Time after which the notification subscription expires.
         */
        #[API\ApiProperty(required: true)]
        public DateTimeImmutable $expirationTime,
    ) {}
}
