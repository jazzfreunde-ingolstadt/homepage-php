<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Service\Security\VerificationCode;

use InvalidArgumentException;
use Jazzfreunde\App\Service\Security\Exception\InvalidVerificationCodeException;
use Jazzfreunde\App\Service\Security\Signature\SignatureHasherInterface;
use Jazzfreunde\App\Service\Security\VerificationCode\Model\VerificationCodeDetails;
use Override;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\Signature\Exception\ExpiredSignatureException;
use Symfony\Component\Security\Core\Signature\Exception\InvalidSignatureException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

use function is_int;
use function is_null;
use function random_int;
use function str_pad;

/**
 * Service to handle verification codes for user authentication
 * and other security-related tasks.
 *
 * @psalm-api
 */
#[AsAlias(id: 'jazzfreunde.security.verification_code_handler')]
final class VerificationCodeHandler implements VerificationCodeHandlerInterface
{
    /**
     * @var array<array-key, string|int> Options for generating verification codes.
     */
    private array $options;

    /**
     * @param SignatureHasherInterface $signatureHasher
     * @param UserProviderInterface $userProvider
     * @param VerificationCodeStorageInterface $verificationCodeStorage
     * @param array<array-key, string|int> $options
     * @psalm-api
     */
    public function __construct(
        private readonly SignatureHasherInterface $signatureHasher,
        #[Autowire('@security.user.provider.concrete.all_users')]
        private UserProviderInterface $userProvider,
        private VerificationCodeStorageInterface $verificationCodeStorage,
        array $options = [],
    ) {
        $this->options = array_merge([
            'lifetime' => 300, // Default lifetime of 5 minutes
        ], $options);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function createVerificationCode(
        string $userIdentifier
    ): VerificationCodeDetails {
        $expires = time() + $this->getTokenLifetime();
        $expiresAt = new \DateTimeImmutable('@'.$expires);

        $user = $this->userProvider->loadUserByIdentifier($userIdentifier);
        $hash = $this->signatureHasher->computeSignatureHash($user, $expires);
        $code = $this->getVerificationCode();

        $this->verificationCodeStorage->store($hash, $code);

        return new VerificationCodeDetails($code, $hash, $expiresAt);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function consumeVerificationCode(
        string $userIdentifier,
        string $hash,
        int $expires,
        string $code
    ): UserInterface {
        try {
            $this->signatureHasher->acceptSignatureHash($userIdentifier, $expires, $hash);
            
            $storedCode = $this->verificationCodeStorage->retrieve($hash);
            $user = $this->userProvider->loadUserByIdentifier($userIdentifier);
            
            $this->signatureHasher->verifySignatureHash($user, $expires, $hash);

            if (is_null($storedCode) || $storedCode !== $code) {
                throw new InvalidVerificationCodeException('Invalid verification code.');
            }
            
            return $user;
        } catch (UserNotFoundException $e) {
            throw new InvalidVerificationCodeException('User not found.', 0, $e);
        } catch (ExpiredSignatureException $e) {
            throw new InvalidVerificationCodeException(ucfirst(str_ireplace('signature', 'verification code', $e->getMessage())), 0, $e);
        } catch (InvalidSignatureException $e) {
            throw new InvalidVerificationCodeException(ucfirst(str_ireplace('signature', 'verification code', $e->getMessage())), 0, $e);
        }
    }

    /**
     * Generates a 6-digit verification code from the signature hash.
     *
     * @return string
     */
    private function getVerificationCode(): string
    {
        return str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }
    
    /**
     * Validates the token lifetime option.
     *
     * @return int
     * @throws InvalidArgumentException If the lifetime is not a positive integer.
     */
    private function getTokenLifetime(): int
    {
        $value = $this->options['lifetime'];

        if (!is_int($value) || $value <= 0) {
            throw new InvalidArgumentException('Token lifetime must be a positive integer.');
        }

        return $value;
    }
}
