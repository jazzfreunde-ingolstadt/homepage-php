<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Abonement des Jazzfreunde Newsletters
 */
#[ORM\Entity]
#[ORM\Table(name: 'email_confirmations')]
class EmailConfirmation
{
    use PropertyInjectionTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'ulid')]
    public ?string $id = null;
    #[Assert\NotBlank(message: 'Token is required.')]
    #[ORM\Column(type: 'string')]
    public string $token;
    #[ORM\Column(type: 'datetime')]
    public DateTime $expiresAt;

    /**
     * Ist die Bestätigung abgelaufen?
     *
     * @return boolean
     */
    public function IsExpired(): bool
    {
        return $this->expiresAt < new DateTime();
    }
}
