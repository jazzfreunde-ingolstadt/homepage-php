<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;

/**
 * Bekannte Emails
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
    public string $handle;
    #[ORM\Column(type: 'string')]
    public string $address;
}
