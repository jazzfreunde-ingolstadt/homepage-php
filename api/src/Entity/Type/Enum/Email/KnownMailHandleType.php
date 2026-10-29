<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum\Email;

use Jazzfreunde\App\Entity\Type\Enum\Abstract\AbstractEnumType;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;

/**
 * All known mail handles.
 *
 * @extends AbstractEnumType<KnownMailHandleEnum>
 */
final class KnownMailHandleType extends AbstractEnumType
{
    /**
     * @override
     */
    public const string ENTITY_NAME = 'known_mail_handle';

    /**
     * @override
     */
    public const string ENUM_CLASS_NAME = KnownMailHandleEnum::class;

    /**
     * @return class-string<KnownMailHandleEnum>
     */
    protected static function enumClass(): string
    {
        return self::ENUM_CLASS_NAME;
    }
}
