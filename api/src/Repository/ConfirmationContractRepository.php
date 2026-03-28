<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Repository;

use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Service\Contract\ConfirmationContractPurgingService;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use RuntimeException;
use Doctrine\Persistence\ManagerRegistry;
use Throwable;

/**
 * Repository for managing {@see ConfirmationContract} entities.
 */
final class ConfirmationContractRepository extends ServiceEntityRepository implements ConfirmationContractPurgingService
{
    /**
     * Init repository
     *
     * @param  ManagerRegistry $registry
     * @psalm-suppress PossiblyUnusedMethod
     * @psalm-suppress UnusedParam
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfirmationContract::class);
    }

    /**
     * Purge vacant confirmation contracts.
     *
     * @return void
     */
    public function purgeVacantContracts(): void
    {
        $connection = $this->getEntityManager()->getConnection();
        $connection->beginTransaction();

        try {
            $cutoff = new DateTimeImmutable('-7 days');

            $queryBuilder = $this->createQueryBuilder('contract');
            $queryBuilder
                ->delete(ConfirmationContract::class, 'contract')
                ->andWhere('contract.requestTime < :cutoff')
                ->andWhere('contract.state != :confirmedState')
                ->setParameter('cutoff', $cutoff)
                ->setParameter('confirmedState', ConfirmationStateEnum::Confirmed)
                ->getQuery()
                ->execute();

            $connection->commit();
        } catch (Throwable $e) {
            $connection->rollback();

            throw new RuntimeException('Failed to purge vacant confirmation contracts', previous: $e);
        }
    }
}
