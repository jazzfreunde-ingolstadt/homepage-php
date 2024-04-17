<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type\Enum;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use Jazzfreunde\App\Entity\Type\Enum\InvalidEnumTypeNameError;

/**
 * Basisklasse Doctrine Enum Typ
 */
class AbstractEnumType extends Type
{
    public const ENTITY_NAME = 'undefined';
    public const ENUM_CLASS_NAME = 'undefined';

    /**
     * @inheritDoc
     */
    public static function addType(string $name, string $className): void
    {
        if ($name === self::ENTITY_NAME) {
            throw new EntityNameUndefinedError();
        }
        if (static::ENUM_CLASS_NAME === self::ENUM_CLASS_NAME) {
            throw new EnumClassNameUndefinedError(static::class);
        }
        if (!is_subclass_of(static::ENUM_CLASS_NAME, \BackedEnum::class)) {
            throw new InvalidEnumTypeNameError(static::ENUM_CLASS_NAME);
        }

        parent::addType($name, $className);
    }

    /**
     * @inheritDoc
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        if (!is_subclass_of(static::ENUM_CLASS_NAME, \BackedEnum::class)) {
            throw new InvalidEnumTypeNameError(static::ENUM_CLASS_NAME);
        }

        $cases = array_map(fn(\BackedEnum $type) => "'{$type->value}'", static::ENUM_CLASS_NAME::cases());

        return sprintf("ENUM(%s)", implode(", ", $cases));
    }

    /**
     * @inheritDoc
     */
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!\is_string($value)) {
            throw new ConversionException(sprintf("Value for conversion to type '%s' must be a string.", static::ENUM_CLASS_NAME));
        }

        try {
            return static::ENUM_CLASS_NAME::from($value);
        } catch (\ValueError $e) {
            throw new ConversionException('Conversion to enum type is not possible.', previous: $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!$value instanceof \BackedEnum ||is_null(static::ENUM_CLASS_NAME::tryFrom($value->value))) {
            throw new ConversionException(sprintf('Conversion to database representation is not possible. Value musst be of type "%s"', static::ENUM_CLASS_NAME));
        }

        return $value->value;
    }

    /**
     * @inheritDoc
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
