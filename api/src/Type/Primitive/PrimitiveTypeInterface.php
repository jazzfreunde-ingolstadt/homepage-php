<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Type\Primitive;

use InvalidArgumentException;
use Stringable;

/**
 * Interface for primitive types.
 */
interface PrimitiveTypeInterface extends Stringable
{
    /**
     * Get the value as string.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Create a new instance from a value.
     *
     * @param mixed $value
     *
     * @return static
     *
     * @throws InvalidArgumentException if the value is invalid
     */
    public static function from(mixed $value): static;

    /**
     * Create a new instance from a value.
     *
     * @param mixed $value
     *
     * @return null|static
     */
    public static function tryFrom(mixed $value): ?static;

    /**
     * Returns the value of the primitive type.
     *
     * @return non-empty-string
     */
    public function value(): string;
}
