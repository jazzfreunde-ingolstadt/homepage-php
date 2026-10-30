<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification;

use Jazzfreunde\Api\Entity\Notification\NotificationSubscription;
use Jazzfreunde\Api\Repository\Filter\NotificationSubscriptionFilter;

/**
 * Interface for the NotificationSubscription repository.
 */
interface NotificationSubscriptionRepositoryInterface
{
    /**
     * Finds subscriptions based on the provided filter criteria.
     *
     * @param NotificationSubscriptionFilter $filter the filter criteria for finding subscriptions
     *
     * @return NotificationSubscription[] an array of matching NotificationSubscription entities
     */
    public function findByFilter(NotificationSubscriptionFilter $filter): array;

    /**
     * Finds a single subscription based on the provided filter criteria.
     *
     * @param NotificationSubscriptionFilter $filter the filter criteria for finding a subscription
     *
     * @return null|NotificationSubscription a matching NotificationSubscription entity or null if not found
     */
    public function findOneByFilter(NotificationSubscriptionFilter $filter): ?NotificationSubscription;
}
