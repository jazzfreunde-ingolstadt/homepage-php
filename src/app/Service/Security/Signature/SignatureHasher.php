<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\Signature;

use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\Security\Core\Exception\InvalidArgumentException;
use Symfony\Component\Security\Core\Signature\Exception\ExpiredSignatureException;
use Symfony\Component\Security\Core\Signature\Exception\InvalidSignatureException;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Creates and validates secure hashes
 */
#[AsAlias(id: 'jazzfreunde.security.verification_code_signature_hasher')]
final class SignatureHasher
{
    /**
     * @param PropertyAccessorInterface $propertyAccessor
     * @param string[] $signatureProperties Properties of the User; the hash is invalidated if these properties change
     * @param string $secret
     * @psalm-api
     * @throws InvalidArgumentException if the secret is empty
     */
    public function __construct(
        private PropertyAccessorInterface $propertyAccessor,
        #[Autowire('%jazzfreunde.security.verification_code.signature_properties%')]
        private array $signatureProperties,
        #[Autowire('%kernel.secret%')]
        #[\SensitiveParameter] private string $secret,
    ) {
        if (!$secret) {
            throw new InvalidArgumentException('A non-empty secret is required.');
        }
    }

    /**
     * Verifies the hash using the provided user identifier and expire time.
     *
     * This method must be called before the user object is loaded from a provider.
     *
     * @param int    $expires The expiry time as a unix timestamp
     * @param string $hash    The plaintext hash provided by the request
     *
     * @throws InvalidSignatureException If the signature does not match the provided parameters
     * @throws ExpiredSignatureException If the signature is no longer valid
     */
    public function acceptSignatureHash(string $userIdentifier, int $expires, string $hash): void
    {
        if ($expires < time()) {
            throw new ExpiredSignatureException('Signature has expired.');
        }
        $hmac = substr($hash, 0, 44);
        $payload = substr($hash, 44).':'.$expires.':'.$userIdentifier;

        if (!hash_equals($hmac, $this->generateHash($payload))) {
            throw new InvalidSignatureException('Invalid or expired signature.');
        }
    }

    /**
     * Verifies the hash using the provided user and expire time.
     *
     * @param int    $expires The expiry time as a unix timestamp
     * @param string $hash    The plaintext hash provided by the request
     *
     * @throws InvalidSignatureException If the signature does not match the provided parameters
     * @throws ExpiredSignatureException If the signature is no longer valid
     */
    public function verifySignatureHash(UserInterface $user, int $expires, string $hash): void
    {
        if ($expires < time()) {
            throw new ExpiredSignatureException('Signature has expired.');
        }

        $computedHash = $this->computeSignatureHash($user, $expires);
        if (!hash_equals($hash, $computedHash)) {
            throw new InvalidSignatureException('Invalid or expired signature.');
        }
    }

    /**
     * Computes the secure hash for the provided user and expire time.
     *
     * @param UserInterface $user
     * @param int $expires The expiry time as a unix timestamp
     * @return string Computed hash
     */
    public function computeSignatureHash(UserInterface $user, int $expires): string
    {
        $userIdentifier = $user->getUserIdentifier();
        $fieldsHash = hash_init('sha256');

        foreach ($this->signatureProperties as $property) {
            $value = $this->propertyAccessor->getValue($user, $property) ?? '';
            if ($value instanceof \DateTimeInterface) {
                $value = $value->format('c');
            }

            if (!\is_scalar($value) && !$value instanceof \Stringable) {
                throw new \InvalidArgumentException(\sprintf('The property path "%s" on the user object "%s" must return a value that can be cast to a string, but "%s" was returned.', $property, $user::class, get_debug_type($value)));
            }
            hash_update($fieldsHash, ':'.base64_encode((string) $value));
        }

        $fieldsHash = strtr(base64_encode(hash_final($fieldsHash, true)), '+/=', '-_~');

        return $this->generateHash($fieldsHash.':'.$expires.':'.$userIdentifier).$fieldsHash;
    }

    /**
     * Generate a hash from token value
     *
     * @param string $tokenValue
     * @return string
     */
    private function generateHash(string $tokenValue): string
    {
        return strtr(base64_encode(hash_hmac('sha256', $tokenValue, $this->secret, true)), '+/=', '-_~');
    }
}
