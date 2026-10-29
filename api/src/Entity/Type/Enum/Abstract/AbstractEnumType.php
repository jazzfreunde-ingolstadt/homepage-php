<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum\Abstract;

use BackedEnum;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\MariaDBPlatform;
use Doctrine\DBAL\Platforms\SQLitePlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use InvalidArgumentException;
use Override;
use ValueError;

/**
 * @template TEnum of BackedEnum
 * Basisklasse Doctrine Enum Typ
 */
abstract class AbstractEnumType extends Type
{
    /**
     * Doctrine type name used in entity column mappings; subclasses must override it.
     */
    public const string ENTITY_NAME = 'undefined';

    /**
     * Backed enum class converted to and from database values; subclasses must override it.
     */
    public const string ENUM_CLASS_NAME = 'undefined';

    /**
     * {@inheritDoc}
     */
    #[Override]
    public static function addType(string $name, string|Type $type): void
    {
        if (self::ENTITY_NAME === $name) {
            throw new EntityNameUndefinedError(static::class);
        }
        if (self::ENUM_CLASS_NAME === static::ENUM_CLASS_NAME) {
            throw new EnumClassNameUndefinedError(static::class);
        }
        if (!is_subclass_of(static::ENUM_CLASS_NAME, BackedEnum::class)) {
            throw new InvalidEnumTypeNameError(static::ENUM_CLASS_NAME);
        }

        parent::addType($name, $type);
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        if (!is_subclass_of(static::ENUM_CLASS_NAME, BackedEnum::class)) {
            throw new InvalidEnumTypeNameError(static::ENUM_CLASS_NAME);
        }

        $cases = array_map(
            /**
             * @param TEnum $type
             *
             * @return string
             */
            fn (BackedEnum $type) => "'{$type->value}'",
            self::cases()
        );

        if ($platform instanceof MariaDBPlatform) {
            return sprintf('ENUM(%s)', implode(', ', $cases));
        }

        if ($platform instanceof SQLitePlatform) {
            /**
             * @var string $columnName
             */
            $columnName = $column['name'] ?? throw new InvalidArgumentException('Column name is required.');

            return sprintf('TEXT CHECK(%s IN (%s))', $columnName, implode(', ', $cases));
        }

        throw new InvalidArgumentException(sprintf('Platform "%s" is not supported.', $platform::class));
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!\is_string($value)) {
            throw new ConversionException(sprintf("Value for conversion to type '%s' must be a string.", static::ENUM_CLASS_NAME));
        }

        try {
            return static::from($value);
        } catch (ValueError $e) {
            throw new ConversionException('Conversion to enum type is not possible.', previous: $e);
        }
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (\is_string($value) || \is_int($value)) {
            $value = static::tryFrom($value);
        }

        if (!$value instanceof BackedEnum) {
            throw new ConversionException(sprintf('Conversion to database representation is not possible. Value musst be of type "%s"', static::ENUM_CLASS_NAME));
        }

        return $value->value;
    }

    /**
     * {@inheritDoc}
     *
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function requiresSQLCommentHint(AbstractPlatform $_): bool
    {
        return true;
    }

    /**
     * @param int|string $value
     *
     * @return TEnum
     *
     * @throws ValueError
     */
    public static function from(int|string $value): BackedEnum
    {
        return static::enumClass()::from($value);
    }

    /**
     * @param int|string $value
     *
     * @return null|TEnum
     */
    public static function tryFrom(int|string $value): ?BackedEnum
    {
        return static::enumClass()::tryFrom($value);
    }

    /**
     * @return class-string<TEnum>
     */
    abstract protected static function enumClass(): string;

    /**
     * @return TEnum[]
     */
    private static function cases(): array
    {
        return static::enumClass()::cases();
    }
}
