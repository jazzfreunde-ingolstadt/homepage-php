<?php

declare(strict_types=1);

namespace JazzfreundeTests\Api\Tests\Type\Primitive;

use InvalidArgumentException;
use Jazzfreunde\Api\Type\Primitive\HexToken;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

/**
 * Tests for the HexToken type.
 *
 * @internal
 *
 * @coversNothing
 */
final class HexTokenTest extends TestCase
{
    /**
     * Test that a valid hex token is created successfully.
     */
    #[Test]
    public function validHexTokenCreation(): void
    {
        $length = HexToken::LENGTH;

        $token = new HexToken('1234567890abcdef1234567890abcdef');
        $this->assertEquals('1234567890abcdef1234567890abcdef', $token->value());
    }

    /**
     * Test that an invalid hex token throws an exception.
     */
    #[Test]
    public function invalidHexTokenThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new HexToken('invalid_token');
    }

    /**
     * Test that no value generates a valid hex token.
     */
    #[Test]
    public function noValueGeneratesHexToken(): void
    {
        $token = new HexToken();
        $this->assertMatchesRegularExpression('/^[0-9a-f]{32}$/', $token->value());
    }

    /**
     * Test tryFrom with invalid inputs.
     */
    #[Test]
    #[TestWith([123])]
    #[TestWith(['invalid'])]
    #[TestWith([''])]
    public function tryFromInvalidInputs(mixed $input): void
    {
        $result = HexToken::tryFrom($input);
        $this->assertNull($result);
    }

    /**
     * Test tryFrom with valid hex token.
     */
    #[Test]
    public function tryFromValidHexToken(): void
    {
        $result = HexToken::tryFrom('1234567890abcdef1234567890abcdef');
        $this->assertInstanceOf(HexToken::class, $result);
        $this->assertEquals('1234567890abcdef1234567890abcdef', $result->value());
    }

    /**
     * Test string representation of HexToken.
     */
    #[Test]
    public function hexTokenStringRepresentation(): void
    {
        $token = new HexToken('1234567890abcdef1234567890abcdef');
        $this->assertEquals('1234567890abcdef1234567890abcdef', (string) $token);
    }
}
