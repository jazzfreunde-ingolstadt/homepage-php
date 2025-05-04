<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Newsletter;

use DateTime;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Exception\Newsletter\SubscriptionException;
use Jazzfreunde\App\Service\Contract\ConfirmationContractService;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Test for the newsletter service.
 */
final class NewsletterServiceTest extends KernelTestCase
{
    use MockingTrait;

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
        $subscription->confirmation->token = ConfirmationContract::generateToken();
        $subscription->confirmation->requestTime = new \DateTimeImmutable();

        $this->subscription = $subscription;
    }

    /**
     * Test subscribing to the newsletter.
     */
    public function testSubscribe(): void
    {
        $this->bootKernel();

        $subscription = $this->subscription;

        $uut = new UnitUnderTest(NewsletterService::class);

        $objectManager = $uut->mock(ObjectManager::class);
        $objectManager
            ->expects($this->once())
            ->method('persist')
            ->with($this->equalTo($subscription));
        $objectManager
            ->expects($this->once())
            ->method('flush');

        $uut->mock(ManagerRegistry::class)
            ->expects($this->once())
            ->method('getManagerForClass')
            ->with($this->equalTo(ConfirmationContract::class))
            ->willReturn($objectManager);

        $connection = $uut->mock(Connection::class);
        $connection
            ->expects($this->once())
            ->method('beginTransaction');
        $connection
            ->expects($this->once())
            ->method('commit');

        $uut->mock(ManagerRegistry::class)
            ->expects($this->once())
            ->method('getConnection')
            ->willReturn($connection);

        $uut->mock(ConfirmationContractService::class)
            ->expects($this->once())
            ->method('startEmailConfirmation')
            ->with(
                $this->equalTo($subscription->confirmation),
                $this->equalTo($subscription->email),
            );

        $uut->target()->subscribe($subscription);
    }

    /**
     * Test subscribing to the newsletter with an already existing subscription.
     */
    public function testAlreadyExistingSubscriction(): void
    {
        $subscription = $this->subscription;
        $subscription->confirmation->state = ConfirmationStateEnum::Confirmed;

        $this->expectException(SubscriptionException::class);
        $this->expectExceptionCode(SubscriptionException::ALREADY_SUBSCRIBED);
        
        $uut = new UnitUnderTest(NewsletterService::class);

        $objectManager = $uut->mock(ObjectManager::class);
        $objectManager
            ->expects($this->once())
            ->method('persist')
            ->willThrowException($this->mock(UniqueConstraintViolationException::class));
        $objectManager
            ->expects($this->never())
            ->method('flush');
        $repository = $uut->mock(ObjectRepository::class);
        $repository
            ->method('findOneBy')
            ->with($this->equalTo(['email' => $this->subscription->email]))
            ->willReturn($this->subscription);

        $registry = $uut->mock(ManagerRegistry::class);
        $registry
            ->expects($this->once())
            ->method('getManagerForClass')
            ->with($this->equalTo(ConfirmationContract::class))
            ->willReturn($objectManager);
        $registry
            ->method('getRepository')
            ->with($this->equalTo(NewsletterSubscription::class))
            ->willReturn($repository);
        $registry
            ->expects($this->once())
            ->method('resetManager');

        $connection = $uut->mock(Connection::class);
        $connection
            ->expects($this->once())
            ->method('beginTransaction');
        $connection
            ->expects($this->never())
            ->method('commit');
        $connection
            ->expects($this->once())
            ->method('rollback');

        $uut->mock(ManagerRegistry::class)
            ->expects($this->once())
            ->method('getConnection')
            ->willReturn($connection);

        $uut->mock(ConfirmationContractService::class)
            ->expects($this->once())
            ->method('startEmailConfirmation')
            ->with(
                $this->equalTo($subscription->confirmation),
                $this->equalTo($subscription->email),
            );

        $uut->target()->subscribe($subscription);
    }

    /**
     * Test subscribing to the newsletter with invalid subscription data.
     */
    public function testInvalidSubscriction(): void
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Invalid subscription data');

        $uut = new UnitUnderTest(NewsletterService::class);

        $violationList = $this->mock(ConstraintViolationListInterface::class);
        $violationList
            ->method('count')
            ->willReturn(1);

        $validator = $uut->mock(ValidatorInterface::class);
        $validator
            ->expects($this->once())
            ->method('validate')
            ->willReturn($violationList);

        $uut->target()->subscribe($this->subscription);
    }

    /**
     * Test subscribing to the newsletter with an unknown exception.
     */
    public function testSubscribeHandlesUnknownException(): void
    {
        $this->expectException(SubscriptionException::class);

        $uut = new UnitUnderTest(NewsletterService::class);
        
        $objectManager = $uut->mock(ObjectManager::class);
        $objectManager
            ->expects($this->once())
            ->method('persist')
            ->willThrowException($this->mock(\Throwable::class));

        $uut->target()->subscribe($this->subscription);
    }

    /**
     * Create a validator mock.
     *
     * @return ValidatorInterface&MockObject
     */
    private function mockValidator(UnitUnderTest $uut, int $errorCount): void
    {
        $violationList = $this->createMock(ConstraintViolationListInterface::class);
        $violationList
            ->method('count')
            ->willReturn($errorCount);

        $validator = $uut->mock(ValidatorInterface::class);
        $validator
            ->expects($this->once())
            ->method('validate')
            ->willReturn($violationList);
    }
}
