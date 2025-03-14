<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use ApiPlatform\Metadata as API;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;

/**
 * Event locations
 */
#[ORM\Entity]
#[ORM\Table(name: 'event_locations')]
#[API\ApiResource(
    operations: [
        new API\Get(),
    ]
)]
class EventLocation
{
    use PropertyInjectionTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    public ?int $id = null;
    #[ORM\Column(type: 'string')]
    #[API\ApiProperty(required: true)]
    public string $name;
}
