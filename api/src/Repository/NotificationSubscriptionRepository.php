<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Notification\NotificationSubscription;
use Jazzfreunde\App\Repository\Filter\NotificationSubscriptionFilter;
use Jazzfreunde\App\Service\Notification\NotificationSubscriptionRepositoryInterface;

/**
 * Repository for managing {@see NotificationSubscription} entities.
 *
 * @extends ServiceEntityRepository<NotificationSubscription>
 *
 * @psalm-api
 */
final class NotificationSubscriptionRepository extends ServiceEntityRepository implements NotificationSubscriptionRepositoryInterface
{
    /**
     * Init repository.
     *
     * @param ManagerRegistry $registry
     *
     * @psalm-suppress PossiblyUnusedMethod
     * @psalm-suppress UnusedParam
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotificationSubscription::class);
    }

    /**
     * {@inheritDoc}
     */
    public function findByFilter(NotificationSubscriptionFilter $filter): array
    {
        $qb = $this->createQueryBuilder('subscription')
            ->where('subscription.resourceScope = :resourceScope OR :resourceScope LIKE CONCAT(subscription.resourceScope, \'/%\')')
            ->setParameter('resourceScope', $filter->resourceScope);

        if (null !== $filter->email) {
            $qb
                ->andWhere('subscription.email = :email')
                ->setParameter('email', $filter->email);
        }

        if (null !== $filter->confirmationState) {
            $qb
                ->join('subscription.confirmation', 'confirmation')
                ->andWhere('confirmation.state = :confirmationState')
                ->setParameter('confirmationState', $filter->confirmationState);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * {@inheritDoc}
     */
    public function findOneByFilter(NotificationSubscriptionFilter $filter): ?NotificationSubscription
    {
        $subscriptions = $this->findByFilter($filter);

        return array_shift($subscriptions);
    }
}
