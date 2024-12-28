<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Event\Event\Newsletter\Subscription;

use Jazzfreunde\App\Entity\NewsletterSubscription;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event that is triggered when a new user subscribed to the jazzletter
 */
final class NewSubscriptionEvent extends Event
{
    /**
     * @param NewsletterSubscription $subscription
     */
    public function __construct(
        public NewsletterSubscription $subscription
    ) {
    }
}
