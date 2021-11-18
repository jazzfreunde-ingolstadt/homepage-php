<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Terminierte Veranstaltung
 */
#[ORM\Entity(repositoryClass: \Jazzfreunde\App\Model\EventRepository::class)]
#[ORM\Table(name: 'events')]
class Event
{
    /**
     * Immutable Object
     *
     * @param string|null $id
     * @param string      $titel
     * @param string      $subtitel
     * @param DateTime    $start
     * @param DateTime    $end
     * @param string      $ort
     * @param string|null $link
     */
    public function __construct(
        #[ORM\Id]
        #[ORM\GeneratedValue]
        #[ORM\Column(type: 'integer')]
        private ?int $id = null,
        // private ?int $series_id,
        #[ORM\Column(type: 'string')]
        private string $titel,
        #[ORM\Column(type: 'string')]
        private ?string $subtitel,
        #[ORM\Column(type: 'datetime')]
        private DateTime $start,
        #[ORM\Column(type: 'datetime')]
        private DateTime $end,
        #[ORM\Column(type: 'string')]
        private string $ort,
        #[ORM\Column(type: 'string', nullable: true)]
        private ?string $link
    ) {
    }

    /**
     * Solange readonly mit 8.1 noch nicht draußen ist...
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name): mixed
    {
        return $this->$name;
    }
}
