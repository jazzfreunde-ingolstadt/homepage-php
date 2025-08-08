<?php

namespace Jazzfreunde\App\Entity\Security;

use Doctrine\ORM\Mapping as ORM;

/**
 * User roles
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'roles')]
class Role
{
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
     * Name of the role
     *
     * @var string
     */
    #[ORM\Column(length: 255, unique: true)]
    public string $name;
}
