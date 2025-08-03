<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\Signature;

use DateTimeInterface;
use InvalidArgumentException;
use Override;
use Stringable;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\Security\Core\Signature\Exception\ExpiredSignatureException;
use Symfony\Component\Security\Core\Signature\Exception\InvalidSignatureException;
use Symfony\Component\Security\Core\User\UserInterface;

use function base64_encode;
use function hash_final;
use function hash_hmac;
use function hash_init;
use function hash_update;
use function is_scalar;
use function strtr;
use function substr;
use function time;
use function hash_equals;
use function get_debug_type;
use function sprintf;

/**
 * Creates and validates secure hashes
 * @psalm-api
 */
#[AsAlias(id: 'jazzfreunde.security.verification_code_signature_hasher')]
final class SignatureHasher implements SignatureHasherInterface
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
     * @inheritDoc
     */
    #[Override]
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
     * @inheritDoc
     */
    #[Override]
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
     * @inheritDoc
     */
    #[Override]
    public function computeSignatureHash(UserInterface $user, int $expires): string
    {
        $userIdentifier = $user->getUserIdentifier();
        $fieldsHash = hash_init('sha256');

        foreach ($this->signatureProperties as $property) {
            $value = $this->propertyAccessor->getValue($user, $property);
            if ($value instanceof DateTimeInterface) {
                $value = $value->format('c');
            }

            if (!is_scalar($value) && !$value instanceof Stringable) {
                throw new InvalidArgumentException(sprintf('The property path "%s" on the user object "%s" must return a value that can be cast to a string, but "%s" was returned.', $property, $user::class, get_debug_type($value)));
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
