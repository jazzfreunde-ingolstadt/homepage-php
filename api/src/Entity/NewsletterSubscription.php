<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity;

use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\Api\Entity\Contract\ConfirmableEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Subscription for the newsletter.
 *
 * @psalm-api
 */
#[ORM\Entity]
#[ORM\Table(name: 'newsletter_subscriptions')]
#[UniqueEntity(
    fields: ['email'],
    message: 'This email is already subscribed to the newsletter.',
    errorPath: 'email',
)]
class NewsletterSubscription extends ConfirmableEntity {}
