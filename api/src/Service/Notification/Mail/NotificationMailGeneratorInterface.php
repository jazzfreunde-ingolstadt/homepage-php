<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Mail;

/**
 * Generates notification emails for subscribers.
 */
interface NotificationMailGeneratorInterface
{
    /**
     * Generates notification emails for subscriptions to the given resource scope.
     *
     * @param string $resourceScope the notification resource scope
     *
     * @return int The number of notification emails dispatched
     */
    public function generate(string $resourceScope): int;
}
