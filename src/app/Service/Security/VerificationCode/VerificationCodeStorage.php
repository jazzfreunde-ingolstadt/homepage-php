<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Service\Security\VerificationCode;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Storage for tracking pending verification codes.
 * A verification code is a one-time code that is used to verify a user's identity.
 * @psalm-api
 */
#[AsAlias(id: 'jazzfreunde.security.verification_code_storage')]
final class VerificationCodeStorage
{
    /**
     * @param CacheItemPoolInterface $cache Cache pool for storing verification code usage counts.
     * @param int $lifetime Lifetime of the cache items in seconds.
     */
    public function __construct(
        private CacheItemPoolInterface $cache,
        #[Autowire('%jazzfreunde.security.verification_code.token_lifetime%')]
        private int $lifetime,
    ) {
    }

    /**
     * Stores a verification code for a given hash.
     *
     * @param string $hash The hash to associate with the verification code.
     * @param string $code The verification code to store.
     */
    public function store(string $hash, string $code): void
    {
        $item = $this->cache->getItem($this->getKey($hash));

        if (!$item->isHit()) {
            $item->expiresAfter($this->lifetime);
        }

        $item->set($code);
        $this->cache->save($item);
    }

    /**
     * Retrieves and deletes a verification code for a given hash.
     *
     * @param string $hash The hash associated with the verification code.
     * @return string|null The verification code if found, null otherwise.
     */
    public function retrieve(string $hash): ?string
    {
        $key = $this->getKey($hash);
        $item = $this->cache->getItem($key);

        if (!$item->isHit()) {
            return null;
        }

        $this->cache->deleteItem($key);

        $value = $item->get();
        if (!is_string($value)) {
            return null;
        }

        return $value;
    }

    /**
     * Transforms the hash into a URL-encoded key for storage.
     *
     * @param string $hash
     * @return string
     */
    private function getKey(string $hash): string
    {
        return rawurlencode($hash);
    }
}
