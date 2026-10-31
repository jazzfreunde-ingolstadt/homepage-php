<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope\Attribute;

use Attribute;

/**
 * Attribute to mark a class as a notification resource with a specific scope.
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class NotificationResource
{
    public function __construct(
        public readonly string $uri,
    ) {}
}
