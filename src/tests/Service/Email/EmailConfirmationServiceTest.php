<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Newsletter;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Service\Email\MailService;
use Jazzfreunde\App\Service\Email\EmailConfirmationService;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationPeriodExpiredException;
use Jazzfreunde\App\Type\Primitive\Email;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Test for email confirmation service
 */
final class EmailConfirmationServiceTest extends TestCase
{
    private ConfirmationContract $confirmation;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $confirmation = new ConfirmationContract();
        $confirmation->token = bin2hex(random_bytes(32));
        $confirmation->openForConfirmationUntil = new \DateTimeImmutable('+1 day');

        $this->confirmation = $confirmation;
    }

    /**
     * Test asking for confirmation
     */
    public function testAskForConfirmation(): void
    {
        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        /** @var MailService&MockObject $mailer */
        $mailer = $this->createMock(MailService::class);
        $mailer
            ->expects($this->once())
            ->method('send');

        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);

        $service = new EmailConfirmationService(
            $entityManager,
            $mailer,
            $dispatcher
        );

        $service->askForConfirmation(
            $this->confirmation,
            new Email('test@mail.com'),
            'Test',
            []
        );
    }

    /**
     * Test confirming a request
     */
    public function testConfirm(): void
    {
        /** @var ConfirmationContract&MockObject $confirmation */
        $confirmation = $this->createMock(ConfirmationContract::class);
        $confirmation->token = $this->confirmation->token;
        $confirmation->openForConfirmationUntil = $this->confirmation->openForConfirmationUntil;
        $confirmation
            ->expects($this->once())
            ->method('confirm');

        /** @var EntityRepository&MockObject $entityManager */
        $respository = $this->createMock(EntityRepository::class);
        $respository
            ->expects($this->once())
            ->method('findOneBy')
            ->with([ 'token' => $confirmation->token ])
            ->willReturn($confirmation);

        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('beginTransaction');
        $entityManager
            ->expects($this->once())
            ->method('flush');
        $entityManager
            ->expects($this->once())
            ->method('commit');
        $entityManager
            ->expects($this->once())
            ->method('getRepository')
            ->willReturn($respository);

        /** @var MailService&MockObject $mailer */
        $mailer = $this->createMock(MailService::class);

        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);

        $service = new EmailConfirmationService(
            $entityManager,
            $mailer,
            $dispatcher
        );

        $service->confirm($this->confirmation->token);
    }

    /**
     * Test confirming a request non existing contract
     */
    public function testConfirmUnkownContract(): void
    {
        /** @var EntityRepository&MockObject $entityManager */
        $respository = $this->createMock(EntityRepository::class);
        $respository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn(null);

        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('getRepository')
            ->willReturn($respository);
        $entityManager
            ->expects($this->never())
            ->method('flush');

        /** @var MailService&MockObject $mailer */
        $mailer = $this->createMock(MailService::class);

        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $dispatcher
            ->expects($this->never())
            ->method('dispatch');

        $service = new EmailConfirmationService(
            $entityManager,
            $mailer,
            $dispatcher
        );

        $this->expectException(ConfirmationContractNotFoundException::class);
        $service->confirm($this->confirmation->token);
    }

    /**
     * Test confirming a expired confirmation request
     */
    public function testConfirmExpiredContract(): void
    {
        /** @var ConfirmationContract&MockObject $confirmation */
        $confirmation = $this->createMock(ConfirmationContract::class);
        $confirmation->token = bin2hex(random_bytes(32));
        $confirmation->openForConfirmationUntil = new \DateTimeImmutable('-1 day');
        $confirmation
            ->expects($this->once())
            ->method('hasConfirmationPeriodExpired')
            ->willReturn(true);

        /** @var EntityRepository&MockObject $entityManager */
        $respository = $this->createMock(EntityRepository::class);
        $respository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn($confirmation);

        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('getRepository')
            ->willReturn($respository);
        $entityManager
            ->expects($this->never())
            ->method('flush');

        /** @var MailService&MockObject $mailer */
        $mailer = $this->createMock(MailService::class);

        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $dispatcher
            ->expects($this->never())
            ->method('dispatch');

        $service = new EmailConfirmationService(
            $entityManager,
            $mailer,
            $dispatcher
        );

        $this->expectException(ConfirmationPeriodExpiredException::class);
        $service->confirm($this->confirmation->token);
    }

    /**
     * Test canceling a contract
     */
    public function testCancel(): void
    {
        /** @var ConfirmationContract&MockObject $confirmation */
        $confirmation = $this->createMock(ConfirmationContract::class);
        $confirmation->token = bin2hex(random_bytes(32));
        $confirmation
            ->expects($this->once())
            ->method('cancel');

        /** @var EntityRepository&MockObject $entityManager */
        $respository = $this->createMock(EntityRepository::class);
        $respository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn($confirmation);

        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('beginTransaction');
        $entityManager
            ->expects($this->once())
            ->method('flush');
        $entityManager
            ->expects($this->once())
            ->method('commit');
        $entityManager
            ->expects($this->once())
            ->method('getRepository')
            ->willReturn($respository);

        /** @var MailService&MockObject $mailer */
        $mailer = $this->createMock(MailService::class);

        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);

        $service = new EmailConfirmationService(
            $entityManager,
            $mailer,
            $dispatcher
        );

        $service->cancel($this->confirmation->token);
    }

    /**
     * Test canceling a non existing contract
     */
    public function testCancelUnkownContract(): void
    {
        /** @var EntityRepository&MockObject $entityManager */
        $respository = $this->createMock(EntityRepository::class);
        $respository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn(null);

        /** @var EntityManagerInterface&MockObject $entityManager */
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('getRepository')
            ->willReturn($respository);
        $entityManager
            ->expects($this->never())
            ->method('flush');

        /** @var MailService&MockObject $mailer */
        $mailer = $this->createMock(MailService::class);

        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $dispatcher
            ->expects($this->never())
            ->method('dispatch');

        $service = new EmailConfirmationService(
            $entityManager,
            $mailer,
            $dispatcher
        );

        $this->expectException(ConfirmationContractNotFoundException::class);
        $service->cancel($this->confirmation->token);
    }
}
