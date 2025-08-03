<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Service\Security\VerificationCode;

use Jazzfreunde\App\Service\Security\VerificationCode\Model\VerificationCodeDetails;
use Symfony\Component\Security\Core\User\UserInterface;
use Jazzfreunde\App\Service\Security\Exception\InvalidVerificationCodeException;

/**
 * Service to handle verification codes for user authentication
 * and other security-related tasks.
 */
interface VerificationCodeHandlerInterface
{
    /**
     * Creates a verification code for the given user.
     *
     * @param string $userIdentifier The user for whom the verification code is created.
     * @return VerificationCodeDetails
     */
    public function createVerificationCode(string $userIdentifier): VerificationCodeDetails;

    /**
     * Consumes a verification code and returns the user if valid.
     *
     * @param string $userIdentifier The identifier of the user.
     * @param string $hash The hash associated with the verification code.
     * @param int $expires The expiration time of the verification code.
     * @param string $code The verification code to validate.
     * @return UserInterface
     * @throws InvalidVerificationCodeException If the verification code is invalid or expired.
     */
    public function consumeVerificationCode(
        string $userIdentifier,
        string $hash,
        int $expires,
        string $code
    ): UserInterface;
}
