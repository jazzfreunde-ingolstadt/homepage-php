<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\App\Repository\Filter\EventFilter;
use Jazzfreunde\App\Service\Event\EventRepositoryInterface;

/**
 * Repository for managing {@see Event} entities.
 *
 * @extends ServiceEntityRepository<Event>
 *
 * @psalm-api
 */
final class EventRepository extends ServiceEntityRepository implements EventRepositoryInterface
{
    /**
     * Init repository.
     *
     * @param ManagerRegistry $registry
     *
     * @psalm-suppress PossiblyUnusedMethod
     * @psalm-suppress UnusedParam
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getById(int $id): ?Event
    {
        return $this->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findByFilter(EventFilter $filter): array
    {
        $qb = $this->createQueryBuilder('events')
            ->where('events.start >= :earliestStart')
            ->setParameter('earliestStart', $filter->earliestStart);

        if (null !== $filter->latestStart) {
            $qb->andWhere('events.start <= :latestStart')
                ->setParameter('latestStart', $filter->latestStart);
        }

        if (null !== $filter->category) {
            $qb->andWhere('events.category = :category')
                ->setParameter('category', $filter->category);
        }

        return $qb->getQuery()->getResult();
    }
}
