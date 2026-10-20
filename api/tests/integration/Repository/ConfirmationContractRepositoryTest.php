<?php

declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Repository;

use DateTime;
use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Repository\ConfirmationContractRepository;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Tests for {@see ConfirmationContractRepository}.
 *
 * @internal
 *
 * @coversNothing
 */
final class ConfirmationContractRepositoryTest extends KernelTestCase
{
    use SetupDatabaseTrait;

    /**
     * Test purging expired, unconfirmed contracts.
     */
    public function testPurgeVacantContracts(): void
    {
        $kernel = self::bootKernel();
        $this->initDatabase($kernel);

        $container = self::getContainer();

        /** @var ManagerRegistry $registry */
        $registry = $container->get(ManagerRegistry::class);

        $this->createSubscription(
            $registry,
            'expired-pending@test.com',
            new DateTimeImmutable('-10 days'),
            ConfirmationStateEnum::Pending
        );
        $this->createSubscription(
            $registry,
            'expired-confirmed@test.com',
            new DateTimeImmutable('-8 days'),
            ConfirmationStateEnum::Confirmed
        );
        $this->createSubscription(
            $registry,
            'fresh-pending@test.com',
            new DateTimeImmutable('-1 days'),
            ConfirmationStateEnum::Pending
        );
        $this->createSubscription(
            $registry,
            'active-expiration-pending@test.com',
            new DateTimeImmutable('-10 days'),
            ConfirmationStateEnum::Pending,
            new DateTimeImmutable('+1 day')
        );
        $this->createSubscription(
            $registry,
            'expired-expiration-confirmed@test.com',
            new DateTimeImmutable('-1 day'),
            ConfirmationStateEnum::Confirmed,
            new DateTimeImmutable('-1 hour')
        );
        $this->createSubscription(
            $registry,
            'cancelled-before-expiration@test.com',
            new DateTimeImmutable('-1 day'),
            ConfirmationStateEnum::Cancelled,
            new DateTimeImmutable('+1 day')
        );

        /** @var ConfirmationContractRepository $contractRepository */
        $contractRepository = $container->get(ConfirmationContractRepository::class);
        $newsletterRepository = $registry->getRepository(NewsletterSubscription::class);

        $this->assertCount(6, $contractRepository->findAll());
        $this->assertCount(6, $newsletterRepository->findAll());

        $contractRepository->purgeVacantContracts();

        $this->assertCount(3, $contractRepository->findAll());
        $this->assertCount(3, $newsletterRepository->findAll());

        $this->assertNull($newsletterRepository->findOneBy(['email' => 'expired-pending@test.com']));
        $this->assertNull($newsletterRepository->findOneBy(['email' => 'expired-expiration-confirmed@test.com']));
        $this->assertNull($newsletterRepository->findOneBy(['email' => 'cancelled-before-expiration@test.com']));
        $this->assertNotNull($newsletterRepository->findOneBy(['email' => 'expired-confirmed@test.com']));
        $this->assertNotNull($newsletterRepository->findOneBy(['email' => 'fresh-pending@test.com']));
        $this->assertNotNull($newsletterRepository->findOneBy(['email' => 'active-expiration-pending@test.com']));
    }

    /**
     * Create and persist a newsletter subscription with confirmation contract.
     */
    private function createSubscription(
        ManagerRegistry $registry,
        string $email,
        DateTimeImmutable $requestTime,
        ConfirmationStateEnum $state,
        ?DateTimeImmutable $expirationTime = null,
    ): void {
        $subscription = new NewsletterSubscription();
        $subscription->email = new Email($email);
        $subscription->creationTime = new DateTime();

        $confirmation = new ConfirmationContract();
        $confirmation->requestTime = $requestTime;
        $confirmation->expirationTime = $expirationTime;
        $confirmation->state = $state;
        $subscription->confirmation = $confirmation;

        $manager = $registry->getManagerForClass(NewsletterSubscription::class);
        $manager->persist($subscription);
        $manager->flush();
    }
}
