<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Security\VerificationCode\Model;

use DateTimeImmutable;
use InvalidArgumentException;
use Jazzfreunde\App\Service\Security\VerificationCode\Model\VerificationCodeDetails;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;

/**
 * Tests for verification code details.
 */
final class VerificationCodeDetailsTest extends TestCase
{
    /**
     * Tests that the constructor initializes properties correctly.
     */
    #[Test]
    public function constructorInitializesProperties(): void
    {
        $digits = '123456';
        $signatureHash = 'validSignatureHash';
        $expiresAt = new DateTimeImmutable('+1 hour');
        $verificationCode = new VerificationCodeDetails($digits, $signatureHash, $expiresAt);

        $this->assertSame($digits, $verificationCode->digits);
        $this->assertSame($signatureHash, $verificationCode->signatureHash);
        $this->assertSame($expiresAt, $verificationCode->expiresAt);
    }

    /**
     * Tests that the constructor throws an exception for invalid digits.
     */
    #[Test]
    #[TestWith(['invalidDigits'])]
    #[TestWith(['12345'])]
    #[TestWith(['1234567'])]
    #[TestWith(['1234a6'])]
    public function invalidDigitsThrowsException(string $invalidDigits): void
    {
        $this->expectException(InvalidArgumentException::class);
        new VerificationCodeDetails($invalidDigits, 'validSignatureHash', new DateTimeImmutable('+1 hour'));
    }

    /**
     * Tests that the constructor throws an exception for an empty signature hash.
     */
    #[Test]
    public function emptySignatureHashThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new VerificationCodeDetails('123456', '', new DateTimeImmutable('+1 hour'));
    }
}
