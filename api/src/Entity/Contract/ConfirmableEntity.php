<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Contract;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Entity\Notification\NotificationSubscription;
use Jazzfreunde\App\Entity\Type\String\EmailType;
use Jazzfreunde\App\Type\Primitive\Email;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Base class for entities that require confirmation (e.g., subscriptions).
 *
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'confirmable_entities')]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'discriminator', type: 'string')]
#[ORM\DiscriminatorMap([
    'confirmable' => ConfirmableEntity::class,
    'newsletter_subscription' => NewsletterSubscription::class,
    'notification_subscription' => NotificationSubscription::class,
])]
abstract class ConfirmableEntity
{
    use PropertyInjectionTrait;

    /**
     * Unique identifier in the database.
     *
     * @var null|string
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid')]
    public ?string $uuid = null;

    /**
     * Email address associated with the subscription.
     *
     * @var Email
     */
    #[ORM\Column(type: EmailType::ENTITY_NAME)]
    public Email $email;

    /**
     * Time of subscription creation.
     *
     * @var DateTime
     */
    #[ORM\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    public DateTime $creationTime;

    /**
     * Confirmation contract associated with the subscription.
     *
     * @var ConfirmationContract
     */
    #[Assert\Valid]
    #[ORM\OneToOne(targetEntity: ConfirmationContract::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(referencedColumnName: 'uuid', nullable: false, onDelete: 'CASCADE')]
    public ConfirmationContract $confirmation;

    /**
     * Create a new contract.
     *
     * @param array<string, mixed> ...$params
     *
     * @psalm-suppress UndefinedThisPropertyFetch
     */
    public function __construct(array ...$params)
    {
        $params['creationTime'] ??= new DateTime();
        $params['confirmation'] ??= new ConfirmationContract();

        $this->injectProperties($params);
    }
}
