<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Email;

use Jazzfreunde\App\Entity\KnownMail;
use Jazzfreunde\App\Service\Email\MailService;
use Jazzfreunde\App\Type\KnownMailHandleEnum;
use PHPUnit\Framework\TestCase;
use Jazzfreunde\App\Service\Email\Exception\MailException;
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
        /** @var MailerInterface|MockObject $mailer */
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

        /** @var \Doctrine\Persistence\ObjectRepository|MockObject $repository */
        $repository = $this->createMock(\Doctrine\Persistence\ObjectRepository::class);
        $repository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn(new KnownMail(id: 1, handle: KnownMailHandleEnum::NoReply, address: 'no-reply@test.com'))
            ->with($this->equalTo(['handle' => KnownMailHandleEnum::NoReply]));
        /** @var \Doctrine\Persistence\ManagerRegistry|MockObject $doctrine */
        $doctrine = $this->createMock(\Doctrine\Persistence\ManagerRegistry::class);
        $doctrine
            ->method('getRepository')
            ->willReturn($repository);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(KnownMailHandleEnum::NoReply, 'test@mail.com', 'subject', 'template.html.twig');
    }

    /**
     * Test sending an email with an invalid subject.
     */
    public function testInvalidSubject(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Subject must be at least 5 characters long.');

        /** @var MailerInterface|MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        /** @var \Doctrine\Persistence\ManagerRegistry|MockObject $doctrine */
        $doctrine = $this->createMock(\Doctrine\Persistence\ManagerRegistry::class);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(KnownMailHandleEnum::NoReply, 'test@mail.com', 'subj', 'template.html.twig');
    }

    /**
     * Test sending an email with an invalid template.
     */
    public function testInvalidTemplate(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Template must have a ".html.twig" file extension.');

        /** @var MailerInterface|MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        /** @var \Doctrine\Persistence\ManagerRegistry|MockObject $doctrine */
        $doctrine = $this->createMock(\Doctrine\Persistence\ManagerRegistry::class);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(KnownMailHandleEnum::NoReply, 'test@mail.com', 'subject', 'template.twig');
    }

    /**
     * Test sending an email with KnownMail Handle that has not been registered.
     */
    public function testUnconfiguredKnownMailHandle(): void
    {
        $this->expectException(MailException::class);

        /** @var MailerInterface|MockObject $mailer */
        $mailer = $this->createMock(MailerInterface::class);
        /** @var \Doctrine\Persistence\ObjectRepository|MockObject $repository */
        $repository = $this->createMock(\Doctrine\Persistence\ObjectRepository::class);
        $repository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn(null)
            ->with($this->equalTo(['handle' => KnownMailHandleEnum::NoReply]));
        /** @var \Doctrine\Persistence\ManagerRegistry|MockObject $doctrine */
        $doctrine = $this->createMock(\Doctrine\Persistence\ManagerRegistry::class);
        $doctrine
            ->method('getRepository')
            ->willReturn($repository);

        $mailService = new MailService($doctrine, $mailer);
        $mailService->send(KnownMailHandleEnum::NoReply, 'test@mail.com', 'subject', 'template.html.twig');
    }
}
