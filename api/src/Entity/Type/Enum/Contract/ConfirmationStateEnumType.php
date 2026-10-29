<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum\Contract;

use Jazzfreunde\App\Entity\Type\Enum\Abstract\AbstractEnumType;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;

/**
 * Enity type for the possible states of a confirmation.
 *
 * @extends AbstractEnumType<ConfirmationStateEnum>
 */
final class ConfirmationStateEnumType extends AbstractEnumType
{
    /**
     * @override
     */
    public const string ENTITY_NAME = 'confirmation_state';

    /**
     * @override
     */
    public const string ENUM_CLASS_NAME = ConfirmationStateEnum::class;

    /**
     * @return class-string<ConfirmationStateEnum>
     */
    protected static function enumClass(): string
    {
        return self::ENUM_CLASS_NAME;
    }
}
