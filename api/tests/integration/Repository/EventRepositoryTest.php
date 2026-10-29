<?php

declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Repository;

use DateTime;
use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\App\Entity\EventLocation;
use Jazzfreunde\App\Repository\EventRepository;
use Jazzfreunde\App\Repository\Filter\EventFilter;
use Jazzfreunde\App\Type\Enum\EventCategoryEnum;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Tests for {@see EventRepository}.
 *
 * @internal
 *
 * @coversNothing
 */
final class EventRepositoryTest extends KernelTestCase
{
    use SetupDatabaseTrait;

    public function testGetByIdReturnsEventOrNull(): void
    {
        $kernel = self::bootKernel();
        $this->initDatabase($kernel);

        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);
        $manager = $registry->getManagerForClass(Event::class);
        self::assertNotNull($manager);

        $location = new EventLocation();
        $location->name = 'Test venue';
        $manager->persist($location);

        $event = $this->createEvent($manager, $location, 'Existing event', '2030-05-12 18:00:00');
        $manager->flush();

        /** @var EventRepository $repository */
        $repository = self::getContainer()->get(EventRepository::class);

        self::assertNotNull($event->id);
        self::assertSame($event, $repository->getById($event->id));
        self::assertNull($repository->getById(-1));
    }

    public function testFindByFilterUsesInclusiveDateBoundsAndOptionalLatestDate(): void
    {
        $kernel = self::bootKernel();
        $this->initDatabase($kernel);

        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);
        $manager = $registry->getManagerForClass(Event::class);
        self::assertNotNull($manager);

        $location = new EventLocation();
        $location->name = 'Test venue';
        $manager->persist($location);

        $events = [
            $this->createEvent($manager, $location, 'Before range', '2030-05-09 18:00:00'),
            $this->createEvent($manager, $location, 'At earliest', '2030-05-10 18:00:00'),
            $this->createEvent($manager, $location, 'Within range', '2030-05-11 18:00:00'),
            $this->createEvent($manager, $location, 'At latest', '2030-05-12 18:00:00'),
            $this->createEvent($manager, $location, 'After range', '2030-05-13 18:00:00'),
        ];
        $manager->flush();

        /** @var EventRepository $repository */
        $repository = self::getContainer()->get(EventRepository::class);

        $boundedResults = $repository->findByFilter(new EventFilter(
            earliestStart: new DateTimeImmutable('2030-05-10 18:00:00'),
            latestStart: new DateTimeImmutable('2030-05-12 18:00:00'),
        ));
        self::assertEqualsCanonicalizing(
            [$events[1]->id, $events[2]->id, $events[3]->id],
            array_map(static fn (Event $event): ?int => $event->id, $boundedResults),
        );

        $openEndedResults = $repository->findByFilter(new EventFilter(
            earliestStart: new DateTimeImmutable('2030-05-12 18:00:00'),
        ));
        self::assertEqualsCanonicalizing(
            [$events[3]->id, $events[4]->id],
            array_map(static fn (Event $event): ?int => $event->id, $openEndedResults),
        );
    }

    public function testFindByFilterCanRestrictResultsByCategory(): void
    {
        $kernel = self::bootKernel();
        $this->initDatabase($kernel);

        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);
        $manager = $registry->getManagerForClass(Event::class);
        self::assertNotNull($manager);

        $location = new EventLocation();
        $location->name = 'Test venue';
        $manager->persist($location);

        $session = $this->createEvent(
            $manager,
            $location,
            'Session',
            '2030-05-10 18:00:00',
            EventCategoryEnum::session,
        );
        $jazztage = $this->createEvent(
            $manager,
            $location,
            'Jazztage',
            '2030-05-11 18:00:00',
            EventCategoryEnum::jazztage,
        );
        $manager->flush();

        /** @var EventRepository $repository */
        $repository = self::getContainer()->get(EventRepository::class);

        $results = $repository->findByFilter(new EventFilter(
            earliestStart: new DateTimeImmutable('2030-05-01 00:00:00'),
            category: EventCategoryEnum::session,
        ));

        self::assertSame([$session->id], array_map(static fn (Event $event): ?int => $event->id, $results));
        self::assertNotSame($session->id, $jazztage->id);
    }

    private function createEvent(
        ObjectManager $manager,
        EventLocation $location,
        string $title,
        string $start,
        EventCategoryEnum $category = EventCategoryEnum::default,
    ): Event {
        $event = new Event();
        $event->title = $title;
        $event->start = new DateTime($start);
        $event->end = new DateTime($start);
        $event->location = $location;
        $event->category = $category;

        $manager->persist($event);

        return $event;
    }
}
