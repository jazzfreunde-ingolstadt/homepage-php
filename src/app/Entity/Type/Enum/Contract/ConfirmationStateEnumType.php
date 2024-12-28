<?php declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum\Contract;

use Jazzfreunde\App\Entity\Type\Enum\AbstractEnumType;
use Jazzfreunde\App\Type\Contract\ConfirmationStateEnum;

/**
 * Enity type for the possible states of a confirmation.
 * @see Jazzfreunde\App\Type\Contract\ConfirmationStateEnum
 */
final class ConfirmationStateEnumType extends AbstractEnumType
{
    public const ENTITY_NAME = 'confirmation_state';
    public const ENUM_CLASS_NAME = ConfirmationStateEnum::class;
}
