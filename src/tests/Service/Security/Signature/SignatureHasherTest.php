<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Security\Signature;

use InvalidArgumentException;
use Jazzfreunde\App\Entity\Security\TemporaryUser;
use Jazzfreunde\App\Service\Security\Signature\SignatureHasher;
use PHPUnit\Framework\TestCase;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\Security\Core\Signature\Exception\ExpiredSignatureException;
use Symfony\Component\Security\Core\Signature\Exception\InvalidSignatureException;

/**
 * Tests for the signature hasher.
 */
final class SignatureHasherTest extends TestCase
{
    use MockingTrait;

    private const SIGNATURE_PROPERTIES = ['email'];
    private const SECRET = 'test';

    /**
     * Tests that the signature hasher computes and verifies a valid signature.
     */
    #[Test]
    public function verifyValidSignatureHash(): void
    {
        $user = new TemporaryUser(email: 'user123@example.com');
        $expires = time() + 3600;

        $uut = new UnitUnderTest(SignatureHasher::class);
        $uut->configure('signatureProperties', self::SIGNATURE_PROPERTIES);
        $uut->configure('secret', self::SECRET);
        $uut->mock(PropertyAccessorInterface::class)
            ->method('getValue')
            ->willReturn($user->email->value());

        $hash = $uut->target()->computeSignatureHash(
            $user,
            $expires
        );

        $this->assertNotEmpty($hash, 'Hash should not be empty');

        $uut->target()->acceptSignatureHash(
            $user->getUserIdentifier(),
            $expires,
            $hash
        );

        $uut->target()->verifySignatureHash(
            $user,
            $expires,
            $hash
        );
    }

    /**
     * Tests that an expired signature throws an exception on accepts.
     */
    #[Test]
    public function acceptSignatureHashOnExpired(): void
    {
        $user = new TemporaryUser(email: 'user123@example.com');
        $expires = time() - 3600;

        $uut = new UnitUnderTest(SignatureHasher::class);
        $uut->configure('signatureProperties', self::SIGNATURE_PROPERTIES);
        $uut->configure('secret', self::SECRET);
        $uut->mock(PropertyAccessorInterface::class)
            ->method('getValue')
            ->willReturn($user->email->value());

        $hash = $uut->target()->computeSignatureHash(
            $user,
            $expires
        );

        $this->expectException(ExpiredSignatureException::class);
        $uut->target()->acceptSignatureHash(
            $user->getUserIdentifier(),
            $expires,
            $hash
        );
    }

    /**
     * Tests that an expired signature throws an exception on verify.
     */
    #[Test]
    public function verifySignatureHashOnExpired(): void
    {
        $user = new TemporaryUser(email: 'user123@example.com');
        $expires = time() - 3600;

        $uut = new UnitUnderTest(SignatureHasher::class);
        $uut->configure('signatureProperties', self::SIGNATURE_PROPERTIES);
        $uut->configure('secret', self::SECRET);
        $uut->mock(PropertyAccessorInterface::class)
            ->method('getValue')
            ->willReturn($user->email->value());

        $hash = $uut->target()->computeSignatureHash(
            $user,
            $expires
        );

        $this->expectException(ExpiredSignatureException::class);
        $uut->target()->verifySignatureHash(
            $user,
            $expires,
            $hash
        );
    }

    /**
     * Tests that an invalid signature throws an exception on accept.
     */
    #[Test]
    public function acceptSignatureHashOnInvalid(): void
    {
        $user = new TemporaryUser(email: 'user123@example.com');
        $expires = time() + 3600;

        $uut = new UnitUnderTest(SignatureHasher::class);
        $uut->configure('signatureProperties', self::SIGNATURE_PROPERTIES);
        $uut->configure('secret', self::SECRET);
        $uut->mock(PropertyAccessorInterface::class)
            ->method('getValue')
            ->willReturn($user->email->value());

        $this->expectException(InvalidSignatureException::class);
        $uut->target()->acceptSignatureHash(
            $user->getUserIdentifier(),
            $expires,
            'invalid_hash'
        );
    }

    /**
     * Tests that an invalid signature throws an exception on verify.
     */
    #[Test]
    public function verifySignatureHashOnInvalid(): void
    {
        $user = new TemporaryUser(email: 'user123@example.com');
        $expires = time() + 3600;
        $uut = new UnitUnderTest(SignatureHasher::class);
        $uut->configure('signatureProperties', self::SIGNATURE_PROPERTIES);
        $uut->configure('secret', self::SECRET);
        $uut->mock(PropertyAccessorInterface::class)
            ->method('getValue')
            ->willReturn($user->email->value());

        $this->expectException(InvalidSignatureException::class);
        $uut->target()->verifySignatureHash(
            $user,
            $expires,
            'invalid_hash'
        );
    }

    /**
     * Tests that an empty secret throws an exception on construction.
     */
    #[Test]
    public function constructWithEmptySecret(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $uut = new UnitUnderTest(SignatureHasher::class);
        $uut->configure('signatureProperties', self::SIGNATURE_PROPERTIES);
        $uut->configure('secret', '');
        $uut->target();
    }

    /**
     * Tests that a non-stringably property throws an exception during hashing.
     */
    #[Test]
    public function computeSignatureHashWithNonStringableProperty(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $user = new TemporaryUser(email: 'user123@example.com');
        $expires = time() + 3600;

        $uut = new UnitUnderTest(SignatureHasher::class);
        $uut->configure('signatureProperties', self::SIGNATURE_PROPERTIES);
        $uut->configure('secret', self::SECRET);
        $uut->mock(PropertyAccessorInterface::class)
            ->method('getValue')
            ->willReturn(new class() {
                public const EMAIL = 'user123@example.com';
            }); // Non-stringable property

        $uut->target()->computeSignatureHash(
            $user,
            $expires
        );
    }
}
