<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\Api\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\Api\Entity\Type\Enum\Email\KnownMailHandleType;
use Jazzfreunde\Api\Entity\Type\String\EmailType;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\Api\Type\Primitive\Email;

/**
 * Bekannte Emails werden vom System unter ihrem Handle referenziert und können so über die Datenbank konfiguriert werden.
 *
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'known_mails')]
#[ORM\Index(fields: ['handle', 'address'])]
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
