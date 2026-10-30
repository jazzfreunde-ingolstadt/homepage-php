<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity\Type\Enum\Event;

use Jazzfreunde\Api\Entity\Type\Enum\Abstract\AbstractEnumType;
use Jazzfreunde\Api\Type\Enum\EventCategoryEnum;

/**
 * Veranstaltungskategorien.
 *
 * @extends AbstractEnumType<EventCategoryEnum>
 */
final class EventCategoryType extends AbstractEnumType
{
    /**
     * @override
     */
    public const string ENTITY_NAME = 'event_category';

    /**
     * {@inheritDoc}
     */
    public const string ENUM_CLASS_NAME = EventCategoryEnum::class;

    /**
     * @return class-string<EventCategoryEnum>
     */
    protected static function enumClass(): string
    {
        return self::ENUM_CLASS_NAME;
    }
}
