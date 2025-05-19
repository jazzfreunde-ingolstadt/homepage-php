<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Type\Primitive;

use Override;

/**
 * E-Mail Typ
 */
final class Email implements PrimitiveTypeInterface
{
    private readonly string $address;

    /**
     * @inheritDoc
     */
    #[Override]
    public static function tryFrom(mixed $value): static|null
    {
        if (!is_string($value)) {
            return null;
        }
        
        return new self($value);
    }

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("'{$value}' is not a valid email address.");
        }

        $this->address = $value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->address;
    }
}
