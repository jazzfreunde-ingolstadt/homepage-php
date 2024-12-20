<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Type\KnownMailHandleEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bekannte Emails werden vom System unter ihrem Handle referenziert und können so über die Datenbank konfiguriert werden.
 */
#[ORM\Entity]
#[ORM\Table(name: 'known_mails')]
#[ORM\Index(fields: [ 'handle', 'address' ])]
class KnownMail
{
    use PropertyInjectionTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    public ?int $id = null;
    #[ORM\Column(type: 'string', unique: true)]
    public KnownMailHandleEnum $handle;
    #[Assert\Email(message: 'The email {{ value }} is not a valid email.')]
    #[Assert\NotBlank(message: 'Email is required.')]
    #[ORM\Column(type: 'string')]
    public string $address;
}
