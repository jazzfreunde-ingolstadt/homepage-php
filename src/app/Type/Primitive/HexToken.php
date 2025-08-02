<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Type\Primitive;

use InvalidArgumentException;
use Override;

/**
 * E-Mail Typ
 */
final class HexToken implements PrimitiveTypeInterface
{
    public const LENGTH = 32;

    /**
     * @var non-empty-string
     */
    private readonly string $token;

    /**
     * @inheritDoc
     */
    #[Override]
    public static function tryFrom(mixed $value): static|null
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
     * @param string $value
     */
    public function __construct(?string $value = null)
    {
        $length = self::LENGTH;

        if ($value === null) {
            $this->token = self::generateToken($length);
            return;
        }

        if (empty($value) || false === preg_match("/\^[0-9a-f]{$length}\$/", $value)) {
            throw new InvalidArgumentException('Invalid token format');
        }

        $this->token = $value;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->token;
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function value(): string
    {

        return $this->token;
    }

    /**
     * Generate a new token
     *
     * @param int<1, max> $length Length of the token in bytes
     *
     * @return non-empty-string
     */
    private static function generateToken(int $length): string
    {
        return bin2hex(random_bytes($length));
    }
}
