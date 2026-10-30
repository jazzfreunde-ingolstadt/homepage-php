<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Provider;

use Jazzfreunde\Api\Exception\Notification\NotificationScopeNotFoundException;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;

/**
 * Provides notification resources based on their scope.
 */
interface NotificationProviderInterface
{
    /**
     * Retrieves the notification resource for the given resource scope.
     *
     * @param string $resourceScope
     *
     * @return NotificationResource
     *
     * @throws NotificationScopeNotFoundException thrown if the notification resource for the given scope is not found
     */
    public function getByScope(string $resourceScope): NotificationResource;
}
