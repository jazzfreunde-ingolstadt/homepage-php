<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum\Abstract;

/**
 * The entity name for the type has not been defined.
 */
final class EntityNameUndefinedError extends \CompileError
{
    /**
     * @param string $className The class name of the type
     */
    public function __construct(string $className)
    {
        parent::__construct("The entity name for '$className' has not been defined. Override the ENTITY_NAME constant.");
    }
}
