<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum\Abstract;

/**
 * The type name does not adhere the naming convention.
 */
final class InvalidEnumTypeNameError extends \CompileError
{
    /**
     * @param string $name The name of the type
     */
    public function __construct(string $name)
    {
        $enumClass = \BackedEnum::class;
        parent::__construct("The name '$name' is not a valid enum. Make sure is a subclass of $enumClass.");
    }
}
