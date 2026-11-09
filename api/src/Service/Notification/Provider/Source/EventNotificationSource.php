<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Provider\Source;

use Jazzfreunde\Api\Exception\Notification\NotificationSourceNotFound;
use Jazzfreunde\Api\Platform\Notification\Resource\EventNotification;
use Jazzfreunde\Api\Service\Event\EventRepositoryInterface;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;
use Jazzfreunde\Api\Service\Notification\Provider\NotificationSourceInterface;
use Jazzfreunde\Api\Service\Notification\Scope\ParsedScope;
use Jazzfreunde\Api\Service\Twig\EmailTemplatePath;
use Jazzfreunde\Util\HashUtil;
use LogicException;
use Override;

/**
 * Notification source for event notifications.
 *
 * @psalm-api
 */
final class EventNotificationSource implements NotificationSourceInterface
{
    public function __construct(
        private readonly EventRepositoryInterface $eventRepository
    ) {}

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function get(ParsedScope $parsedScope): NotificationResource
    {
        $entity = $parsedScope->dto;

        if (!$entity instanceof EventNotification) {
            throw new LogicException(sprintf('Expected an instance of %s.', EventNotification::class));
        }

        $event = $this->eventRepository->getById($entity->id);
        if (null === $event) {
            throw new NotificationSourceNotFound(sprintf('Event with ID %d not found.', $entity->id));
        }

        $eventMetadata = [
            'title' => $event->title,
            'subtitle' => $event->subtitle,
            'link' => $event->link,
            'location' => $event->location->name,
            'start' => $event->start,
        ];

        if ($event->start != $event->end) {
            $eventMetadata['end'] = $event->end;
        }

        return new NotificationResource(
            uri: $parsedScope->matchedScope,
            identityHash: HashUtil::sha256(EventNotification::class, (string) $entity->id),
            email_template: EmailTemplatePath::EVENT_NOTIFICATION,
            title: sprintf('Erinnerung: %s', $event->title),
            metadata: [
                'event' => $eventMetadata,
            ],
        );
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function canHandle(ParsedScope $parsedScope): bool
    {
        return $parsedScope->dto instanceof EventNotification;
    }
}
