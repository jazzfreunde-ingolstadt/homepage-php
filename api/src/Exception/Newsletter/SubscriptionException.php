<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Exception\Newsletter;

use Exception;

/**
 * Fehler bei Abonnements.
 *
 * @psalm-api
 */
class SubscriptionException extends Exception
{
    public const int INTERNAL = 0;
    public const int ALREADY_SUBSCRIBED = 1001;
}
