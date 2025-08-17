<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type\String;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Jazzfreunde\App\Type\Primitive\Email;
use Override;

/**
 * email type
 */
final class EmailType extends StringType
{
    public const ENTITY_NAME = 'email';

    /**
     * @inheritDoc
     */
    #[Override]
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        $column['length'] = 254;

        return $platform->getStringTypeDeclarationSQL($column);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!\is_string($value)) {
            throw new ConversionException(sprintf("Value for conversion to type '%s' must be a string.", Email::class));
        }

        return Email::tryFrom($value)
            ?? throw new ConversionException(sprintf("Value '%s' is not a valid email address.", $value));
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (\is_string($value)) {
            return $value;
        }

        if (!$value instanceof Email) {
            throw new ConversionException(sprintf('Conversion to database representation is not possible. Value musst be of type "%s"', Email::class));
        }

        return $value->__toString();
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
     * @inheritDoc
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function getName(): string
    {
        return self::ENTITY_NAME;
    }
}
