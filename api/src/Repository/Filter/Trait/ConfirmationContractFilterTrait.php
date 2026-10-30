<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Repository\Filter\Trait;

use Jazzfreunde\Api\Type\Enum\Contract\ConfirmationStateEnum;

/**
 * Trait for filtering confirmation contracts.
 */
trait ConfirmationContractFilterTrait
{
    /**
     * The confirmation state to filter by.
     * Defaults to filtering only confirmed contracts.
     */
    public ?ConfirmationStateEnum $confirmationState = ConfirmationStateEnum::Confirmed;
}
