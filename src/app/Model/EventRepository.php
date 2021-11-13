<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Model;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 */
final class EventRepository extends EntityRepository
{
    /**
     * Alle vergangenen Events
     * @param int $limit
     *
     * @return array
     */
    public function findPastEvents(int $limit = 20): array
    {
        return $this->createQueryBuilder('event')
            ->where('CURRENT_TIMESTAMP() > event.start')
            ->setFirstResult(0)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Alle zukünftigen Events
     * @param int $limit
     *
     * @return array
     */
    public function findFutureEvents(int $limit = 20): array
    {
        return $this->createQueryBuilder('event')
            ->where('CURRENT_TIMESTAMP() <= event.start')
            ->setFirstResult(0)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
