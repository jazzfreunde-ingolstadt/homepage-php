<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Model;

use Doctrine\ORM\EntityRepository;
use Doctrine\DBAL\Driver\Exception;

/**
 * EventRepository
 */
final class EventRepository extends EntityRepository
{
    const DAYS_TO_ARCHIVE = 120;
    const DEFAULT_LIMIT = 20;

    /**
     * Alle zukünftigen Events
     * @param int $limit
     *
     * @return array
     */
    public function findFutureEvents(int $limit = self::DEFAULT_LIMIT): array
    {
        try {
            $futureEvents = $this->createQueryBuilder('event')
                ->where('CURRENT_TIMESTAMP() <= event.start')
                ->andWhere('CURRENT_TIMESTAMP() <= event.start')
                ->setFirstResult(0)
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult();
        } catch (Exception) {
            return [];
        }

        return $futureEvents;
    }

    /**
     * Alle vergangenen Events
     * @param int $limit
     *
     * @return array
     */
    public function findPastEvents(int $limit = self::DEFAULT_LIMIT): array
    {

        try {
            $pastEvents = $this->createQueryBuilder('event')
                ->where('CURRENT_TIMESTAMP() > event.start')
                ->andWhere('DATE_SUB(CURRENT_TIMESTAMP(), '.self::DAYS_TO_ARCHIVE.', \'day\') < event.start')
                ->orderBy('event.start', 'DESC')
                ->setFirstResult(0)
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult();
        } catch (Exception) {
            return [];
        }

        return $pastEvents;
    }

    /**
     * Alle zukünftigen Events
     * @param int $limit
     *
     * @return array
     */
    public function findArchivedEvents(int $limit = self::DEFAULT_LIMIT): array
    {
        try {
            $archivedEvents = $this->createQueryBuilder('event')
                ->where('DATE_SUB(CURRENT_TIMESTAMP(), '.self::DAYS_TO_ARCHIVE.', \'day\') >= event.start')
                ->orderBy('event.start', 'DESC')
                ->setFirstResult(0)
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult();
        } catch (Exception) {
            return [];
        }

        return $archivedEvents;
    }
}
