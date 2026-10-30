<?php

declare(strict_types=1);

namespace JazzfreundeTests\Api\Tests\Service\Security\Signature;

use InvalidArgumentException;
use Jazzfreunde\Api\Entity\Security\TemporaryUser;
use Jazzfreunde\Api\Service\Security\UserProvider\TemporaryUserProvider;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Tests for the temporary user provider.
 *
 * @internal
 *
 * @coversNothing
 */
final class TemporaryUserProviderTest extends TestCase
{
    /**
     * Tests that the signature hasher computes and verifies a valid signature.
     */
    #[Test]
    public function refreshTemporaryUser(): void
    {
        $provider = new UnitUnderTest(TemporaryUserProvider::class);
        $user = new TemporaryUser(email: 'user123@example.com');

        $refreshedUser = $provider->target()->refreshUser($user);

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
        $user = $this->createMock(UserInterface::class);
        $user
            ->expects($this->never())
            ->method($this->anything());

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
        $this->assertSame($identifier, $user->email->value());
        $this->assertEmpty($user->roles, 'Temporary users should have no roles');
    }
}
