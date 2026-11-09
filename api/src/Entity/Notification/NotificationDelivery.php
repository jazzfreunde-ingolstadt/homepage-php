<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Entity\Notification;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Idempotency record for a notification delivery to a recipient.
 */
#[ORM\Entity]
#[ORM\Table(name: 'notification_deliveries')]
class NotificationDelivery
{
    #[ORM\Id]
    #[ORM\Column(name: 'identity_hash', length: 64)]
    public string $identityHash;

    #[ORM\Column(type: 'datetime_immutable')]
    public DateTimeImmutable $createdAt;
}
