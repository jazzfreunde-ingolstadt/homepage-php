<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Event;

use Jazzfreunde\Api\Entity\Event;
use Jazzfreunde\Api\Repository\Filter\EventFilter;

/**
 * Service for managing {@see Event} entities.
 */
interface EventRepositoryInterface
{
    /**
     * Get an event by it's event id from the database.
     *
     * @param int $id
     *
     * @return null|Event
     */
    public function getById(int $id): ?Event;

    /**
     * Find events by a given filter.
     *
     * @param EventFilter $filter
     *
     * @return Event[]
     */
    public function findByFilter(EventFilter $filter): array;
}
