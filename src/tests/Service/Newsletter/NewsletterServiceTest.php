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
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
        $subscription->confirmation = ConfirmationContract::create();

        $this->subscription = $subscription;
    }

    /**
     * Test subscribing to the newsletter.
     */
    public function testSubscribe(): void
    {
        $subscription = $this->subscription;

        $entityManager = $this->mockEntityManager();
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

        $formFactory = $this->mockFormFactory();
        $urlGenerator = $this->mockUrlGenerator();
        $dispatcher = $this->mockEventDispatcher();
        $dispatcher
            ->expects($this->once())
            ->method('dispatch')
            ->with($this->callback(function (NewSubscriptionEvent $event) use ($subscription): bool {
                $this->assertSame($event->subscription, $subscription);

                return true;
            }));

        $validator = $this->mockValidator(0);


        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher,
            validator: $validator,
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

        $entityManager = $this->mockEntityManager();
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

        $formFactory = $this->mockFormFactory();
        $urlGenerator = $this->mockUrlGenerator();
        $dispatcher = $this->mockEventDispatcher();
        $validator = $this->mockValidator(0);

        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher,
            validator: $validator,
        );

        $newsletterService->subscribe($this->subscription);
    }

    /**
     * Test subscribing to the newsletter with invalid subscription data.
     */
    public function testInvalidSubscriction(): void
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Invalid subscription data');

        $entityManager = $this->mockEntityManager();
        $formFactory = $this->mockFormFactory();
        $urlGenerator = $this->mockUrlGenerator();
        $dispatcher = $this->mockEventDispatcher();
        $validator = $this->mockValidator(1);

        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher,
            validator: $validator,
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

        $entityManager = $this->mockEntityManager();
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

        $formFactory = $this->mockFormFactory();
        $urlGenerator = $this->mockUrlGenerator();
        $dispatcher = $this->mockEventDispatcher();
        $validator = $this->mockValidator(0);

        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher,
            validator: $validator,
        );

        $newsletterService->subscribe($this->subscription);
    }

    /**
     * Test creating the subscription form.
     */
    public function testCreateForm(): void
    {
        $entityManager = $this->mockEntityManager();
        $formFactory = $this->mockFormFactory();
        $formFactory
            ->expects($this->once())
            ->method('create')
            ->willReturn($this->createMock(FormInterface::class));
        $urlGenerator = $this->mockUrlGenerator();
        $dispatcher = $this->mockEventDispatcher();

        /** @var ValidatorInterface&MockObject */
        $validator = $this->createMock(ValidatorInterface::class);

        $newsletterService = new NewsletterService(
            entityManager: $entityManager,
            formFactory: $formFactory,
            urlGenerator: $urlGenerator,
            dispatcher: $dispatcher,
            validator: $validator,
        );

        $newsletterService->createForm();
    }

    /**
     * Create a form factory mock.
     *
     * @return FormFactoryInterface&MockObject
     */
    private function mockFormFactory(): FormFactoryInterface&MockObject
    {
        /** @var FormFactoryInterface&MockObject */
        $formFactory = $this->createMock(FormFactoryInterface::class);

        return $formFactory;
    }

    /**
     * Create an event dispatcher mock.
     *
     * @return EventDispatcherInterface&MockObject
     */
    private function mockEventDispatcher(): EventDispatcherInterface&MockObject
    {
        /** @var EventDispatcherInterface&MockObject */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);

        return $dispatcher;
    }

    /**
     * Create an entity manager mock.
     *
     * @return EntityManagerInterface&MockObject
     */
    private function mockEntityManager(): EntityManagerInterface&MockObject
    {
        /** @var EntityManagerInterface&MockObject */
        $entityManager = $this->createMock(EntityManagerInterface::class);

        return $entityManager;
    }

    /**
     * Create a URL generator mock.
     *
     * @return UrlGeneratorInterface&MockObject
     */
    private function mockUrlGenerator(): UrlGeneratorInterface&MockObject
    {
        /** @var UrlGeneratorInterface&MockObject */
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);

        return $urlGenerator;
    }

    /**
     * Create a validator mock.
     *
     * @return ValidatorInterface&MockObject
     */
    private function mockValidator(int $errorCount): ValidatorInterface&MockObject
    {
        $violationList = $this->createMock(ConstraintViolationListInterface::class);
        $violationList
            ->method('count')
            ->willReturn($errorCount);

        /** @var ValidatorInterface&MockObject */
        $validator = $this->createMock(ValidatorInterface::class);
        $validator
            ->expects($this->once())
            ->method('validate')
            ->willReturn($violationList);

        return $validator;
    }
}
