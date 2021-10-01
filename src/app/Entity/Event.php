<?php

namespace Jazzfreunde\App\Entity;

use Doctrine\ORM\Mapping as ORM;

// #[ORM\Entity(repositoryClass: EventRepository::class)]
final class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;
    // public ?int $series_id,
    #[ORM\Column(type: 'string')]
    public string $titel;
    #[ORM\Column(type: 'string')]
    public ?string $subtitel;

    #[ORM\Column(type: 'datetime')]
    public string $start;
    #[ORM\Column(type: 'datetime')]
    public string $end;
    #[ORM\Column(type: 'string')]
    public string $ort;
    #[ORM\Column(type: 'string')]
    public ?string $link;
    // public ?string $thumbnail
}
