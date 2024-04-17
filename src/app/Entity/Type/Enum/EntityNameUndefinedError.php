<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Type\Enum;

/**
 * The entity name for the type has not been defined.
 */
class EntityNameUndefinedError extends \CompileError
{
    /**
     * @inheritDoc
     */
    public function EntityNameUndefinedError(string $className)
    {
        parent::__construct("The entity name for '$className' has not been defined. Override the ENTITY_NAME constant.");
    }
}
