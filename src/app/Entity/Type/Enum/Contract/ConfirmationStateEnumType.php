<?php declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum\Contract;

use Jazzfreunde\App\Entity\Type\Enum\Abstract\AbstractEnumType;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;

/**
 * Enity type for the possible states of a confirmation.
 * @see Jazzfreunde\App\Type\Contract\ConfirmationStateEnum
 */
final class ConfirmationStateEnumType extends AbstractEnumType
{
    /**
     * @override
     */
    public const ENTITY_NAME = 'confirmation_state';
    /**
     * @override
     */
    public const ENUM_CLASS_NAME = ConfirmationStateEnum::class;
}
