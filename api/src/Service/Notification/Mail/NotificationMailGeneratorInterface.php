<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Mail;

use Jazzfreunde\Api\Entity\Notification\NotificationSubscription;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;

/**
 * Generates notification emails for subscribers.
 */
interface NotificationMailGeneratorInterface
{
    /**
     * Generates notification emails for the given subscribers.
     *
     * @param NotificationResource       $notificationResource the notification resource to generate emails for
     * @param NotificationSubscription[] $subscribers          the subscribers to generate notification emails for
     */
    public function generate(
        NotificationResource $notificationResource,
        array $subscribers,
    ): void;
}
