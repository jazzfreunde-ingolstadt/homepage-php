<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Repository\Filter;

use DateTimeImmutable;
use DateTimeZone;
use Jazzfreunde\Api\Type\Enum\EventCategoryEnum;

/**
 * Filter criteria for querying events.
 *
 * @psalm-api
 */
final class EventFilter
{
    public function __construct(
        /**
         * Earliest start date.
         *
         * @var DateTimeImmutable
         */
        public DateTimeImmutable $earliestStart = new DateTimeImmutable(timezone: new DateTimeZone('Europe/Berlin')),
        /**
         * Latest start date.
         *
         * @var null|DateTimeImmutable
         */
        public ?DateTimeImmutable $latestStart = null,
        /**
         * Filter by event category.
         *
         * @var null|EventCategoryEnum
         */
        public ?EventCategoryEnum $category = null,
    ) {}
}
