<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Exception\Notification;

use RuntimeException;

/**
 * Exception thrown when a notification source is not found.
 */
final class NotificationSourceNotFound extends RuntimeException {}
