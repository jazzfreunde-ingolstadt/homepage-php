<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Notification\Mail;

use Jazzfreunde\Api\Entity\Contract\ConfirmationContract;
use Jazzfreunde\Api\Entity\Notification\NotificationSubscription;
use Jazzfreunde\Api\Message\Messages\Email\EmailNotification;
use Jazzfreunde\Api\Service\Notification\Mail\NotificationMailGenerator;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;
use Jazzfreunde\Api\Service\Twig\EmailTemplatePath;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\Api\Type\Primitive\Email;
use Jazzfreunde\Api\Type\Primitive\HexToken;
use Jazzfreunde\Api\Type\Primitive\Uri;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Address;

/**
 * @internal
 *
 * @covers \Jazzfreunde\Api\Service\Notification\Mail\NotificationMailGenerator
 */
final class NotificationMailGeneratorTest extends TestCase
{
    public function testGenerateDispatchesAnEmailForEachSubscriber(): void
    {
        $resource = new NotificationResource(
            uri: new Uri('/events/42'),
            email_template: EmailTemplatePath::EVENT_NOTIFICATION,
            title: 'Jazz concert',
            metadata: [
                'event' => ['title' => 'Jazz concert'],
                'token' => 'resource-token',
            ],
        );
        $firstToken = new HexToken('0123456789abcdef0123456789abcdef');
        $firstSubscriber = $this->createSubscription('first@example.com', $firstToken);
        $secondToken = new HexToken('abcdef0123456789abcdef0123456789');
        $secondSubscriber = $this->createSubscription('second@example.com', $secondToken);

        $uut = new UnitUnderTest(NotificationMailGenerator::class);
        $bus = $uut->mock(MessageBusInterface::class);
        $messages = [];
        $bus->expects(self::exactly(2))
            ->method('dispatch')
            ->willReturnCallback(static function (object $message) use (&$messages): Envelope {
                self::assertInstanceOf(EmailNotification::class, $message);
                $messages[] = $message;

                return new Envelope($message);
            });

        $generator = $uut->target();
        $generator->generate($resource, [$firstSubscriber, $secondSubscriber]);

        self::assertCount(2, $messages);
        self::assertEmailMessage(
            $messages[0],
            'first@example.com',
            $firstToken,
            $resource,
        );
        self::assertEmailMessage(
            $messages[1],
            'second@example.com',
            $secondToken,
            $resource,
        );
    }

    public function testGenerateDoesNotDispatchWhenThereAreNoSubscribers(): void
    {
        $uut = new UnitUnderTest(NotificationMailGenerator::class);
        $messages = [];
        $uut->mock(MessageBusInterface::class)
            ->expects(self::never())
            ->method('dispatch')
            ->willReturnCallback(static function (object $message) use (&$messages): Envelope {
                $messages[] = $message;

                return new Envelope($message);
            });

        $generator = $uut->target();
        $generator->generate(
            new NotificationResource(
                uri: new Uri('/events/42'),
                email_template: EmailTemplatePath::EVENT_NOTIFICATION,
                title: 'Jazz concert',
            ),
            [],
        );

        self::assertSame([], $messages);
    }

    private function createSubscription(string $email, HexToken $token): NotificationSubscription
    {
        $subscription = new NotificationSubscription();
        $subscription->email = new Email($email);
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->token = $token;

        return $subscription;
    }

    private static function assertEmailMessage(
        object $message,
        string $recipient,
        HexToken $token,
        NotificationResource $resource,
    ): void {
        self::assertInstanceOf(EmailNotification::class, $message);
        self::assertSame(KnownMailHandleEnum::NoReply, $message->sender);
        self::assertInstanceOf(Address::class, $message->recipient);
        self::assertSame($recipient, $message->recipient->getAddress());
        self::assertSame($resource->title, $message->subject);
        self::assertSame($resource->email_template, $message->twigTemplate);
        self::assertSame([
            'event' => ['title' => 'Jazz concert'],
            'token' => $token,
            'scope' => $resource->uri,
        ], $message->twigContext);
    }
}
