<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Platform\Notification\Resource;

use Jazzfreunde\Api\Service\Notification\Scope\Attribute\NotificationResource;
use Jazzfreunde\Api\Service\Notification\Scope\Parameter\Number;
use Symfony\Component\ObjectMapper\Attribute\Map;
use Symfony\Component\ObjectMapper\Condition\TargetClass;

/**
 * API resource representing an event notification.\.
 */
#[NotificationResource(uri: '/events/{id:number}')]
final class EventNotification
{
    /**
     * Constructor for the event notification resource.
     *
     * @psalm-api
     */
    public function __construct(
        /**
         * The ID of a specific event notification.
         */
        #[Map(if: new TargetClass(self::class), transform: [Number::class, 'parse'])]
        public int $id,
    ) {}
}
