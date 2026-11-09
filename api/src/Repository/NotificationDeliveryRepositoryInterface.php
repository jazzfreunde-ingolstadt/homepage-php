<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Repository;

use Jazzfreunde\Api\Entity\Notification\NotificationSubscription;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;

interface NotificationDeliveryRepositoryInterface
{
    public function claim(NotificationResource $notification, NotificationSubscription $subscription): bool;
}
