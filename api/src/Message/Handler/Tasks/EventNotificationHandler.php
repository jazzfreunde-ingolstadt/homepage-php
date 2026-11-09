<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Message\Handler\Tasks;

use DateTimeImmutable;
use DateTimeZone;
use Jazzfreunde\Api\Entity\Event;
use Jazzfreunde\Api\Message\Messages\Tasks\SendEventNotificationsMessage;
use Jazzfreunde\Api\Repository\Filter\EventFilter;
use Jazzfreunde\Api\Service\Event\EventRepositoryInterface;
use Jazzfreunde\Api\Service\Notification\Mail\NotificationMailGeneratorInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Collects information about events and sends notifications to subscribed notification resources.
 *
 * @psalm-api
 */
#[AsMessageHandler(
    handles: SendEventNotificationsMessage::class,
    method: 'handleSendEventNotifications'
)]
final class EventNotificationHandler implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    public function __construct(
        private readonly EventRepositoryInterface $eventRepository,
        private readonly NotificationMailGeneratorInterface $notificationMailGenerator,
    ) {}

    /**
     * Handle sending event notifications.
     */
    public function handleSendEventNotifications(SendEventNotificationsMessage $message): void
    {
        $filterUpcomingEvents = new EventFilter(
            latestStart: (new DateTimeImmutable(timezone: new DateTimeZone('Europe/Berlin')))
                ->add($message->upcomingIn),
        );
        $upcomingEvents = $this->eventRepository->findByFilter($filterUpcomingEvents);

        if (empty($upcomingEvents)) {
            $this->logger?->debug('No upcoming events found for notification.');

            return;
        }

        foreach ($upcomingEvents as $event) {
            $this->sendNotifications($event);
        }
    }

    private function sendNotifications(Event $event): void
    {
        $resourceScope = "/events/{$event->id}";
        $sentCount = $this->notificationMailGenerator->generate($resourceScope);
        if (0 === $sentCount) {
            return;
        }

        $this->logger?->info(sprintf('Sent %d event notifications.', $sentCount), [
            'count' => $sentCount,
            'resourceScope' => $resourceScope,
        ]);
    }
}
