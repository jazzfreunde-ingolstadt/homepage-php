<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Security;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Benutzer-Account
 *
 * ```sql
 *  # Befehl zum Anlegen eines neuen Nutzers
 *  INSERT INTO `users` (`uuid`, `email`) VALUES (UNHEX(REPLACE(UUID(), '-', '')), 'new.user@jazzfreunde-ingolstadt.localhost')
 * ```
 */
#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User implements UserInterface
{
    use PropertyInjectionTrait;

    #[ORM\Column(name: "uuid", type: "uuid", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class:"doctrine.uuid_generator")]
    public ?string $uuid;
    #[ORM\Column(type: 'string', unique: true)]
    public string $email;
    #[ORM\JoinTable(name: 'users_groups')]
    #[ORM\JoinColumn(referencedColumnName: 'uuid')]
    #[ORM\InverseJoinColumn(referencedColumnName: 'uuid')]
    #[ORM\ManyToMany(targetEntity: Role::class)]
    public Collection $roles;

    /**
     * @inheritDoc
     */
    public function getRoles(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials(): void
    {
    }

    /**
     * @inheritDoc
     */
    public function getUserIdentifier(): string
    {
        $uuid = $this->uuid;
        if (!is_string($uuid) || '' === $uuid) {
            throw new \LogicException('User identifier is empty');
        }

        return $uuid;
    }
}
