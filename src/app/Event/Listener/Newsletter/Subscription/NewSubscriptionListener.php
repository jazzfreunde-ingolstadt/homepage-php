<?php declare(strict_types=1);

namespace Jazzfreunde\App\Event\Listener\Newsletter\Subscription;

use Jazzfreunde\App\Event\Event\Newsletter\Subscription\NewSubscriptionEvent;
use Jazzfreunde\App\Service\Email\EmailConfirmationService;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

/**
 * Listener for new subscriptions
 * @psalm-api
 */
#[AsEventListener(event: NewSubscriptionEvent::class, method: 'onNewSubscription')]
final class NewSubscriptionListener
{
    /**
     * @param EmailConfirmationService $confirmationService
     */
    public function __construct(
        private EmailConfirmationService $confirmationService,
    ) {
    }

    /**
     * Handle new subscription
     *
     * @param NewSubscriptionEvent $event
     * @return void
     */
    public function onNewSubscription(NewSubscriptionEvent $event): void
    {
        $this->confirmationService->askForConfirmation(
            $event->subscription->confirmation,
            $event->subscription->email,
            'Bestätigen Sie Ihre Newsletter Anmeldung',
            [],
        );
    }
}
