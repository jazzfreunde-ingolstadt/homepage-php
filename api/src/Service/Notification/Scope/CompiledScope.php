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

    /**
     * Gets the regex pattern for the compiled scope.
     *
     * @return non-empty-string the regex pattern
     */
    public function getRegex(): string
    {
        return $this->regex;
    }

    /**
     * Gets the parameters associated with the compiled scope.
     *
     * @return AbstractParameter[] the parameters
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Gets the class name of the entity associated with the compiled scope.
     *
     * @return class-string the entity class name
     */
    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }

    /**
     * Gets the URI template for the compiled scope.
     *
     * @return Uri the URI template
     */
    public function getUri(): Uri
    {
        return $this->uri;
    }
}
