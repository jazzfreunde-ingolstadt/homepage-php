<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Newsletter;

use DateTime;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Event\Event\Newsletter\Subscription\NewSubscriptionEvent;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Jazzfreunde\App\Service\Newsletter\Exception\SubscriptionException;
use Jazzfreunde\App\Type\Primitive\Email;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Test for the newsletter service.
 */
final class NewsletterServiceTest extends TestCase
{
    private NewsletterSubscription $subscription;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $subscription = new NewsletterSubscription();
        $subscription->email = new Email('test@mail.com');
        $subscription->creationTime = new DateTime();
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->token = bin2hex(random_bytes(32));
        $subscription->confirmation->openForConfirmationUntil = new \DateTimeImmutable('+1 day');

        $this->subscription = $subscription;
    }

    /**
     * Test subscribing to the newsletter.
     */
    public function testSubscribe(): void
    {
        $subscription = $this->subscription;

        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('beginTransaction');
        $entityManager
            ->expects($this->once())
            ->method('persist');
        $entityManager
            ->expects($this->once())
            ->method('flush');
        $entityManager
            ->expects($this->once())
            ->method('commit');

        /** @var FormFactoryInterface&MockObject $formFactory */
        $formFactory = $this->createMock(FormFactoryInterface::class);
        /** @var UrlGeneratorInterface&MockObject $urlGenerator */
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $dispatcher
            ->expects($this->once())
            ->method('dispatch')
            ->with($this->callback(function (NewSubscriptionEvent $event) use ($subscription): bool {
                $this->assertSame($event->subscription, $subscription);

                return true;
            }));

        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher
        );

        $newsletterService->subscribe($subscription);
    }

    /**
     * Test subscribing to the newsletter with an already existing subscription.
     */
    public function testAlreadyExistingSubscriction(): void
    {
        $this->expectException(SubscriptionException::class);
        $this->expectExceptionCode(SubscriptionException::ALREADY_SUBSCRIBED);

        /** @var UniqueConstraintViolationException&MockObject $uniqueConstraintException */
        $uniqueConstraintException = $this->createMock(UniqueConstraintViolationException::class);

        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('beginTransaction');
        $entityManager
            ->expects($this->once())
            ->method('persist')
            ->willThrowException($uniqueConstraintException);
        $entityManager
            ->expects($this->never())
            ->method('flush');
        $entityManager
            ->expects($this->never())
            ->method('commit');

        /** @var FormFactoryInterface&MockObject $formFactory */
        $formFactory = $this->createMock(FormFactoryInterface::class);
        /** @var UrlGeneratorInterface&MockObject $urlGenerator */
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);

        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher
        );

        $newsletterService->subscribe($this->subscription);
    }

    /**
     * Test subscribing to the newsletter with an unknown exception.
     */
    public function testUnknownException(): void
    {
        $this->expectException(SubscriptionException::class);

        /** @var \Throwable&MockObject $exception */
        $exception = $this->createMock(\Throwable::class);

        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('beginTransaction');
        $entityManager
            ->expects($this->once())
            ->method('persist')
            ->willThrowException($exception);
        $entityManager
            ->expects($this->never())
            ->method('flush');
        $entityManager
            ->expects($this->once())
            ->method('rollback');

        /** @var FormFactoryInterface&MockObject $formFactory */
        $formFactory = $this->createMock(FormFactoryInterface::class);
        /** @var UrlGeneratorInterface&MockObject $urlGenerator */
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);

        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher
        );

        $newsletterService->subscribe($this->subscription);
    }

    /**
     * Test creating the subscription form.
     */
    public function testCreateForm(): void
    {
        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        /** @var FormFactoryInterface&MockObject $formFactory */
        $formFactory = $this->createMock(FormFactoryInterface::class);
        $formFactory
            ->expects($this->once())
            ->method('create')
            ->willReturn($this->createMock(FormInterface::class));
        /** @var UrlGeneratorInterface&MockObject $urlGenerator */
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);

        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher
        );

        $newsletterService->createForm();
    }
}
