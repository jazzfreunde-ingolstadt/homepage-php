<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Mail;

use Doctrine\DBAL\Connection;
use Jazzfreunde\Api\Message\Messages\Email\EmailMessage;
use Jazzfreunde\Api\Repository\Filter\NotificationSubscriptionFilter;
use Jazzfreunde\Api\Repository\NotificationDeliveryRepositoryInterface;
use Jazzfreunde\Api\Service\Notification\NotificationSubscriptionRepositoryInterface;
use Jazzfreunde\Api\Service\Notification\Provider\NotificationProviderInterface;
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
        private readonly Connection $connection,
        private readonly NotificationDeliveryRepositoryInterface $notificationDeliveryRepository,
        private readonly NotificationSubscriptionRepositoryInterface $notificationSubscriptionRepository,
        private readonly NotificationProviderInterface $notificationProvider,
        private MessageBusInterface $bus,
    ) {}

    /**
     * {@inheritdoc}
     */
    #[Override]
    public function generate(string $resourceScope): int
    {
        $subscriptions = $this->notificationSubscriptionRepository->findByFilter(
            new NotificationSubscriptionFilter(resourceScope: $resourceScope),
        );
        if (empty($subscriptions)) {
            return 0;
        }

        $notificationResource = $this->notificationProvider->getByScope($resourceScope);
        $sentCount = 0;

        foreach ($subscriptions as $subscriber) {
            $sent = $this->connection->transactional(function () use ($notificationResource, $subscriber): bool {
                if (!$this->notificationDeliveryRepository->claim($notificationResource, $subscriber)) {
                    return false;
                }

                $this->bus->dispatch(new EmailMessage(
                    sender: KnownMailHandleEnum::NoReply,
                    recipient: new Address($subscriber->email->__toString()),
                    subject: $notificationResource->title,
                    twigTemplate: $notificationResource->email_template,
                    twigContext: array_merge($notificationResource->metadata, [
                        'scope' => $notificationResource->uri,
                        'token' => $subscriber->confirmation->token,
                    ]),
                ));

                return true;
            });

            if ($sent) {
                ++$sentCount;
            }
        }

        return $sentCount;
    }
}
