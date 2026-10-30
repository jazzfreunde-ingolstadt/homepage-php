<?php

declare(strict_types=1);

namespace JazzfreundeTests\Api\Tests\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\Api\Entity\Notification\NotificationSubscription;
use Jazzfreunde\Api\Repository\Filter\NotificationSubscriptionFilter;
use Jazzfreunde\Api\Repository\NotificationSubscriptionRepository;
use Jazzfreunde\Api\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\Api\Type\Primitive\Email;
use Jazzfreunde\Api\Type\Primitive\Uri;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Uid\Uuid;

/**
 * Tests for {@see NotificationSubscriptionRepository}.
 *
 * @internal
 *
 * @coversNothing
 */
final class NotificationSubscriptionRepositoryTest extends KernelTestCase
{
    use SetupDatabaseTrait;

    public function testFindByFilterMatchesAncestorAndExactScopes(): void
    {
        $kernel = self::bootKernel();
        $this->initDatabase($kernel);

        $manager = $this->getObjectManager();
        $parentScope = $this->createSubscription($manager, 'parent@test.com', '/events');
        $exactScope = $this->createSubscription($manager, 'exact@test.com', '/events/123');
        $this->createSubscription($manager, 'nested@test.com', '/events/1234');
        $this->createSubscription($manager, 'unrelated@test.com', '/artists/123');
        $manager->flush();

        $results = $this->getRepository()->findByFilter(new NotificationSubscriptionFilter('/events/123'));

        self::assertEqualsCanonicalizing(
            [$parentScope->uuid, $exactScope->uuid],
            array_map(static fn (NotificationSubscription $subscription): ?Uuid => $subscription->uuid, $results),
        );
    }

    public function testFindByFilterCanRestrictResultsByEmail(): void
    {
        $kernel = self::bootKernel();
        $this->initDatabase($kernel);

        $manager = $this->getObjectManager();
        $matchingSubscription = $this->createSubscription($manager, 'matching@test.com', '/events');
        $this->createSubscription($manager, 'other@test.com', '/events/123');
        $manager->flush();

        $repository = $this->getRepository();
        $results = $repository->findByFilter(new NotificationSubscriptionFilter(
            resourceScope: '/events/123',
            email: 'matching@test.com',
        ));
        $noResults = $repository->findByFilter(new NotificationSubscriptionFilter(
            resourceScope: '/events/123',
            email: 'missing@test.com',
        ));

        self::assertSame([$matchingSubscription->uuid], array_map(
            static fn (NotificationSubscription $subscription): ?Uuid => $subscription->uuid,
            $results,
        ));
        self::assertSame([], $noResults);
    }

    public function testFindByFilterHonorsOptionalConfirmationState(): void
    {
        $kernel = self::bootKernel();
        $this->initDatabase($kernel);

        $manager = $this->getObjectManager();
        $confirmedSubscription = $this->createSubscription(
            $manager,
            'confirmed@test.com',
            '/events',
            ConfirmationStateEnum::Confirmed,
        );
        $pendingSubscription = $this->createSubscription(
            $manager,
            'pending@test.com',
            '/events/123',
            ConfirmationStateEnum::Pending,
        );
        $manager->flush();

        $repository = $this->getRepository();
        $unfilteredStateFilter = new NotificationSubscriptionFilter('/events/123');
        $unfilteredStateFilter->confirmationState = null;
        $pendingFilter = new NotificationSubscriptionFilter('/events/123');
        $pendingFilter->confirmationState = ConfirmationStateEnum::Pending;

        $confirmedResults = $repository->findByFilter(new NotificationSubscriptionFilter('/events/123'));
        $allResults = $repository->findByFilter($unfilteredStateFilter);
        $pendingResults = $repository->findByFilter($pendingFilter);

        self::assertSame(
            [$confirmedSubscription->uuid],
            array_map(static fn (NotificationSubscription $subscription): ?Uuid => $subscription->uuid, $confirmedResults),
        );
        self::assertEqualsCanonicalizing(
            [$confirmedSubscription->uuid, $pendingSubscription->uuid],
            array_map(static fn (NotificationSubscription $subscription): ?Uuid => $subscription->uuid, $allResults),
        );
        self::assertSame(
            [$pendingSubscription->uuid],
            array_map(static fn (NotificationSubscription $subscription): ?Uuid => $subscription->uuid, $pendingResults),
        );
    }

    public function testFindOneByFilterReturnsMatchingSubscriptionOrNull(): void
    {
        $kernel = self::bootKernel();
        $this->initDatabase($kernel);

        $manager = $this->getObjectManager();
        $subscription = $this->createSubscription($manager, 'single@test.com', '/events');
        $manager->flush();

        $repository = $this->getRepository();

        self::assertSame($subscription, $repository->findOneByFilter(new NotificationSubscriptionFilter(
            resourceScope: '/events/123',
            email: 'single@test.com',
        )));
        self::assertNull($repository->findOneByFilter(new NotificationSubscriptionFilter(
            resourceScope: '/events/123',
            email: 'missing@test.com',
        )));
    }

    private function getObjectManager(): ObjectManager
    {
        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);

        return $registry->getManagerForClass(NotificationSubscription::class)
            ?? throw new LogicException('No manager is configured for notification subscriptions.');
    }

    private function getRepository(): NotificationSubscriptionRepository
    {
        // @var NotificationSubscriptionRepository $repository
        return self::getContainer()->get(NotificationSubscriptionRepository::class);
    }

    private function createSubscription(
        ObjectManager $manager,
        string $email,
        string $resourceScope,
        ConfirmationStateEnum $confirmationState = ConfirmationStateEnum::Confirmed,
    ): NotificationSubscription {
        $subscription = new NotificationSubscription();
        $subscription->email = new Email($email);
        $subscription->resourceScope = new Uri($resourceScope);
        $subscription->confirmation->state = $confirmationState;
        $manager->persist($subscription);

        return $subscription;
    }
}
