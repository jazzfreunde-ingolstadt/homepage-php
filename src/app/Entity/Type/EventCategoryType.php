<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type;

use Jazzfreunde\App\Entity\Type\Enum\AbstractEnumType;
use Jazzfreunde\App\Type\EventCategoryEnum;

/**
 * Veranstaltungskategorien
 */
class EventCategoryType extends AbstractEnumType
{
    public const ENTITY_NAME = 'event_category';
    public const ENUM_CLASS_NAME = EventCategoryEnum::class;
}
