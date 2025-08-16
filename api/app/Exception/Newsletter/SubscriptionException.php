<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Exception\Newsletter;

/**
 * Fehler bei Abonnements
 * @psalm-api
 */
class SubscriptionException extends \Exception
{
    const INTERNAL = 0;
    const ALREADY_SUBSCRIBED = 1001;
}
