<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Api\Event;

use DateTime;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\App\Entity\EventLocation;
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

    /**
     * Create a client with events whose insertion order differs from start-date order.
     */
    private function createClientWithEvents(): KernelBrowser
    {
        $client = self::createClient();
        $this->initDatabase(self::$kernel);
        $this->applyFixtures(
            self::$kernel,
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
        /** @var array<int|string, mixed> $response */
        $response = json_decode((string) $client->getResponse()->getContent(), true, flags: JSON_THROW_ON_ERROR);
        $events = $response['hydra:member'] ?? $response['member'] ?? $response;

        self::assertIsArray($events);
        self::assertIsList($events);

        return array_column($events, 'title');
    }
}
