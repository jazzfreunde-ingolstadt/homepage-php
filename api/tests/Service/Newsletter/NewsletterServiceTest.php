<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Newsletter;

use DateTime;
use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Exception\Contract\ConfirmationPeriodExpiredException;
use Jazzfreunde\App\Exception\Newsletter\SubscriptionException;
use Jazzfreunde\App\Message\Messages\Email\EmailNotification;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\UnitTest\ServiceMocks\InMemoryMessageBus;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Test for the newsletter service.
 */
final class NewsletterServiceTest extends KernelTestCase
{
    use SetupDatabaseTrait;

    private NewsletterSubscription $subscription;
    
    /**
     * Test subscribing to the newsletter.
     */
    public function testNewSubscription(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);

        $container = static::getContainer();
        $messageBus = new InMemoryMessageBus();
        $container->set(MessageBusInterface::class, $messageBus);
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

        $dispatchedMessages = $messageBus->getDispatchedMessages();
        $this->assertCount(1, $dispatchedMessages);
        $message = array_shift($dispatchedMessages);
        $notification = $message->getMessage();

        $this->assertInstanceOf(EmailNotification::class, $notification);
    }

    /**
     * Test subscribing to the newsletter with a previous expired confirmation link.
     */
    public function testExpiredConfirmationStillPending(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);

        $container = static::getContainer();
        $messageBus = new InMemoryMessageBus();
        $container->set(MessageBusInterface::class, $messageBus);
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
        $newsletter->subscribe($subscription);

        /** @var NewsletterSubscription $created */
        $created = $repository->findOneBy(['email' => 'test@mail.com']);
        $this->assertEquals(ConfirmationStateEnum::Pending, $created->confirmation->state);

        $dispatchedMessages = $messageBus->getDispatchedMessages();
        $this->assertCount(1, $dispatchedMessages);
        $message = array_shift($dispatchedMessages);
        $notification = $message->getMessage();

        $this->assertInstanceOf(EmailNotification::class, $notification);
    }

    /**
     * Test subscribing to the newsletter with an already existing email.
     */
    public function testNewAttemptOnExistingEmail(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);

        $container = static::getContainer();
        $messageBus = new InMemoryMessageBus();
        $container->set(MessageBusInterface::class, $messageBus);
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

        $container = static::getContainer();
        $messageBus = new InMemoryMessageBus();
        $container->set(MessageBusInterface::class, $messageBus);
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

        $container = static::getContainer();
        $messageBus = new InMemoryMessageBus();
        $container->set(MessageBusInterface::class, $messageBus);
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

        $container = static::getContainer();
        $messageBus = new InMemoryMessageBus();
        $container->set(MessageBusInterface::class, $messageBus);
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
