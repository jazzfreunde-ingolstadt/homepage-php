<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Terminierte Veranstaltung
 */
#[ORM\Entity]
#[ORM\Table(name: 'events')]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ]
)]
#[ApiFilter(DateFilter::class, properties: ['start'])]
#[ApiFilter(OrderFilter::class, properties: ['start'])]
#[ApiResource(paginationClientItemsPerPage: true)]
class Event
{
    /**
     * Immutable Object
     *
     * @param string|null $id
     * @param string      $titel
     * @param string|null $subtitel
     * @param DateTime    $start
     * @param DateTime    $end
     * @param string      $ort
     * @param string|null $link
     */
    public function __construct(
        #[ORM\Id]
        #[ORM\GeneratedValue]
        #[ORM\Column(type: 'integer')]
        public ?int $id = null,
        // public ?int $series_id,
        #[ORM\Column(type: 'string')]
        public string $titel,
        #[ORM\Column(type: 'string', nullable: true)]
        public ?string $subtitel = null,
        #[ORM\Column(type: 'datetime')]
        public DateTime $start,
        #[ORM\Column(type: 'datetime')]
        public DateTime $end,
        #[ORM\Column(type: 'string')]
        public string $ort,
        #[ORM\Column(type: 'string', nullable: true)]
        public ?string $link = null
    ) {
    }
}
