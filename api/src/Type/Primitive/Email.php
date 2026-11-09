<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Type\Primitive;

use InvalidArgumentException;
use Override;

/**
 * E-Mail Typ.
 */
final class Email implements PrimitiveTypeInterface
{
    /**
     * @var non-empty-string
     */
    private readonly string $address;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (empty($value) || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("'{$value}' is not a valid email address.");
        }

        $this->address = strtolower($value);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->value();
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public static function from(mixed $value): static
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException('Value must be a string.');
        }

        return new self($value);
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public static function tryFrom(mixed $value): ?static
    {
        if (!is_string($value)) {
            return null;
        }

        try {
            return new self($value);
        } catch (InvalidArgumentException) {
            return null;
        }
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function value(): string
    {
        return $this->address;
    }
}
