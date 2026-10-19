<?php

declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Service\Newsletter;

use DateTime;
use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Exception\Contract\ConfirmationPeriodExpiredException;
use Jazzfreunde\App\Exception\Newsletter\SubscriptionException;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\UnitTest\Fixtures\KnownEmailsFixture;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Test for the newsletter service.
 *
 * @internal
 *
 * @coversNothing
 */
final class NewsletterServiceTest extends KernelTestCase
{
    use SetupDatabaseTrait;

    /**
     * Test subscribing to the newsletter.
     */
    public function testNewSubscription(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);
        $this->applyFixtures(self::$kernel, new KnownEmailsFixture());

        $container = self::getContainer();

        /** @var ManagerRegistry $registry */
        $registry = $container->get(ManagerRegistry::class);
        $repository = $registry->getRepository(NewsletterSubscription::class);

        $this->assertCount(0, $repository->findAll());

        $subscription = new NewsletterSubscription();
        $subscription->email = new Email('test@mail.com');
        $subscription->creationTime = new DateTime();

        /** @var NewsletterService $newsletter */
        $newsletter = $container->get(NewsletterService::class);
        $newsletter->subscribe($subscription);

        /** @var NewsletterSubscription */
        $created = $repository->findOneBy(['email' => 'test@mail.com']);
        $this->assertEquals(ConfirmationStateEnum::Pending, $created->confirmation->state);

        $email = self::getMailerMessage();
        self::assertNotNull($email);
        self::assertEmailSubjectContains($email, 'Bestätigen Sie Ihre Newsletter Anmeldung');
        self::assertSame(
            NewsletterSubscription::class,
            $created->confirmation->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_CLASS]
        );
        self::assertSame(
            $created->uuid,
            $created->confirmation->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_UUID]
        );
        self::assertEmailHtmlBodyContains($email, 'Vielen Dank für Ihr Interesse am Jazzfreunde-Newsletter.');
    }

    /**
     * Test subscribing to the newsletter with a previous expired confirmation link.
     */
    public function testNewAttemptRestartsExistingPendingSubscription(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);
        $this->applyFixtures(self::$kernel, new KnownEmailsFixture());

        $container = self::getContainer();

        /** @var ManagerRegistry $registry */
        $registry = $container->get(ManagerRegistry::class);
        $repository = $registry->getRepository(NewsletterSubscription::class);

        $subscription = new NewsletterSubscription();
        $subscription->email = new Email('test@mail.com');
        $subscription->creationTime = new DateTime();
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->requestTime = new DateTimeImmutable('-1 day');
        $subscription->confirmation->state = ConfirmationStateEnum::Pending;

        $manager = $registry->getManagerForClass(NewsletterSubscription::class);
        $manager->persist($subscription);
        $manager->flush();

        /** @var NewsletterService $newsletter */
        $newsletter = $container->get(NewsletterService::class);
        $newSubscription = new NewsletterSubscription();
        $newSubscription->email = new Email('test@mail.com');
        $newSubscription->creationTime = new DateTime();

        $newsletter->subscribe($newSubscription);

        /** @var NewsletterSubscription $created */
        $created = $repository->findOneBy(['email' => 'test@mail.com']);
        $this->assertEquals(ConfirmationStateEnum::Pending, $created->confirmation->state);
        $this->assertCount(1, $repository->findAll());

        $email = self::getMailerMessage();
        self::assertNotNull($email);
        self::assertEmailSubjectContains($email, 'Bestätigen Sie Ihre Newsletter Anmeldung');
    }

    /**
     * Test subscribing to the newsletter with an already existing email.
     */
    public function testNewAttemptOnExistingEmail(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);
        $this->applyFixtures(self::$kernel, new KnownEmailsFixture());

        $container = self::getContainer();

        /** @var ManagerRegistry $registry */
        $registry = $container->get(ManagerRegistry::class);

        $subscription = new NewsletterSubscription();
        $subscription->email = new Email('test@mail.com');
        $subscription->creationTime = new DateTime();
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->requestTime = new DateTimeImmutable('-1 day');
        $subscription->confirmation->state = ConfirmationStateEnum::Confirmed;

        $manager = $registry->getManagerForClass(NewsletterSubscription::class);
        $manager->persist($subscription);
        $manager->flush();

        $this->expectException(SubscriptionException::class);
        $this->expectExceptionCode(SubscriptionException::ALREADY_SUBSCRIBED);

        $subscription = new NewsletterSubscription();
        $subscription->email = new Email('test@mail.com');
        $subscription->creationTime = new DateTime();

        /** @var NewsletterService $newsletter */
        $newsletter = $container->get(NewsletterService::class);
        $newsletter->subscribe($subscription);
    }

    /**
     * Test confirming a subscription with a pending contract.
     */
    public function testConfirmationOfPendingSubscription(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);

        $container = self::getContainer();

        /** @var ManagerRegistry $registry */
        $registry = $container->get(ManagerRegistry::class);
        $repository = $registry->getRepository(NewsletterSubscription::class);

        $subscription = new NewsletterSubscription();
        $subscription->email = new Email('test@mail.com');
        $subscription->creationTime = new DateTime();
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->requestTime = new DateTimeImmutable();
        $subscription->confirmation->state = ConfirmationStateEnum::Pending;

        $manager = $registry->getManagerForClass(NewsletterSubscription::class);
        $manager->persist($subscription);
        $manager->flush();

        /** @var NewsletterService $newsletter */
        $newsletter = $container->get(NewsletterService::class);
        $newsletter->confirm($subscription->confirmation->token->value());

        /** @var NewsletterSubscription */
        $created = $repository->findOneBy(['email' => 'test@mail.com']);
        $this->assertEquals(ConfirmationStateEnum::Confirmed, $created->confirmation->state);
    }

    /**
     * Test confirming a subscription with a expired pending contract.
     */
    public function testConfirmationOfExpiredToken(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);

        $container = self::getContainer();

        /** @var ManagerRegistry $registry */
        $registry = $container->get(ManagerRegistry::class);

        $subscription = new NewsletterSubscription();
        $subscription->email = new Email('test@mail.com');
        $subscription->creationTime = new DateTime();
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->requestTime = new DateTimeImmutable('-1 day');
        $subscription->confirmation->state = ConfirmationStateEnum::Pending;

        $manager = $registry->getManagerForClass(NewsletterSubscription::class);
        $manager->persist($subscription);
        $manager->flush();

        $this->expectException(ConfirmationPeriodExpiredException::class);

        /** @var NewsletterService $newsletter */
        $newsletter = $container->get(NewsletterService::class);
        $newsletter->confirm($subscription->confirmation->token->value());
    }

    /**
     * Test confirming a subscription with a pending contract.
     */
    public function testCancellationOfSubscription(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);

        $container = self::getContainer();

        /** @var ManagerRegistry $registry */
        $registry = $container->get(ManagerRegistry::class);
        $repository = $registry->getRepository(NewsletterSubscription::class);

        $subscription = new NewsletterSubscription();
        $subscription->email = new Email('test@mail.com');
        $subscription->creationTime = new DateTime();
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->requestTime = new DateTimeImmutable();
        $subscription->confirmation->state = ConfirmationStateEnum::Confirmed;

        $manager = $registry->getManagerForClass(NewsletterSubscription::class);
        $manager->persist($subscription);
        $manager->flush();

        /** @var NewsletterService $newsletter */
        $newsletter = $container->get(NewsletterService::class);
        $newsletter->unsubscribe($subscription->confirmation->token->value());

        /** @var NewsletterSubscription */
        $created = $repository->findOneBy(['email' => 'test@mail.com']);
        $this->assertEquals(ConfirmationStateEnum::Cancelled, $created->confirmation->state);
    }
}
