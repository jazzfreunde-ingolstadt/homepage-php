<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Email;

use Doctrine\Persistence\ObjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\KnownMail;
use Jazzfreunde\App\Service\Email\MailService;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use PHPUnit\Framework\TestCase;
use Jazzfreunde\App\Service\Email\Exception\MailException;
use Jazzfreunde\App\Type\Primitive\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Test for the mail service.
 */
final class MailServiceTest extends TestCase
{
    /**
     * Test sending an email under valid conditions.
     */
    public function testSendMail(): void
    {
        /** @var MailerInterface&MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        $mailer
        ->expects($this->once())
        ->method('send')
        ->with($this->callback(function (TemplatedEmail $email): bool {
            $from = $email->getFrom();
            $to = $email->getTo();
            $this->assertEquals(array_shift($from)?->getAddress(), 'no-reply@test.com');
            $this->assertEquals(array_shift($to)?->getAddress(), 'test@mail.com');
            $this->assertEquals($email->getSubject(), 'subject');
            $this->assertEquals($email->getHtmlTemplate(), 'template.html.twig');

            return true;
        }));

        /** @var ObjectRepository&MockObject $repository */
        $repository = $this->createMock(ObjectRepository::class);
        $repository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn(
                new KnownMail(
                    id: 1,
                    handle: KnownMailHandleEnum::NoReply,
                    address: new Email('no-reply@test.com')
                )
            )
            ->with($this->equalTo(['handle' => KnownMailHandleEnum::NoReply]));
        /** @var ManagerRegistry&MockObject $doctrine */
        $doctrine = $this->createMock(ManagerRegistry::class);
        $doctrine
            ->method('getRepository')
            ->willReturn($repository);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(
            KnownMailHandleEnum::NoReply,
            new Email('test@mail.com'),
            'subject',
            'template.html.twig'
        );
    }

    /**
     * Test sending an email to a known mail.
     */
    public function testSendToKnownMail(): void
    {
        /** @var MailerInterface&MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        $mailer
        ->expects($this->once())
        ->method('send')
        ->with($this->callback(function (TemplatedEmail $email): bool {
            $from = $email->getFrom();
            $to = $email->getTo();
            $this->assertEquals(array_shift($from)?->getAddress(), 'no-reply@test.com');
            $this->assertEquals(array_shift($to)?->getAddress(), 'jazzletter@test.com');
            $this->assertEquals($email->getSubject(), 'subject');
            $this->assertEquals($email->getHtmlTemplate(), 'template.html.twig');

            return true;
        }));

        /** @var ObjectRepository&MockObject $repository */
        $repository = $this->createMock(ObjectRepository::class);
        $repository
            ->expects($this->exactly(2))
            ->method('findOneBy')
            ->willReturnCallback(
                fn(array $criteria) => 
                    match ($criteria['handle']) {
                        KnownMailHandleEnum::NoReply => new KnownMail(
                            id: 1,
                            handle: KnownMailHandleEnum::NoReply,
                            address: new Email('no-reply@test.com')
                        ),
                        KnownMailHandleEnum::Jazzletter => new KnownMail(
                            id: 1,
                            handle: KnownMailHandleEnum::Jazzletter,
                            address: new Email('jazzletter@test.com')
                        ),
                        default => null,
                    }
            );
        /** @var ManagerRegistry&MockObject $doctrine */
        $doctrine = $this->createMock(ManagerRegistry::class);
        $doctrine
            ->method('getRepository')
            ->willReturn($repository);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(
            KnownMailHandleEnum::NoReply,
            KnownMailHandleEnum::Jazzletter,
            'subject',
            'template.html.twig'
        );
    }

    /**
     * Test sending an email with an invalid subject.
     */
    public function testInvalidSubject(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Subject must be at least 5 characters long.');

        /** @var MailerInterface&MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        /** @var ManagerRegistry&MockObject $doctrine */
        $doctrine = $this->createMock(ManagerRegistry::class);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(KnownMailHandleEnum::NoReply, new Email('test@mail.com'), 'subj', 'template.html.twig');
    }

    /**
     * Test sending an email with an invalid template.
     */
    public function testInvalidTemplate(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Template must have a ".html.twig" file extension.');

        /** @var MailerInterface&MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        /** @var ManagerRegistry&MockObject $doctrine */
        $doctrine = $this->createMock(ManagerRegistry::class);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(KnownMailHandleEnum::NoReply, new Email('test@mail.com'), 'subject', 'template.twig');
    }

    /**
     * Test sending an email with KnownMail Handle that has not been registered.
     */
    public function testUnconfiguredKnownMailHandle(): void
    {
        $this->expectException(MailException::class);

        /** @var MailerInterface&MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        /** @var ObjectRepository&MockObject $repository */
        $repository = $this->createMock(ObjectRepository::class);
        $repository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn(null)
            ->with($this->equalTo(['handle' => KnownMailHandleEnum::NoReply]));
        /** @var ManagerRegistry&MockObject $doctrine */
        $doctrine = $this->createMock(ManagerRegistry::class);
        $doctrine
            ->method('getRepository')
            ->willReturn($repository);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(KnownMailHandleEnum::NoReply, new Email('test@mail.com'), 'subject', 'template.html.twig');
    }
}
