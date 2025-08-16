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
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Tests for the mail service.
 */
final class EmailNotificationHandlerTest extends TestCase
{
    use MockingTrait;

    /**
     * Test sending an email under valid conditions.
     */
    public function testSendMail(): void
    {
        $uut = new UnitUnderTest(EmailNotificationHandler::class);

        $this->configValidator($uut, 0);

        $uut->mock(MailerInterface::class)
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

        $repository = $uut->mock(ObjectRepository::class);
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

        $uut->mock(ManagerRegistry::class)
            ->method('getRepository')
            ->willReturn($repository);

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subject',
            twigTemplate: 'template.html.twig',
        );

        $uut->target()->send($notification);
    }

    /**
     * Test sending an email to a known mail.
     */
    public function testSendToKnownMail(): void
    {
        $uut = new UnitUnderTest(EmailNotificationHandler::class);

        $this->configValidator($uut, 0);

        $uut->mock(MailerInterface::class)
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

        $repository = $uut->mock(ObjectRepository::class);
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

        $uut->mock(ManagerRegistry::class)
            ->method('getRepository')
            ->willReturn($repository);

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: KnownMailHandleEnum::Jazzletter,
            subject: 'subject',
            twigTemplate: 'template.html.twig',
        );

        $uut->target()->send($notification);
    }

    /**
     * Test sending an email with invalid data.
     */
    public function testInvalidMail(): void
    {
        $uut = new UnitUnderTest(EmailNotificationHandler::class);
        
        $this->configValidator($uut, 1);

        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subj',
            twigTemplate: 'template.html.twig',
        );
        
        $this->expectException(ValidationFailedException::class);
        
        $uut->target()->send($notification);
    }

    /**
     * Test sending an email with KnownMail Handle that has not been registered.
     */
    public function testUnconfiguredKnownMailHandle(): void
    {
        $uut = new UnitUnderTest(EmailNotificationHandler::class);

        $repository = $uut->mock(ObjectRepository::class);
        $repository
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn(null)
            ->with($this->equalTo(['handle' => KnownMailHandleEnum::NoReply]));
        $uut->mock(ManagerRegistry::class)
            ->method('getRepository')
            ->willReturn($repository);
        
        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subject',
            twigTemplate: 'template.html.twig',
        );

        $this->expectException(MailException::class);
        
        $uut->target()->send($notification);
    }

    /**
     * Test error handling of exceptions during transport.
     */
    public function testMailerThrowsTransportException(): void
    {
        $uut = new UnitUnderTest(EmailNotificationHandler::class);

        $this->configValidator($uut, 0);

        $uut->mock(LoggerInterface::class)
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

        $uut->mock(MailerInterface::class)
            ->expects($this->once())
            ->method('send')
            ->willThrowException(new \Symfony\Component\Mailer\Exception\TransportException('Test exception'));

        $repository = $uut->mock(ObjectRepository::class);
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
        $uut->mock(ManagerRegistry::class)
            ->method('getRepository')
            ->willReturn($repository);
            
        $notification = new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: new Address('test@mail.com', 'Mr. Testee'),
            subject: 'subject',
            twigTemplate: 'template.html.twig',
        );
            
        $this->expectException(MailException::class);
        $this->expectExceptionMessage('Failed to send email.');

        $uut->target()->send($notification);
    }

    /**
     * Configure validator mock.
     *
     * @param UnitUnderTest $uut
     * @param int $errorCount error count after validation
     * @return ValidatorInterface&MockObject
     */
    private function configValidator(
        UnitUnderTest $uut,
        int $errorCount
    ): ValidatorInterface&MockObject {
        $violationList = $this->mock(ConstraintViolationListInterface::class);
        $violationList
            ->method('count')
            ->willReturn($errorCount);

        $validator = $uut->mock(ValidatorInterface::class);
        $validator
            ->expects($this->once())
            ->method('validate')
            ->willReturn($violationList);

        return $validator;
    }
}
