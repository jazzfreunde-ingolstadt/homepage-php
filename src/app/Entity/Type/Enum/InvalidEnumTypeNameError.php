<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum;

/**
 * The type name does not adhere the naming convention.
 */
class InvalidEnumTypeNameError extends \CompileError
{
    /**
     * @inheritDoc
     */
    public function InvalidEnumTypeNameException(string $name)
    {
        $enumClass = \BackedEnum::class;
        parent::__construct("The name '$name' is not a valid enum. Make sure is a subclass of $enumClass.");
    }
}
