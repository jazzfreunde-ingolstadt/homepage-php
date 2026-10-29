<?php

namespace Jazzfreunde\App\Entity\Security;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * User roles.
 *
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'roles')]
class Role
{
    /**
     * Unique identifier in the database.
     *
     * @var null|Uuid
     */
    #[ORM\Column(name: 'uuid', type: 'uuid', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    public ?Uuid $uuid;

    /**
     * Name of the role.
     *
     * @var string
     */
    #[ORM\Column(length: 255, unique: true)]
    public string $name;
}
