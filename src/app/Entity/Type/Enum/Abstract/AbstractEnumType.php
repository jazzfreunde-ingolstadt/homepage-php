<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type\Enum\Abstract;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use Jazzfreunde\App\Entity\Type\Enum\Abstract\InvalidEnumTypeNameError;

/**
 * Basisklasse Doctrine Enum Typ
 */
class AbstractEnumType extends Type
{
    /**
     * @var string
     */
    public const ENTITY_NAME = 'undefined';
    /**
     * @var string
     */
    public const ENUM_CLASS_NAME = 'undefined';

    /**
     * @inheritDoc
     */
    public static function addType(string $name, string $className): void
    {
        if ($name === self::ENTITY_NAME) {
            throw new EntityNameUndefinedError(static::class);
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

        $cases = array_map(fn(\BackedEnum $type) => "'{$type->value}'", static::cases());

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
            return static::from($value);
        } catch (\ValueError $e) {
            throw new ConversionException('Conversion to enum type is not possible.', previous: $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (\is_string($value) || \is_int($value)) {
            $value = static::tryFrom($value);
        }

        if (!$value instanceof \BackedEnum) {
            throw new ConversionException(sprintf('Conversion to database representation is not possible. Value musst be of type "%s"', static::ENUM_CLASS_NAME));
        }

        return $value->value;
    }

    /**
     * @inheritDoc
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function requiresSQLCommentHint(AbstractPlatform $_): bool
    {
        return true;
    }

    /**
     * @return \BackedEnum[]
     */
    private static function cases(): array
    {
        /** @var \BackedEnum[] */
        $cases = call_user_func([static::ENUM_CLASS_NAME, 'cases']);

        return $cases;
    }

    /**
     * @param int|string $value
     * @return \BackedEnum
     */
    public static function from(int|string $value): \BackedEnum
    {
        /** @var \BackedEnum */
        $enum = call_user_func([static::ENUM_CLASS_NAME, 'from'], $value);

        return $enum;
    }

    /**
     * @param int|string $value
     * @return \BackedEnum|null
     */
    public static function tryFrom(int|string $value): ?\BackedEnum
    {
        /** @var \BackedEnum|null */
        $enum = call_user_func([static::ENUM_CLASS_NAME, 'tryFrom'], $value);
        
        return $enum;
    }
}
