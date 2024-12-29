<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type\Enum\Event;

use Jazzfreunde\App\Entity\Type\Enum\Abstract\AbstractEnumType;
use Jazzfreunde\App\Type\Enum\EventCategoryEnum;

/**
 * Veranstaltungskategorien
 */
class EventCategoryType extends AbstractEnumType
{
    /**
     * @override
     */
    public const ENTITY_NAME = 'event_category';
    /**
     * @override
     */
    public const ENUM_CLASS_NAME = EventCategoryEnum::class;
}
