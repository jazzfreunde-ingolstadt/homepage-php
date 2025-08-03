<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Security\Signature;

use InvalidArgumentException;
use Jazzfreunde\App\Entity\Security\TemporaryUser;
use Jazzfreunde\App\Service\Security\UserProvider\TemporaryUserProvider;
use PHPUnit\Framework\TestCase;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Tests for the temprorary user provider.
 */
final class TemporaryUserProviderTest extends TestCase
{
    use MockingTrait;

    private const SIGNATURE_PROPERTIES = ['email'];
    private const SECRET = 'test';

    /**
     * Tests that the signature hasher computes and verifies a valid signature.
     */
    #[Test]
    public function refreshTemporaryUser(): void
    {
        $provider = new UnitUnderTest(TemporaryUserProvider::class);
        $user = new TemporaryUser(email: 'user123@example.com');

        $refreshedUser = $provider->target()->refreshUser($user);

        $this->assertInstanceOf(TemporaryUser::class, $refreshedUser);
        $this->assertSame($user->email->value(), $refreshedUser->email->value());
    }

    /**
     * Tests that the provider throws an exception for unsupported user types.
     */
    #[Test]
    public function refreshUserThrowsOnInvalidUserType(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $provider = new UnitUnderTest(TemporaryUserProvider::class);
        $user = $this->mock(UserInterface::class);

        $provider->target()->refreshUser($user);
    }

    /**
     * Tests that the provider supports the TemporaryUser class.
     */
    #[Test]
    #[TestWith([TemporaryUser::class, true])]
    #[TestWith([UserInterface::class, false])]
    public function supportsTemporaryUserClass(string $class, bool $expected): void
    {
        $provider = new UnitUnderTest(TemporaryUserProvider::class);

        $this->assertEquals($expected, $provider->target()->supportsClass($class));
    }

    /**
     * Tests loading a user by identifier.
     */
    #[Test]
    public function loadUserByIdentifier(): void
    {
        $provider = new UnitUnderTest(TemporaryUserProvider::class);
        $identifier = 'user123@example.com';

        $user = $provider->target()->loadUserByIdentifier($identifier);
        $this->assertInstanceOf(TemporaryUser::class, $user);
        $this->assertSame($identifier, $user->email->value());
        $this->assertEmpty($user->roles, 'Temporary users should have no roles');
    }
}
