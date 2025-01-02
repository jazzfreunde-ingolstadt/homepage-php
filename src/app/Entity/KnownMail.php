<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\Type\Enum\Email\KnownMailHandleType;
use Jazzfreunde\App\Entity\Type\String\EmailType;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\App\Type\Primitive\Email;

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
    #[ORM\Column(type: KnownMailHandleType::ENTITY_NAME, unique: true)]
    public KnownMailHandleEnum $handle;
    #[ORM\Column(type: EmailType::ENTITY_NAME)]
    public Email $address;
}
