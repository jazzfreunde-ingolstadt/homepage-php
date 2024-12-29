<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type\String;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Jazzfreunde\App\Type\Primitive\Email;

/**
 * E-Mail Typ
 */
final class EmailType extends StringType
{
    public const ENTITY_NAME = 'email';

    /**
     * @inheritDoc
     */
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!\is_string($value)) {
            throw new ConversionException(sprintf("Value for conversion to type '%s' must be a string.", Email::class));
        }

        if ($value instanceof Email) {
            return parent::convertToDatabaseValue($value->__toString(), $platform);
        }

        try {
            return new Email($value);
        } catch (\ValueError $e) {
            throw new ConversionException('Conversion to enum type is not possible.', previous: $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): mixed
    {
        if (!$value instanceof Email) {
            throw new ConversionException(sprintf('Conversion to database representation is not possible. Value musst be of type "%s"', Email::class));
        }

        return $value->__toString();
    }

    /**
     * @inheritDoc
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return self::ENTITY_NAME;
    }
}
