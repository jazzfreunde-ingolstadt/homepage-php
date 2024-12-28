<?php declare(strict_types=1);

namespace Jazzfreunde\App\Event\Listener\Newsletter\Subscription;

use Jazzfreunde\App\Event\Event\Newsletter\Subscription\NewSubscriptionEvent;
use Jazzfreunde\App\Service\Email\MailService;
use Jazzfreunde\App\Type\KnownMailHandleEnum;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

/**
 * Listener for new subscriptions
 */
#[AsEventListener(event: NewSubscriptionEvent::class, method: 'onNewSubscription')]
final class NewSubscriptionListener
{
    /**
     * @param MailService $mailer
     */
    public function __construct(
        private MailService $mailer,
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
        $this->mailer->send(
            KnownMailHandleEnum::NoReply,
            KnownMailHandleEnum::Jazzletter,
            'Neuer Newsletter Abonnent!',
            'email/newsletter-subscription-notice.html.twig',
            [
                'subscription' => [
                    'email' => $event->subscription->email
                ],
            ]
        );
    }
}
