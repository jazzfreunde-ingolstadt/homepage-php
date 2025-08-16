<?php declare(strict_types=1);

namespace Jazzfreunde\UnitTest\Trait;

use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Trait setting up a test database for integration tests.
 */
trait SetupDatabaseTrait
{
    /**
     * Initializes the database for integration tests.
     *
     * @param KernelInterface $kernel
     * @return void
     */
    protected function initDatabase(KernelInterface $kernel): void
    {
        $entityManager = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $metaData = $entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool($entityManager);
        $schemaTool->updateSchema($metaData);
    }
}
