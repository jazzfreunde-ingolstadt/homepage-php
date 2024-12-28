<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Newsletter;

use Doctrine\ORM\EntityManagerInterface;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Service\Email\MailService;
use Jazzfreunde\App\Service\Email\EmailConfirmationService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Test for the newsletter service.
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
     * Test subscribing to the newsletter.
     */
    public function testAskForConfirmation(): void
    {
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

        $violationList = $this->createMock(ConstraintViolationListInterface::class);
        $violationList
            ->expects($this->once())
            ->method('count')
            ->willReturn(0);

        /** @var ValidatorInterface&MockObject $validator */
        $validator = $this->createMock(ValidatorInterface::class);
        $validator
            ->expects($this->once())
            ->method('validate')
            ->willReturn($violationList);

        /** @var MailService&MockObject $mailer */
        $mailer = $this->createMock(MailService::class);
        $mailer
            ->expects($this->once())
            ->method('send');

        /** @var EventDispatcherInterface&MockObject $dispatcher */
        $dispatcher = $this->createMock(EventDispatcherInterface::class);

        $service = new EmailConfirmationService($entityManager, $validator, $mailer, $dispatcher);

        $service->askForConfirmation(
            $this->confirmation,
            'test@mail.com',
            'Test',
            []
        );
    }
}
