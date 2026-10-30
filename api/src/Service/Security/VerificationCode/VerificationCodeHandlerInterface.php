<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Security\VerificationCode;

use Jazzfreunde\Api\Service\Security\Exception\InvalidVerificationCodeException;
use Jazzfreunde\Api\Service\Security\VerificationCode\Model\VerificationCodeDetails;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Service to handle verification codes for user authentication
 * and other security-related tasks.
 */
interface VerificationCodeHandlerInterface
{
    /**
     * Creates a verification code for the given user.
     *
     * @param string $userIdentifier the user for whom the verification code is created
     *
     * @return VerificationCodeDetails
     */
    public function createVerificationCode(string $userIdentifier): VerificationCodeDetails;

    /**
     * Consumes a verification code and returns the user if valid.
     *
     * @param string $userIdentifier the identifier of the user
     * @param string $hash           the hash associated with the verification code
     * @param int    $expires        the expiration time of the verification code
     * @param string $code           the verification code to validate
     *
     * @return UserInterface
     *
     * @throws InvalidVerificationCodeException if the verification code is invalid or expired
     */
    public function consumeVerificationCode(
        string $userIdentifier,
        string $hash,
        int $expires,
        string $code
    ): UserInterface;
}
