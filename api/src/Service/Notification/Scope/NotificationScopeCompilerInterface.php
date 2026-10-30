<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use Jazzfreunde\Api\Service\Notification\Scope\Attribute\NotificationResource;

/**
 * Compiles notification resource definitions into matchable scopes.
 */
interface NotificationScopeCompilerInterface
{
    /**
     * Compiles a notification resource definition for its entity class.
     *
     * @param NotificationResource $resource        The notification resource definition
     * @param class-string         $entityClassName The entity class associated with the resource
     *
     * @return CompiledScope The compiled scope
     */
    public function compile(NotificationResource $resource, string $entityClassName): CompiledScope;
}
