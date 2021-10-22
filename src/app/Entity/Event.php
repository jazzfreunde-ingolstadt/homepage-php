<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use Doctrine\ORM\Mapping as ORM;

// #[ORM\Entity(repositoryClass: EventRepository::class)]
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
    private string $start;
    #[ORM\Column(type: 'datetime')]
    private string $end;
    #[ORM\Column(type: 'string')]
    private string $ort;
    #[ORM\Column(type: 'string')]
    private ?string $link;
    // private ?string $thumbnail

    public function __construct(
        ?string $id = null,
        string $titel,
        string $subtitel,
        string $start,
        string $end,
        string $ort,
        string $link
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
}
