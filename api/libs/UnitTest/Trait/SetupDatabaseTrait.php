<?php

declare(strict_types=1);

namespace Jazzfreunde\UnitTest\Trait;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
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
     */
    protected function initDatabase(KernelInterface $kernel): void
    {
        $entityManager = $this->getEntityManager($kernel);
        $metaData = $entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool($entityManager);
        $schemaTool->updateSchema($metaData);
    }

    /**
     * Loads the given fixtures into the database.
     *
     * @param KernelInterface  $kernel
     * @param FixtureInterface ...$fixtures
     */
    protected function applyFixtures(KernelInterface $kernel, FixtureInterface ...$fixtures): void
    {
        $loader = new Loader();
        foreach ($fixtures as $fixture) {
            $loader->addFixture($fixture);
        }

        $entityManager = $this->getEntityManager($kernel);
        $executor = new ORMExecutor($entityManager, new ORMPurger());
        $executor->execute($loader->getFixtures());
    }

    private function getEntityManager(KernelInterface $kernel): EntityManagerInterface
    {
        return $kernel->getContainer()->get('doctrine.orm.entity_manager');
    }
}
