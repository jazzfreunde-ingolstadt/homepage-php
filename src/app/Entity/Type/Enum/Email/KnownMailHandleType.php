<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type\Enum\Email;

use Jazzfreunde\App\Entity\Type\Enum\Abstract\AbstractEnumType;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;

/**
 * All known mail handles
 */
class KnownMailHandleType extends AbstractEnumType
{
    /**
     * @override
     */
    public const ENTITY_NAME = 'known_mail_handle';
    /**
     * @override
     */
    public const ENUM_CLASS_NAME = KnownMailHandleEnum::class;
}
