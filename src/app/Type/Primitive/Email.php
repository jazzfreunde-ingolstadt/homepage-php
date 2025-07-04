<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Type\Primitive;

use Override;

/**
 * E-Mail Typ
 */
final class Email implements PrimitiveTypeInterface
{
    /**
     * @var non-empty-string
     */
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
        if (empty($value) || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("'{$value}' is not a valid email address.");
        }

        $this->address = $value;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->value();
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function value(): string
    {
        return $this->address;
    }
}
