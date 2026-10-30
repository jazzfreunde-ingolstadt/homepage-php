<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

/**
 * Provides the compiled collection of notification scopes.
 */
interface NotificationScopeCollectionProviderInterface
{
    /**
     * Returns the compiled notification scope collection.
     *
     * @return NotificationScopeCollection The compiled collection
     */
    public function provide(): NotificationScopeCollection;
}
