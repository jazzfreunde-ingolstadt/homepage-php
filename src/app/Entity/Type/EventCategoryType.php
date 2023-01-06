<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use Jazzfreunde\App\Entity\Type\EventCategoryEnum;

/**
 * Veranstaltungskategorien
 */
class EventCategoryType extends Type
{
    const NAME = 'event_category';

    /**
     * @inheritDoc
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        $cases = array_map(fn(EventCategoryEnum $type) => "'{$type->value}'", EventCategoryEnum::cases());

        return sprintf("ENUM(%s)", implode(", ", $cases));
    }

    /**
     * @inheritDoc
     */
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): mixed
    {
        try {
            return EventCategoryEnum::from($value);
        } catch (\ValueError $e) {
            throw new ConversionException('Conversion to enum type is not possible.', previous: $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!($value instanceof EventCategoryEnum)) {
            throw new ConversionException('Conversion to database representation is not possible. Value musst be of type '.EventCategoryEnum::cases());
        }

        return $value->value;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @inheritDoc
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
