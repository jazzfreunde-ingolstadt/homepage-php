<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Email;

use Jazzfreunde\App\Message\Messages\Email\EmailNotification;
use Doctrine\Persistence\ObjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\KnownMail;
use Jazzfreunde\App\Message\Handler\Email\EmailNotificationHandler;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use PHPUnit\Framework\TestCase;
use Jazzfreunde\App\Message\Exception\MailException;
use Jazzfreunde\App\Type\Primitive\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mime\Address;

/**
 * Tests for the mail service.
 */
final class EmailNotificationHandlerTest extends TestCase
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
            ->with($this->equalTo(['handle' => KnownMailHandleEnum::NoReply]))
            ->willReturn(
                new KnownMail(
                    id: 1,
                    handle: KnownMailHandleEnum::NoReply,
                    address: new Email('no-reply@test.com')
                )
            );
        /** @var ManagerRegistry&MockObject $doctrine */
        $doctrine = $this->createMock(ManagerRegistry::class);
        $doctrine
            ->method('getRepository')
            ->willReturn($repository);

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recepient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subject',
            twigTemplate: 'template.html.twig',
        );

        $handler = new EmailNotificationHandler($doctrine, $mailer);
        $handler->send($notification);
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

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recepient: KnownMailHandleEnum::Jazzletter,
            subject: 'subject',
            twigTemplate: 'template.html.twig',
        );

        $handler = new EmailNotificationHandler($doctrine, $mailer);
        $handler->send($notification);
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

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recepient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subj',
            twigTemplate: 'template.html.twig',
        );
        
        $mailService = new EmailNotificationHandler($doctrine, $mailer);
        $mailService->send($notification);
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

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recepient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subject',
            twigTemplate: 'template.twig',
        );

        $mailService = new EmailNotificationHandler($doctrine, $mailer);
        $mailService->send($notification);
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

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recepient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subject',
            twigTemplate: 'template.html.twig',
        );

        $mailService = new EmailNotificationHandler($doctrine, $mailer);
        $mailService->send($notification);
    }

    /**
     * Test error handling of exceptions during transport.
     */
    public function testMailerThrowsTransportException(): void
    {
        $this->expectException(MailException::class);
        $this->expectExceptionMessage('Failed to send email.');

        /** @var LoggerInterface&MockObject $logger */
        $logger = $this->createMock(LoggerInterface::class);
        $logger
            ->expects($this->once())
            ->method('error')
            ->with(
                $this->equalTo('Failed to send mail.'),
                $this->equalTo([
                    'from' => ['no-reply@test.com', 'Jazzfreunde Ingolstadt e.V.'],
                    'to' => ['test@mail.com', 'Mr. Testee'],
                    'inner-exception' => 'Test exception',
                ]),
            );
        /** @var MailerInterface&MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        $mailer->expects($this->once())
            ->method('send')
            ->willThrowException(new \Symfony\Component\Mailer\Exception\TransportException('Test exception'));
        /** @var ObjectRepository&MockObject $repository */
        $repository = $this->createMock(ObjectRepository::class);
        $repository
            ->expects($this->once())
            ->method('findOneBy')
            ->with($this->equalTo(['handle' => KnownMailHandleEnum::NoReply]))
            ->willReturn(
                new KnownMail(
                    id: 1,
                    handle: KnownMailHandleEnum::NoReply,
                    address: new Email('no-reply@test.com')
                )
            );
        /** @var ManagerRegistry&MockObject $doctrine */
        $doctrine = $this->createMock(ManagerRegistry::class);
        $doctrine
            ->method('getRepository')
            ->willReturn($repository);

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recepient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subject',
            twigTemplate: 'template.html.twig',
        );

        $mailService = new EmailNotificationHandler($doctrine, $mailer);
        $mailService->send($notification);
    }
}
