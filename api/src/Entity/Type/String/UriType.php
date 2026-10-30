<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity\Type\String;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\StringType;
use Jazzfreunde\Api\Type\Primitive\Uri;
use Override;

/**
 * URI type.
 */
final class UriType extends StringType
{
    public const ENTITY_NAME = 'uri';

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        $column['length'] = 254;

        return $platform->getStringTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!\is_string($value)) {
            throw new ConversionException(sprintf("Value for conversion to type '%s' must be a string.", Uri::class));
        }

        return Uri::tryFrom($value)
            ?? throw new ConversionException(sprintf("Value '%s' is not a valid URI.", $value));
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (\is_string($value)) {
            return $value;
        }

        if (!$value instanceof Uri) {
            throw new ConversionException(sprintf('Conversion to database representation is not possible. Value musst be of type "%s"', Uri::class));
        }

        return $value->__toString();
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
     * {@inheritDoc}
     *
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function getName(): string
    {
        return self::ENTITY_NAME;
    }
}
