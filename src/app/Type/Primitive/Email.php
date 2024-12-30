<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Type\Primitive;

/**
 * E-Mail Typ
 */
final class Email implements PrimitiveTypeInterface
{
    private string $address;

    /**
     * @param string $email
     * @return bool
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
