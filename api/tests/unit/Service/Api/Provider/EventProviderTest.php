<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Api\Provider;

use ApiPlatform\Metadata\Get;
use ApiPlatform\State\ProviderInterface;
use DateInterval;
use DateTime;
use DateTimeZone;
use Jazzfreunde\Api\Entity\Event as EventEntity;
use Jazzfreunde\Api\Entity\EventLocation;
use Jazzfreunde\Api\Platform\Event\Event;
use Jazzfreunde\Api\Platform\Notification\Resource\EventNotification;
use Jazzfreunde\Api\Service\Api\Provider\EventProvider;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationUrlGeneratorInterface;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

/**
 * @internal
 *
 * @covers \Jazzfreunde\Api\Service\Api\Provider\EventProvider
 */
final class EventProviderTest extends TestCase
{
    public function testNotificationSourceUsesGeneratedEventNotificationUrl(): void
    {
        $start = new DateTime('+4 days', new DateTimeZone('Europe/Berlin'));
        $event = new Event(
            id: 42,
            title: 'Jazz concert',
            start: $start,
            end: (clone $start)->add(new DateInterval('PT2H')),
            location: new EventLocation(),
        );
        $source = new EventEntity();
        $source->id = 42;

        $uut = new UnitUnderTest(EventProvider::class);
        $uut->mock(ProviderInterface::class)
            ->expects(self::once())
            ->method('provide')
            ->willReturn($source);
        $uut->mock(ObjectMapperInterface::class)
            ->expects(self::once())
            ->method('map')
            ->with($source, Event::class)
            ->willReturn($event);
        $uut->mock(NotificationUrlGeneratorInterface::class)
            ->expects(self::once())
            ->method('generate')
            ->with(self::callback(
                static fn (object $notification): bool => $notification instanceof EventNotification
                    && 42 === $notification->id,
            ))
            ->willReturn('/events/42');

        $result = $uut->target()->provide(new Get());

        self::assertInstanceOf(Event::class, $result);
        self::assertNotNull($result->notificationSource);
        self::assertSame('/events/42', $result->notificationSource->resourceScope);
    }
}
