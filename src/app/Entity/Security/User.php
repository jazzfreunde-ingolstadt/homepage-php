<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Security;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Symfony\Component\Security\Core\User\UserInterface;
use Jazzfreunde\App\Entity\Type\String\EmailType;
use Jazzfreunde\App\Type\Primitive\Email;
use Override;

/**
 * Benutzer-Account
 *
 * ```sql
 *  # Befehl zum Anlegen eines neuen Nutzers
 *  INSERT INTO `users` (`uuid`, `email`) VALUES (UNHEX(REPLACE(UUID(), '-', '')), 'new.user@jazzfreunde-ingolstadt.localhost')
 * ```
 * @psalm-api
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
    #[ORM\Column(type: EmailType::ENTITY_NAME, unique: true)]
    public Email $email;
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
        return [];
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
        $uuid = $this->uuid;
        if (!is_string($uuid) || '' === $uuid) {
            throw new \LogicException('User identifier is empty');
        }

        return $uuid;
    }
}
