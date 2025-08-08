<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Service\Security\UserProvider;

use InvalidArgumentException;
use Jazzfreunde\App\Entity\Security\TemporaryUser;
use Jazzfreunde\App\Type\Primitive\Email;
use Override;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

use function is_subclass_of;
use function sprintf;

/**
 * Provider for temporary users.
 *
 * @template-implements UserProviderInterface<TemporaryUser>
 * @psalm-api
 */
#[AsAlias(id: 'jazzfreunde.security.temporary_user_provider')]
final class TemporaryUserProvider implements UserProviderInterface
{
    /**
     * @inheritDoc
     */
    #[Override]
    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof TemporaryUser) {
            throw new InvalidArgumentException(sprintf("User must be an instance of %s.", TemporaryUser::class));
        }
        return $user;
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function supportsClass(string $class): bool
    {
        return TemporaryUser::class === $class || is_subclass_of($class, TemporaryUser::class);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $user = new TemporaryUser();
        $user->email = new Email($identifier);
        $user->roles = [];

        return $user;
    }
}
