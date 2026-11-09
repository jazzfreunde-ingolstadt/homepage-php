<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Repository;

use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\Api\Entity\Notification\NotificationDelivery;
use Jazzfreunde\Api\Entity\Notification\NotificationSubscription;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;
use Jazzfreunde\Util\HashUtil;

/**
 * Repository for claiming notification deliveries exactly once.
 *
 * @extends ServiceEntityRepository<NotificationDelivery>
 */
final class NotificationDeliveryRepository extends ServiceEntityRepository implements NotificationDeliveryRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotificationDelivery::class);
    }

    public function claim(NotificationResource $notification, NotificationSubscription $subscription): bool
    {
        $identityHash = HashUtil::sha256(
            $notification->identityHash,
            $subscription->email->value(),
        );
        $connection = $this->getEntityManager()->getConnection();

        try {
            $connection->insert('notification_deliveries', [
                'identity_hash' => $identityHash,
                'created_at' => (new DateTimeImmutable())->format('Y-m-d H:i:s'),
            ]);

            return true;
        } catch (UniqueConstraintViolationException) {
            return false;
        }
    }
}
