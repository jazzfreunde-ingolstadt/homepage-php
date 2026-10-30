<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Platform\Event;

use DateInterval;
use DateTime;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\Api\Entity\Event;
use Jazzfreunde\Api\Entity\EventLocation;
use Jazzfreunde\UnitTest\Fixtures\CallbackFixture;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Functional tests for the event collection API.
 *
 * @internal
 *
 * @coversNothing
 */
final class EventTest extends WebTestCase
{
    use SetupDatabaseTrait;

    public function testCollectionFiltersEventsByStartDate(): void
    {
        $client = $this->createClientWithEvents();
        $query = http_build_query(['start' => ['after' => '2030-05-10T18:00:00']]);

        $client->request(Request::METHOD_GET, '/api/events?'.$query);

        $this->assertResponseIsSuccessful();
        self::assertEqualsCanonicalizing(
            ['Early event', 'Middle event', 'Late event'],
            $this->eventTitles($client),
        );
    }

    public function testCollectionOrdersEventsByStartDate(): void
    {
        $client = $this->createClientWithEvents();
        $query = http_build_query(['order' => ['start' => 'asc']]);

        $client->request(Request::METHOD_GET, '/api/events?'.$query);

        $this->assertResponseIsSuccessful();
        self::assertSame(
            ['Past event', 'Early event', 'Middle event', 'Late event'],
            $this->eventTitles($client),
        );
    }

    public function testCollectionPaginatesWithClientSelectedPageSize(): void
    {
        $client = $this->createClientWithEvents();
        $query = http_build_query([
            'itemsPerPage' => 2,
            'order' => ['start' => 'asc'],
            'page' => 2,
        ]);

        $client->request(Request::METHOD_GET, '/api/events?'.$query);

        $this->assertResponseIsSuccessful();
        self::assertSame(['Middle event', 'Late event'], $this->eventTitles($client));
    }

    public function testCollectionDefaultsToAscendingStartDateOrderWhenPaginated(): void
    {
        $client = $this->createClientWithEvents();
        $query = http_build_query([
            'itemsPerPage' => 2,
            'page' => 2,
        ]);

        $client->request(Request::METHOD_GET, '/api/events?'.$query);

        $this->assertResponseIsSuccessful();
        self::assertSame(['Middle event', 'Late event'], $this->eventTitles($client));
    }

    public function testCollectionOnlyIncludesNotificationSourceWhenSubscriptionIsAvailable(): void
    {
        $client = self::createClient();
        $kernel = $client->getKernel();
        $this->initDatabase($kernel);
        $now = new DateTimeImmutable(timezone: new DateTimeZone('Europe/Berlin'));
        $eventStarts = [
            'Soon event' => $now->add(new DateInterval('P2D')),
            'Available event' => $now->add(new DateInterval('P4D')),
        ];
        $this->applyFixtures(
            $kernel,
            new CallbackFixture(callback: static function (ObjectManager $manager) use ($eventStarts): void {
                $location = new EventLocation();
                $location->name = 'Test venue';
                $manager->persist($location);

                foreach ($eventStarts as $title => $start) {
                    $event = new Event();
                    $event->title = $title;
                    $event->start = new DateTime($start->format('Y-m-d H:i:s'), $start->getTimezone());
                    $eventEnd = $start->add(new DateInterval('PT2H'));
                    $event->end = new DateTime($eventEnd->format('Y-m-d H:i:s'), $eventEnd->getTimezone());
                    $event->location = $location;
                    $manager->persist($event);
                }

                $manager->flush();
            }),
        );

        $client->request(Request::METHOD_GET, '/api/events');

        $this->assertResponseIsSuccessful();
        $eventsByTitle = array_column($this->eventResources($client), null, 'title');
        self::assertNull($eventsByTitle['Soon event']['notificationSource'] ?? null);

        $availableEvent = $eventsByTitle['Available event'];
        self::assertIsArray($availableEvent['notificationSource']);
        self::assertIsInt($availableEvent['id']);
        self::assertSame(
            '/events/'.$availableEvent['id'],
            $availableEvent['notificationSource']['resourceScope'],
        );
        self::assertSame($availableEvent['end'], $availableEvent['notificationSource']['expirationTime']);
    }

    public function testItemIncludesNotificationSourceWhenSubscriptionIsAvailable(): void
    {
        $client = $this->createClientWithEvents();
        $client->disableReboot();
        $client->request(Request::METHOD_GET, '/api/events');
        $event = array_column($this->eventResources($client), null, 'title')['Early event'];
        $eventId = $event['id'];
        self::assertIsInt($eventId);

        $client->request(Request::METHOD_GET, '/api/events/'.$eventId);

        $this->assertResponseIsSuccessful();

        /** @var array<string, mixed> $response */
        $response = json_decode((string) $client->getResponse()->getContent(), true, flags: JSON_THROW_ON_ERROR);
        $notificationSource = $response['notificationSource'] ?? null;
        self::assertIsArray($notificationSource);
        self::assertSame('/events/'.$eventId, $notificationSource['resourceScope']);
        self::assertSame($response['end'], $notificationSource['expirationTime']);
    }

    /**
     * Create a client with events whose insertion order differs from start-date order.
     */
    private function createClientWithEvents(): KernelBrowser
    {
        $client = self::createClient();
        $kernel = $client->getKernel();
        $this->initDatabase($kernel);
        $this->applyFixtures(
            $kernel,
            new CallbackFixture(callback: static function (ObjectManager $manager): void {
                $location = new EventLocation();
                $location->name = 'Test venue';
                $manager->persist($location);

                foreach ([
                    ['Late event', '2030-05-12 18:00:00'],
                    ['Past event', '2030-05-09 18:00:00'],
                    ['Early event', '2030-05-10 18:00:00'],
                    ['Middle event', '2030-05-11 18:00:00'],
                ] as [$title, $start]) {
                    $event = new Event();
                    $event->title = $title;
                    $event->start = new DateTime($start);
                    $event->end = new DateTime($start);
                    $event->location = $location;
                    $manager->persist($event);
                }

                $manager->flush();
            }),
        );

        return $client;
    }

    /**
     * @return list<string>
     */
    private function eventTitles(KernelBrowser $client): array
    {
        return array_map(static function (array $event): string {
            self::assertArrayHasKey('title', $event);
            self::assertIsString($event['title']);

            return $event['title'];
        }, $this->eventResources($client));
    }

    /**
     * @return list<array<mixed>>
     */
    private function eventResources(KernelBrowser $client): array
    {
        /** @var array<int|string, mixed> $response */
        $response = json_decode((string) $client->getResponse()->getContent(), true, flags: JSON_THROW_ON_ERROR);
        $events = $response['hydra:member'] ?? $response['member'] ?? $response;

        self::assertIsArray($events);
        self::assertIsList($events);

        return array_map(static function (mixed $event): array {
            self::assertIsArray($event);

            return $event;
        }, $events);
    }
}
