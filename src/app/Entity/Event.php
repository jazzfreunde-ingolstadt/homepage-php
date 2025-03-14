<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Metadata as API;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\Type\Enum\Event\EventCategoryType;
use Jazzfreunde\App\Type\Enum\EventCategoryEnum;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Terminierte Veranstaltung
 */
#[ORM\Entity]
#[ORM\Table(name: 'events')]
#[API\ApiResource(
    operations: [
        new Api\Get(),
        new Api\GetCollection()
    ],
    // normalizationContext: ['groups' => ['Event:read']],
    denormalizationContext: ['groups' => ['Event:write']],
    paginationClientItemsPerPage: true
)]
#[API\ApiFilter(DateFilter::class, properties: ['start'])]
#[API\ApiFilter(OrderFilter::class, properties: ['start'])]
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
    #[API\ApiProperty(required: true)]
    public string $title;
    #[ORM\Column(type: 'datetime')]
    #[Groups(groups: ['Event:write'])]
    #[API\ApiProperty(required: true)]
    public DateTime $start;
    #[ORM\Column(type: 'datetime')]
    #[Groups(groups: ['Event:write'])]
    #[API\ApiProperty(required: true)]
    public DateTime $end;
    #[ORM\ManyToOne(targetEntity: EventLocation::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[API\ApiProperty(readableLink: true, writableLink: false, required: true)]
    #[Groups(groups: ['Event:write'])]
    public EventLocation $location;
    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(groups: ['Event:write'])]
    public ?string $subtitle = null;
    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(groups: ['Event:write'])]
    public ?string $link = null;
    #[ORM\Column(type: EventCategoryType::ENTITY_NAME, options: [ 'default' => EventCategoryEnum::DEFAULT ])]
    #[API\ApiProperty(required: true)]
    public EventCategoryEnum $category = EventCategoryEnum::default;
}
