<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Mail;

use Jazzfreunde\Api\Message\Messages\Email\EmailNotification;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Override;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Address;

/**
 * Service to generate notification emails.
 *
 * @psalm-api
 */
final class NotificationMailGenerator implements NotificationMailGeneratorInterface
{
    /**
     * @param MessageBusInterface $bus
     */
    public function __construct(
        private MessageBusInterface $bus,
    ) {}

    /**
     * {@inheritdoc}
     */
    #[Override]
    public function generate(
        NotificationResource $notificationResource,
        array $subscribers,
    ): void {
        foreach ($subscribers as $subscription) {
            $this->bus->dispatch(new EmailNotification(
                sender: KnownMailHandleEnum::NoReply,
                recipient: new Address($subscription->email->__toString()),
                subject: $notificationResource->title,
                twigTemplate: $notificationResource->email_template,
                twigContext: array_merge($notificationResource->metadata, [
                    'scope' => $notificationResource->uri,
                    'token' => $subscription->confirmation->token,
                ]),
            ));
        }
    }
}
