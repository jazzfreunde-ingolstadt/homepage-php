<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\VerificationCode;

/**
 * Storage for tracking pending verification codes.
 * A verification code is a one-time code that is used to verify a user's identity.
 */
interface VerificationCodeStorageInterface
{
    /**
     * Stores a verification code for a given hash.
     *
     * @param string $hash The hash to associate with the verification code.
     * @param string $code The verification code to store.
     */
    public function store(string $hash, string $code): void;

    /**
     * Retrieves and deletes a verification code for a given hash.
     *
     * @param string $hash The hash associated with the verification code.
     * @return string|null The verification code if found, null otherwise.
     */
    public function retrieve(string $hash): ?string;
}
