<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Exception\Notification;

use RuntimeException;

final class NotificationScopeNotFoundException extends RuntimeException
{
    public static function forScope(string $scope): self
    {
        return new self(sprintf('Notification scope not found: %s', $scope));
    }
}
