<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Api\Event;

use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata as API;
use DateTime;
use Jazzfreunde\App\Entity\Event as EventEntity;
use Jazzfreunde\App\Entity\EventLocation;
use Jazzfreunde\App\Type\Enum\EventCategoryEnum;
use Symfony\Component\ObjectMapper\Attribute\Map;

/**
 * API resource for planned events (e.g., concerts, meetings, etc.).
 *
 * @psalm-api
 */
#[API\ApiResource(
    shortName: 'Event',
    stateOptions: new Options(entityClass: EventEntity::class),
    operations: [
        new API\Get(),
        new API\GetCollection(),
    ],
    order: ['start' => 'ASC'],
    paginationClientItemsPerPage: true
)]
#[API\ApiFilter(DateFilter::class, properties: ['start'])]
#[API\ApiFilter(OrderFilter::class, properties: ['start'])]
#[Map(source: EventEntity::class)]
final class Event
{
    /**
     * @param int               $id
     * @param string            $title
     * @param DateTime          $start
     * @param DateTime          $end
     * @param EventLocation     $location
     * @param null|string       $subtitle
     * @param null|string       $link
     * @param EventCategoryEnum $category
     */
    public function __construct(
        /**
         * Unique identifier in the database.
         *
         * @var int
         */
        #[API\ApiProperty(required: true)]
        public int $id,

        /**
         * Title of the event.
         *
         * @var string
         */
        #[API\ApiProperty(required: true)]
        public string $title,

        /**
         * Start time of the event.
         *
         * @var DateTime
         */
        #[API\ApiProperty(required: true)]
        public DateTime $start,

        /**
         * End time of the event.
         *
         * @var DateTime
         */
        #[API\ApiProperty(required: true)]
        public DateTime $end,

        /**
         * Location of the event.
         *
         * @var EventLocation
         */
        #[API\ApiProperty(readableLink: true, writableLink: false, required: true)]
        public EventLocation $location,

        /**
         * Optional subtitle for the event.
         *
         * @var null|string
         */
        public ?string $subtitle = null,

        /**
         * Optional description for the event.
         *
         * @var null|string
         */
        public ?string $link = null,

        /**
         * Category of the event (e.g., concert, meeting, etc.).
         *
         * @var EventCategoryEnum
         */
        #[API\ApiProperty(required: true)]
        public EventCategoryEnum $category = EventCategoryEnum::default,
    ) {}
}
