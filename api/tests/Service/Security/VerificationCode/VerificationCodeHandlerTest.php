<?php declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Service\Security\VerificationCode;

use Jazzfreunde\App\Entity\Security\TemporaryUser;
use Jazzfreunde\App\Service\Security\Exception\InvalidVerificationCodeException;
use Jazzfreunde\App\Service\Security\Signature\SignatureHasherInterface;
use Jazzfreunde\App\Service\Security\VerificationCode\VerificationCodeHandler;
use Jazzfreunde\App\Service\Security\VerificationCode\VerificationCodeStorageInterface;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\Signature\Exception\ExpiredSignatureException;
use Symfony\Component\Security\Core\Signature\Exception\InvalidSignatureException;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Tests for the VerificationCodeHandler.
 */
final class VerificationCodeHandlerTest extends TestCase
{
    /**
     * Tests that the createVerificationCode method returns a VerificationCodeDetails object.
     */
    #[Test]
    public function createVerificationCode(): void
    {
        $user = new TemporaryUser(email: 'user@example.com');

        $uut = new UnitUnderTest(VerificationCodeHandler::class);
        $uut->configure('options', ['lifetime' => 3600]);
        $uut->mock(SignatureHasherInterface::class)
            ->method('computeSignatureHash')
            ->willReturn('test_hash');
        $uut->mock(UserProviderInterface::class)
            ->method('loadUserByIdentifier')
            ->willReturn($user);

        $details = $uut->target()->createVerificationCode('user@example.com');
        $this->assertIsNumeric($details->digits, 'Digits should be numeric');
        $this->assertEquals('test_hash', $details->signatureHash);

        $diff = $details->expiresAt->getTimestamp() - time();
        $this->assertGreaterThanOrEqual(3590, $diff, 'Expiration time should be at least 3600 seconds');
        $this->assertLessThanOrEqual(3610, $diff, 'Expiration time should not exceed 3660 seconds');
    }

    
    /**
     * Tests that consumeVerificationCode throws an exception on invalid code.
     */
    #[Test]
    public function consumeVerificationCodeThrowsExceptionOnInvalidCode(): void
    {
        $uut = new UnitUnderTest(VerificationCodeHandler::class);
        $uut->mock(SignatureHasherInterface::class)
            ->method('acceptSignatureHash')
            ->willThrowException(new InvalidSignatureException('Invalid verification code.'));

        $this->expectException(InvalidVerificationCodeException::class);
        $this->expectExceptionMessage('Invalid verification code.');

        $uut->target()->consumeVerificationCode(
            'user@example.com',
            'test_hash',
            3600,
            '123456'
        );
    }

    /**
     * Tests that consumeVerificationCode throws an exception on expired code.
     */
    #[Test]
    public function consumeVerificationCodeThrowsExceptionOnExpiredCode(): void
    {
        $uut = new UnitUnderTest(VerificationCodeHandler::class);
        $uut->mock(SignatureHasherInterface::class)
            ->method('acceptSignatureHash')
            ->willThrowException(new ExpiredSignatureException('Verification code has expired.'));

        $this->expectException(InvalidVerificationCodeException::class);
        $this->expectExceptionMessage('Verification code has expired.');

        $uut->target()->consumeVerificationCode(
            'user@example.com',
            'test_hash',
            3600,
            '123456'
        );
    }

    /**
     * Tests that consumeVerificationCode throws an exception on user not found.
     */
    #[Test]
    public function consumeVerificationCodeThrowsExceptionOnUserNotFound(): void
    {
        $uut = new UnitUnderTest(VerificationCodeHandler::class);
        $uut->mock(UserProviderInterface::class)
            ->method('loadUserByIdentifier')
            ->willThrowException(new UserNotFoundException('User not found.'));

        $this->expectException(InvalidVerificationCodeException::class);
        $this->expectExceptionMessage('User not found.');

        $uut->target()->consumeVerificationCode(
            'user@example.com',
            'test_hash',
            3600,
            '123456'
        );
    }

    /**
     * Tests that consumeVerificationCode throws an exception if no code is stored in cache code storage.
     */
    #[Test]
    public function consumeVerificationCodeThrowsExceptionOnNoCodeStored(): void
    {
        $uut = new UnitUnderTest(VerificationCodeHandler::class);
        $uut->mock(VerificationCodeStorageInterface::class)
            ->method('retrieve')
            ->willReturn(null);

        $this->expectException(InvalidVerificationCodeException::class);
        $this->expectExceptionMessage('Invalid verification code.');

        $uut->target()->consumeVerificationCode(
            'user@example.com',
            'test_hash',
            3600,
            '123456'
        );
    }

    /**
     * Tests that consumeVerificationCode returns the user if everything is valid.
     */
    #[Test]
    public function consumeVerificationCodeReturnsUser(): void
    {
        $user = new TemporaryUser(email: 'user@example.com');

        $uut = new UnitUnderTest(VerificationCodeHandler::class);
        $uut->mock(VerificationCodeStorageInterface::class)
            ->method('retrieve')
            ->willReturn('123456');
        $uut->mock(UserProviderInterface::class)
            ->method('loadUserByIdentifier')
            ->willReturn($user);

        $retrievedUser = $uut->target()->consumeVerificationCode(
            'user@example.com',
            'test_hash',
            3600,
            '123456'
        );

        $this->assertSame($user, $retrievedUser, 'Returned user should match the expected user');
    }
}
