<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\Structures\DateTimeSQL;

// #[ORM\Entity(repositoryClass: EventRepository::class)]
#[ORM\Entity()]
#[ORM\Table(name: 'events')]
final class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;
    // private ?int $series_id,
    #[ORM\Column(type: 'string')]
    private string $titel;
    #[ORM\Column(type: 'string')]
    private ?string $subtitel;
    #[ORM\Column(type: 'datetime')]
    private DateTime $start;
    #[ORM\Column(type: 'datetime')]
    private DateTime $end;
    #[ORM\Column(type: 'string')]
    private string $ort;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $link;
    // private ?string $thumbnail

    public function __construct(
        ?string $id = null,
        string $titel,
        string $subtitel,
        DateTime $start,
        DateTime $end,
        string $ort,
        ?string $link
    )
    {
        $this->id = $id;
        $this->titel = $titel;
        $this->subtitel = $subtitel;
        $this->start = $start;
        $this->end = $end;
        $this->ort = $ort;
        $this->link = $link;
    }

    /**
     * Solange readonly mit 8.1 noch nicht draußen ist...
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name): mixed
    {
        return $this->$name;
    }
}
