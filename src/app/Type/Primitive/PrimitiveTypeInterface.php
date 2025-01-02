<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Type\Primitive;

/**
 * Interface for primitive types
 */
interface PrimitiveTypeInterface
{
    /**
     * Create a new instance from a value
     *
     * @param mixed $value
     * @return static|null
     */
    public static function tryFrom(mixed $value): static|null;

    /**
     * Get the value as string
     *
     * @return string
     */
    public function __toString(): string;
}
