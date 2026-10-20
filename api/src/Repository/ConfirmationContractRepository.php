<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Repository;

use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Service\Contract\ConfirmationContractPurgingInterface;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use RuntimeException;
use Throwable;

/**
 * Repository for managing {@see ConfirmationContract} entities.
 *
 * @psalm-api
 */
final class ConfirmationContractRepository extends ServiceEntityRepository implements ConfirmationContractPurgingInterface
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
        parent::__construct($registry, ConfirmationContract::class);
    }

    /**
     * Purge vacant confirmation contracts.
     */
    public function purgeVacantContracts(): void
    {
        $connection = $this->getEntityManager()->getConnection();
        $connection->beginTransaction();

        try {
            // Make sure this interval is not shorter than the confirmation workflow token lifetime.
            $now = new DateTimeImmutable();
            $cutoff = $now->modify('-7 days');

            $queryBuilder = $this->createQueryBuilder('contract');
            $queryBuilder
                ->delete(ConfirmationContract::class, 'contract')
                ->where('contract.expirationTime IS NULL')
                ->andWhere('contract.requestTime < :cutoff')
                ->andWhere('contract.state != :confirmedState')
                ->orWhere('contract.expirationTime < :now')
                ->orWhere('contract.state = :canceledState')
                ->setParameter('now', $now)
                ->setParameter('cutoff', $cutoff)
                ->setParameter('confirmedState', ConfirmationStateEnum::Confirmed)
                ->setParameter('canceledState', ConfirmationStateEnum::Cancelled)
                ->getQuery()
                ->execute();

            $connection->commit();
        } catch (Throwable $e) {
            $connection->rollback();

            throw new RuntimeException('Failed to purge vacant confirmation contracts', previous: $e);
        }
    }
}
