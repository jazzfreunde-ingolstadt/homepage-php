<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum;

/**
 * The enum classname for the type has not been defined.
 */
class EnumClassNameUndefinedError extends \CompileError
{
    /**
     * @inheritDoc
     */
    public function EnumClassNameUndefinedError(string $className)
    {
        parent::__construct("The enum classname for '$className' has not been defined. Override the ENUM_CLASS_NAME constant.");
    }
}
