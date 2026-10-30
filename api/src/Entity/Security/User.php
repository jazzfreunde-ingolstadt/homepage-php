<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity\Security;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\Api\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\Api\Entity\Type\String\EmailType;
use Jazzfreunde\Api\Entity\Type\String\HexTokenType;
use Jazzfreunde\Api\Type\Primitive\Email;
use Jazzfreunde\Api\Type\Primitive\HexToken;
use Override;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;

/**
 * user account.
 *
 * ```sql
 *  # Befehl zum Anlegen eines neuen Nutzers
 *  INSERT INTO `users` (`uuid`, `email`, `token`)
 *      VALUES (UNHEX(REPLACE(UUID(), '-', '')), 'new.user@jazzfreunde-ingolstadt.localhost', SUBSTRING(MD5(CONCAT(uuid, NOW())), 1, 32))
 * ```
 *
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User implements UserInterface
{
    use PropertyInjectionTrait;

    /**
     * Unique identifier in the database.
     *
     * @var null|Uuid
     */
    #[ORM\Column(name: 'uuid', type: 'uuid', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    public ?Uuid $uuid;

    /**
     * User secret to seed generated hashes.
     *
     * @var HexToken
     */
    #[ORM\Column(type: HexTokenType::ENTITY_NAME, unique: true)]
    public HexToken $token;

    /**
     * Email address of the user.
     *
     * @var Email
     */
    #[ORM\Column(type: EmailType::ENTITY_NAME, unique: true)]
    public Email $email;

    /**
     * Assigned roles of the user.
     *
     * @var Collection<array-key, Role>
     */
    #[ORM\JoinTable(name: 'users_groups')]
    #[ORM\JoinColumn(referencedColumnName: 'uuid')]
    #[ORM\InverseJoinColumn(referencedColumnName: 'uuid')]
    #[ORM\ManyToMany(targetEntity: Role::class)]
    public Collection $roles;

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getRoles(): array
    {
        return $this->roles
            ->map(static fn (Role $role): string => $role->name)
            ->toArray();
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
