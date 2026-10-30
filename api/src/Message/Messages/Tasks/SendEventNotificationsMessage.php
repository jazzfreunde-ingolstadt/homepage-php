<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Message\Messages\Tasks;

use DateInterval;

/**
 * This message is used to trigger the process of sending notifications related to events.
 */
final class SendEventNotificationsMessage
{
    /**
     * Constructor.
     */
    public function __construct(
        /**
         * The interval of time before an event occurs for which notifications should be sent.
         */
        public readonly DateInterval $upcomingIn,
    ) {}
}
