<?php declare(strict_types = 1);

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
 */
final class ConfirmationContractRepositoryTest extends KernelTestCase
{
    use SetupDatabaseTrait;

    /**
     * Test purging expired, unconfirmed contracts.
     */
    public function testPurgeVacantContracts(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);

        $container = static::getContainer();
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

        /** @var ConfirmationContractRepository $contractRepository */
        $contractRepository = $container->get(ConfirmationContractRepository::class);
        $newsletterRepository = $registry->getRepository(NewsletterSubscription::class);

        $this->assertCount(3, $contractRepository->findAll());
        $this->assertCount(3, $newsletterRepository->findAll());

        $contractRepository->purgeVacantContracts();

        $this->assertCount(2, $contractRepository->findAll());
        $this->assertCount(2, $newsletterRepository->findAll());

        $this->assertNull($newsletterRepository->findOneBy(['email' => 'expired-pending@test.com']));
        $this->assertNotNull($newsletterRepository->findOneBy(['email' => 'expired-confirmed@test.com']));
        $this->assertNotNull($newsletterRepository->findOneBy(['email' => 'fresh-pending@test.com']));
    }

    /**
     * Create and persist a newsletter subscription with confirmation contract.
     */
    private function createSubscription(
        ManagerRegistry $registry,
        string $email,
        DateTimeImmutable $requestTime,
        ConfirmationStateEnum $state
    ): void {
        $subscription = new NewsletterSubscription();
        $subscription->email = new Email($email);
        $subscription->creationTime = new DateTime();

        $confirmation = new ConfirmationContract();
        $confirmation->requestTime = $requestTime;
        $confirmation->state = $state;
        $subscription->confirmation = $confirmation;

        $manager = $registry->getManagerForClass(NewsletterSubscription::class);
        $manager->persist($subscription);
        $manager->flush();
    }
}
