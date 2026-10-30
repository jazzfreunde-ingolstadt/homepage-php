<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Notification\Provider\Source;

use DateTime;
use Jazzfreunde\Api\Entity\Event;
use Jazzfreunde\Api\Entity\EventLocation;
use Jazzfreunde\Api\Exception\Notification\NotificationSourceNotFound;
use Jazzfreunde\Api\Platform\Notification\Resource\EventNotification;
use Jazzfreunde\Api\Service\Event\EventRepositoryInterface;
use Jazzfreunde\Api\Service\Notification\Provider\Source\EventNotificationSource;
use Jazzfreunde\Api\Service\Notification\Scope\ParsedScope;
use Jazzfreunde\Api\Service\Twig\EmailTemplatePath;
use Jazzfreunde\Api\Type\Primitive\Uri;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @internal
 *
 * @covers \Jazzfreunde\Api\Service\Notification\Provider\Source\EventNotificationSource
 */
final class EventNotificationSourceTest extends TestCase
{
    public function testGetReturnsEventNotificationMetadataIncludingEndTime(): void
    {
        $event = $this->createEvent(
            start: new DateTime('2030-05-12 18:00:00'),
            end: new DateTime('2030-05-12 20:00:00'),
        );
        $event->title = 'Jazz concert';
        $event->subtitle = 'Summer series';
        $event->link = 'https://example.com/events/42';
        $event->location->name = 'Jazz Hall';

        $repository = $this->createMock(EventRepositoryInterface::class);
        $repository->expects(self::once())
            ->method('getById')
            ->with(42)
            ->willReturn($event);

        $resource = (new EventNotificationSource($repository))->get(
            $this->createScope(new EventNotification(42)),
        );

        self::assertSame('/events/42', $resource->uri->value());
        self::assertSame(EmailTemplatePath::EVENT_NOTIFICATION, $resource->email_template);
        self::assertSame('Erinnerung: Jazz concert', $resource->title);
        self::assertSame([
            'event' => [
                'title' => 'Jazz concert',
                'subtitle' => 'Summer series',
                'link' => 'https://example.com/events/42',
                'location' => 'Jazz Hall',
                'start' => $event->start,
                'end' => $event->end,
            ],
        ], $resource->metadata);
    }

    public function testGetOmitsEndTimeForOneTimeEvents(): void
    {
        $start = new DateTime('2030-05-12 18:00:00');
        $event = $this->createEvent($start, clone $start);

        $repository = $this->createMock(EventRepositoryInterface::class);
        $repository->expects(self::once())
            ->method('getById')
            ->with(42)
            ->willReturn($event);

        $resource = (new EventNotificationSource($repository))->get(
            $this->createScope(new EventNotification(42)),
        );

        self::assertIsArray($resource->metadata['event']);
        self::assertArrayNotHasKey('end', $resource->metadata['event']);
    }

    public function testGetThrowsWhenParsedScopeContainsAnotherDtoType(): void
    {
        $repository = $this->createMock(EventRepositoryInterface::class);
        $repository->expects(self::never())->method('getById');

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage(sprintf(
            'Expected an instance of %s.',
            EventNotification::class,
        ));

        (new EventNotificationSource($repository))->get($this->createScope(new stdClass()));
    }

    public function testGetThrowsWhenEventDoesNotExist(): void
    {
        $repository = $this->createMock(EventRepositoryInterface::class);
        $repository->expects(self::once())
            ->method('getById')
            ->with(42)
            ->willReturn(null);

        $this->expectException(NotificationSourceNotFound::class);
        $this->expectExceptionMessage('Event with ID 42 not found.');

        (new EventNotificationSource($repository))->get(
            $this->createScope(new EventNotification(42)),
        );
    }

    public function testCanHandleOnlyEventNotifications(): void
    {
        $source = new EventNotificationSource($this->createStub(EventRepositoryInterface::class));

        self::assertTrue($source->canHandle($this->createScope(new EventNotification(42))));
        self::assertFalse($source->canHandle($this->createScope(new stdClass())));
    }

    private function createScope(object $dto): ParsedScope
    {
        return new ParsedScope(new Uri('/events/42'), $dto);
    }

    private function createEvent(DateTime $start, DateTime $end): Event
    {
        $location = new EventLocation();
        $location->name = 'Test location';

        $event = new Event();
        $event->id = 42;
        $event->title = 'Test event';
        $event->start = $start;
        $event->end = $end;
        $event->location = $location;

        return $event;
    }
}
