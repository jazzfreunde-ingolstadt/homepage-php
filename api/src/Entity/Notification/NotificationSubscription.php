<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity\Notification;

use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\Api\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\Api\Entity\Contract\ConfirmableEntity;
use Jazzfreunde\Api\Entity\Type\String\UriType;
use Jazzfreunde\Api\Type\Primitive\Uri;
use Override;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Subscription for any type of notifications.
 *
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'notification_subscriptions')]
#[ORM\Index(fields: ['resourceScope'])]
#[UniqueEntity(
    fields: ['resourceScope', 'email'],
    message: 'This email is already subscribed to this resource scope.',
    errorPath: 'email',
)]
class NotificationSubscription extends ConfirmableEntity
{
    use PropertyInjectionTrait;

    /**
     * URI associated with the subscription (e.g., endpoint for push notifications).
     *
     * @var Uri
     */
    #[ORM\Column(type: UriType::ENTITY_NAME)]
    public Uri $resourceScope;

    /**
     * {@inheritDoc}
     */
    protected array $identityValues {
        #[Override]
        get => [$this->email->value(), $this->resourceScope->value()];
    }

    /**
     * Create a new contract.
     *
     * @psalm-suppress UndefinedThisPropertyFetch
     */
    public function __construct()
    {
        parent::__construct();
    }
}
