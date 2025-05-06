<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum\Abstract;

/**
 * The enum classname for the type has not been defined.
 */
final class EnumClassNameUndefinedError extends \CompileError
{
    /**
     * @param string $className The class name of the type
     */
    public function __construct(string $className)
    {
        parent::__construct("The enum classname for '$className' has not been defined. Override the ENUM_CLASS_NAME constant.");
    }
}
