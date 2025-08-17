<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type\String;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Jazzfreunde\App\Type\Primitive\HexToken;
use Override;

/**
 * hexadecimal token type
 */
final class HexTokenType extends StringType
{
    public const ENTITY_NAME = 'hextoken';

    /**
     * @inheritDoc
     */
    #[Override]
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        $column['length'] = HexToken::LENGTH;
        $column['fixed'] = true;

        return $platform->getStringTypeDeclarationSQL($column);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!\is_string($value)) {
            throw new ConversionException(sprintf("Value for conversion to type '%s' must be a string.", HexToken::class));
        }

        return HexToken::tryFrom($value)
            ?? throw new ConversionException(sprintf("Value '%s' is not a valid hex token.", $value));
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

        if (!$value instanceof HexToken) {
            throw new ConversionException(sprintf('Conversion to database representation is not possible. Value musst be of type "%s"', HexToken::class));
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
