<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Newsletter\Exception;

/**
 * Fehler bei Abonnements
 */
class SubscriptionException extends \Exception
{
    const INTERNAL = 0;
    const ALREADY_SUBSCRIBED = 1001;
}
