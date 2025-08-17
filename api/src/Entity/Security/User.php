<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Security;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Symfony\Component\Security\Core\User\UserInterface;
use Jazzfreunde\App\Entity\Type\String\EmailType;
use Jazzfreunde\App\Entity\Type\String\HexTokenType;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\App\Type\Primitive\HexToken;
use Override;

/**
 * user account
 *
 * ```sql
 *  # Befehl zum Anlegen eines neuen Nutzers
 *  INSERT INTO `users` (`uuid`, `email`, `token`)
 *      VALUES (UNHEX(REPLACE(UUID(), '-', '')), 'new.user@jazzfreunde-ingolstadt.localhost', SUBSTRING(MD5(CONCAT(uuid, request_time)), 1, 32))
 * ```
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User implements UserInterface
{
    use PropertyInjectionTrait;

    /**
     * Unique identifier in the database
     *
     * @var string|null
     */
    #[ORM\Column(name: "uuid", type: "uuid", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class:"doctrine.uuid_generator")]
    public ?string $uuid;

    /**
     * User secret to seed generated hashes
     *
     * @var HexToken
     */
    #[ORM\Column(type: HexTokenType::ENTITY_NAME, unique: true)]
    public HexToken $token;

    /**
     * Email address of the user
     *
     * @var Email
     */
    #[ORM\Column(type: EmailType::ENTITY_NAME, unique: true)]
    public Email $email;

    /**
     * Assigned roles of the user
     *
     * @var Collection<array-key, Role>
     */
    #[ORM\JoinTable(name: 'users_groups')]
    #[ORM\JoinColumn(referencedColumnName: 'uuid')]
    #[ORM\InverseJoinColumn(referencedColumnName: 'uuid')]
    #[ORM\ManyToMany(targetEntity: Role::class)]
    public Collection $roles;

    /**
     * @inheritDoc
     */
    #[Override]
    public function getRoles(): array
    {
        return $this->roles
                    ->map(static fn(Role $role): string
                    => $role->name)
                    ->toArray();
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function eraseCredentials(): void
    {
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function getUserIdentifier(): string
    {
        return $this->email->value();
    }
}
