<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;

/**
 * Veranstaltungsorte
 */
#[ORM\Entity]
#[ORM\Table(name: 'orte')]
#[ApiResource(
    operations: [
        new Get(),
    ]
)]
class Ort
{
    use PropertyInjectionTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    public ?int $id = null;
    #[ORM\Column(type: 'string')]
    public string $name;
}
