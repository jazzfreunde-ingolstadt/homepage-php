<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use LogicException;

/**
 * Generates notification URLs for resource objects.
 */
interface NotificationUrlGeneratorInterface
{
    /**
     * Generates a notification URL from the resource's compiled scope.
     *
     * @param object $object The notification resource object
     *
     * @return string The generated notification URL
     *
     * @throws LogicException If no matching scope exists or a scope parameter cannot be generated
     */
    public function generate(object $object): string;
}
