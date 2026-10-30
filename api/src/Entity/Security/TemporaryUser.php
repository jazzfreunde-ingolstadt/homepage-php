<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity\Security;

use Jazzfreunde\Api\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\Api\Type\Primitive\Email;
use Override;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Temporary user account for one-time use
 * This user is not stored in the database and only exists in memory.
 * It should be used where a user needs to be authenticated without a persistent record.
 *
 * @psalm-api
 */
class TemporaryUser implements UserInterface
{
    use PropertyInjectionTrait;

    /**
     * Email address of the user.
     *
     * @var Email
     */
    public Email $email;

    /**
     * Assigned roles of the user.
     *
     * @var Role[]
     */
    public array $roles;

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getRoles(): array
    {
        return array_map(static fn (Role $role): string => $role->name, $this->roles);
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getUserIdentifier(): string
    {
        return $this->email->value();
    }
}
