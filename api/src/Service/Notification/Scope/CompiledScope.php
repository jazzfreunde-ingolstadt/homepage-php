<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use Jazzfreunde\Api\Service\Notification\Scope\Parameter\AbstractParameter;
use Jazzfreunde\Api\Type\Primitive\Uri;

/**
 * Represents a compiled notification scope.
 */
final class CompiledScope
{
    /**
     * @param non-empty-string    $regex           the anchored, delimited regex pattern for the compiled scope
     * @param AbstractParameter[] $parameters      the parameters associated with the compiled scope
     * @param class-string        $entityClassName the class name of the entity associated with the compiled scope
     * @param Uri                 $uri             the URI template for the compiled scope
     */
    public function __construct(
        public readonly string $regex,
        public readonly array $parameters,
        public readonly string $entityClassName,
        public readonly Uri $uri,
    ) {}
}
