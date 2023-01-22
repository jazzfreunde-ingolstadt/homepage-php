<?php

namespace Jazzfreunde\App\Entity\Security;

use Doctrine\ORM\Mapping as ORM;

/**
 * Benutzerrollen
 */
#[ORM\Entity]
#[ORM\Table(name: 'roles')]
class Role
{
    #[ORM\Column(name: "uuid", type: "uuid", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class:"doctrine.uuid_generator")]
    public ?string $uuid;
    #[ORM\Column(length: 255, unique: true)]
    public string $name;
}
