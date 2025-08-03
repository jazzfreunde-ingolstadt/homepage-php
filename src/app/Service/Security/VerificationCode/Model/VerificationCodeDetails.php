<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Service\Security\VerificationCode\Model;

use DateTimeImmutable;
use InvalidArgumentException;

/**
 * Represents the details of a verification code used for user authentication.
 */
final class VerificationCodeDetails
{
    /**
     * The 6-digit numeric code used for verification.
     *
     *
     * @var string
     */
    public readonly string $digits;

    /**
     * Secure hash of the verification code, used to verify its authenticity.
     *
     * @var string
     */
    public readonly string $signatureHash;

    /**
     * The expiration date and time of the verification code.
     *
     *
     * @var DateTimeImmutable
     */
    public readonly DateTimeImmutable $expiresAt;

    /**
     * @param string $digits
     * @param string $signatureHash
     * @param DateTimeImmutable $expiresAt
     * @throws InvalidArgumentException If any of the parameters are invalid.
     */
    public function __construct(string $digits, string $signatureHash, DateTimeImmutable $expiresAt)
    {
        if (strlen($digits) !== 6 || !ctype_digit($digits)) {
            throw new InvalidArgumentException('The digit code must be a 6-digit numeric string.');
        }
        if (empty($signatureHash)) {
            throw new InvalidArgumentException('The signature hash cannot be empty.');
        }

        $this->digits = $digits;
        $this->signatureHash = $signatureHash;
        $this->expiresAt = $expiresAt;
    }
}
