<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Service\Security\VerificationCode;

use InvalidArgumentException;
use Jazzfreunde\App\Service\Security\Exception\InvalidVerificationCodeException;
use Jazzfreunde\App\Service\Security\Signature\SignatureHasher;
use Jazzfreunde\App\Service\Security\VerificationCode\Model\VerificationCodeDetails;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
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
final class VerificationCodeHandler
{
    /**
     * @var array<array-key, string|int> Options for generating verification codes.
     */
    private array $options;

    /**
     * @param SignatureHasher $signatureHasher
     * @param UserProviderInterface $userProvider
     * @param VerificationCodeStorage $verificationCodeStorage
     * @param array<array-key, string|int> $options
     * @psalm-api
     */
    public function __construct(
        private readonly SignatureHasher $signatureHasher,
        private UserProviderInterface $userProvider,
        private VerificationCodeStorage $verificationCodeStorage,
        array $options = [],
    ) {
        $this->options = array_merge([
            'lifetime' => 300, // Default lifetime of 5 minutes
        ], $options);
    }

    /**
     * Creates a verification code for the given user.
     *
     * @param string $userIdentifier The user for whom the verification code is created.
     * @return VerificationCodeDetails
     */
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
