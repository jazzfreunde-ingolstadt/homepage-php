<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\Type\EventCategoryType;
use Jazzfreunde\App\Entity\Type\EventCategoryEnum;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Terminierte Veranstaltung
 */
#[ORM\Entity]
#[ORM\Table(name: 'events')]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ],
    // normalizationContext: ['groups' => ['Event:read']],
    denormalizationContext: ['groups' => ['Event:write']],
    paginationClientItemsPerPage: true
)]
#[ApiFilter(DateFilter::class, properties: ['start'])]
#[ApiFilter(OrderFilter::class, properties: ['start'])]
class Event
{
    use PropertyInjectionTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(groups: ['Event:write'])]
    public ?int $id = null;
    #[ORM\Column(type: 'string')]
    #[Groups(groups: ['Event:write'])]
    public string $titel;
    #[ORM\Column(type: 'datetime')]
    #[Groups(groups: ['Event:write'])]
    public DateTime $start;
    #[ORM\Column(type: 'datetime')]
    #[Groups(groups: ['Event:write'])]
    public DateTime $end;
    #[ORM\ManyToOne(targetEntity: Ort::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[ApiProperty(readableLink: true, writableLink: false)]
    #[Groups(groups: ['Event:write'])]
    public Ort $ort;
    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(groups: ['Event:write'])]
    public ?string $subtitel = null;
    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(groups: ['Event:write'])]
    public ?string $link = null;
    #[ORM\Column(type: EventCategoryType::NAME, options: [ 'default' => EventCategoryEnum::DEFAULT ])]
    public EventCategoryEnum $category = EventCategoryEnum::default;
}
