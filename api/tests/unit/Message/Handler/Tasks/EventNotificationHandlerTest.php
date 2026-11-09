<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Message\Handler\Tasks;

use DateInterval;
use Jazzfreunde\Api\Entity\Event;
use Jazzfreunde\Api\Message\Handler\Tasks\EventNotificationHandler;
use Jazzfreunde\Api\Message\Messages\Tasks\SendEventNotificationsMessage;
use Jazzfreunde\Api\Repository\Filter\EventFilter;
use Jazzfreunde\Api\Service\Event\EventRepositoryInterface;
use Jazzfreunde\Api\Service\Notification\Mail\NotificationMailGeneratorInterface;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

/**
 * @internal
 *
 * @covers \Jazzfreunde\Api\Message\Handler\Tasks\EventNotificationHandler
 */
final class EventNotificationHandlerTest extends TestCase
{
    public function testLogsSentCountAndResourceScope(): void
    {
        $event = new Event();
        $event->id = 42;

        $uut = new UnitUnderTest(EventNotificationHandler::class);
        $uut->mock(EventRepositoryInterface::class)
            ->expects(self::once())
            ->method('findByFilter')
            ->with(self::isInstanceOf(EventFilter::class))
            ->willReturn([$event]);

        $uut->mock(NotificationMailGeneratorInterface::class)
            ->expects(self::once())
            ->method('generate')
            ->with('/events/42')
            ->willReturn(2);

        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects(self::once())
            ->method('info')
            ->with('Sent 2 event notifications.', [
                'count' => 2,
                'resourceScope' => '/events/42',
            ]);

        $handler = $uut->target();
        $handler->setLogger($logger);
        $handler->handleSendEventNotifications(new SendEventNotificationsMessage(new DateInterval('P7D')));
    }

    public function testDoesNotLogWhenNoNotificationsWereSent(): void
    {
        $event = new Event();
        $event->id = 42;

        $uut = new UnitUnderTest(EventNotificationHandler::class);
        $uut->mock(EventRepositoryInterface::class)
            ->expects(self::once())
            ->method('findByFilter')
            ->willReturn([$event]);

        $uut->mock(NotificationMailGeneratorInterface::class)
            ->expects(self::once())
            ->method('generate')
            ->with('/events/42')
            ->willReturn(0);

        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects(self::never())->method('info');

        $handler = $uut->target();
        $handler->setLogger($logger);
        $handler->handleSendEventNotifications(new SendEventNotificationsMessage(new DateInterval('P7D')));
    }
}
