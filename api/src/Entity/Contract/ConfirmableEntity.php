<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity\Contract;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use Jazzfreunde\Api\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\Api\Entity\NewsletterSubscription;
use Jazzfreunde\Api\Entity\Notification\NotificationSubscription;
use Jazzfreunde\Api\Entity\Type\String\EmailType;
use Jazzfreunde\Api\Type\Primitive\Email;
use Jazzfreunde\Util\HashUtil;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Base class for entities that require confirmation (e.g., subscriptions) Trigger deployment.
 *
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'confirmable_entities')]
#[ORM\UniqueConstraint(
    name: 'UNIQ_CONFIRMABLE_ENTITY_IDENTITY_HASH',
    columns: ['identity_hash'],
)]
#[ORM\HasLifecycleCallbacks]
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
     * @var null|Uuid
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid')]
    public ?Uuid $uuid = null;

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

    #[ORM\Column(name: 'identity_hash', length: 64)]
    public private(set) string $identityHash = '' {
        set(string $value) {
            if ('' === $value) {
                throw new InvalidArgumentException('Identity hash cannot be an empty string.');
            }

            $this->identityHash = $value;
        }
        get => $this->identityHash;
    }

    /**
     * Values used to generate the identity hash.
     *
     * @var array<string>
     */
    protected array $identityValues {
        get => [$this->email->value()];
    }

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

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->identityHash = HashUtil::sha256(static::class, ...$this->identityValues);
    }
}
