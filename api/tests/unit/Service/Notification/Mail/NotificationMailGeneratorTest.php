<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Notification\Mail;

use Doctrine\DBAL\Connection;
use Jazzfreunde\Api\Entity\Contract\ConfirmationContract;
use Jazzfreunde\Api\Entity\Notification\NotificationSubscription;
use Jazzfreunde\Api\Message\Messages\Email\EmailMessage;
use Jazzfreunde\Api\Repository\Filter\NotificationSubscriptionFilter;
use Jazzfreunde\Api\Repository\NotificationDeliveryRepositoryInterface;
use Jazzfreunde\Api\Service\Notification\Mail\NotificationMailGenerator;
use Jazzfreunde\Api\Service\Notification\NotificationSubscriptionRepositoryInterface;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;
use Jazzfreunde\Api\Service\Notification\Provider\NotificationProviderInterface;
use Jazzfreunde\Api\Service\Twig\EmailTemplatePath;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\Api\Type\Primitive\Email;
use Jazzfreunde\Api\Type\Primitive\HexToken;
use Jazzfreunde\Api\Type\Primitive\Uri;
use Jazzfreunde\UnitTest\UnitUnderTest;
use Jazzfreunde\Util\HashUtil;
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
            identityHash: HashUtil::sha256('event-42'),
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
                self::assertInstanceOf(EmailMessage::class, $message);
                $messages[] = $message;

                return new Envelope($message);
            });

        $connection = $uut->mock(Connection::class);
        $connection->expects(self::exactly(2))
            ->method('transactional')
            ->willReturnCallback(static fn (callable $transaction): mixed => $transaction());

        $uut->mock(NotificationDeliveryRepositoryInterface::class)
            ->expects(self::exactly(2))
            ->method('claim')
            ->with($resource, self::anything())
            ->willReturn(true);

        $uut->mock(NotificationSubscriptionRepositoryInterface::class)
            ->expects(self::once())
            ->method('findByFilter')
            ->with(self::callback(
                static fn (NotificationSubscriptionFilter $filter): bool => '/events/42' === $filter->resourceScope,
            ))
            ->willReturn([$firstSubscriber, $secondSubscriber]);

        $uut->mock(NotificationProviderInterface::class)
            ->expects(self::once())
            ->method('getByScope')
            ->with('/events/42')
            ->willReturn($resource);

        $generator = $uut->target();
        self::assertSame(2, $generator->generate('/events/42'));

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

    public function testGenerateDoesNotDispatchWhenDeliveryWasAlreadyClaimed(): void
    {
        $resource = new NotificationResource(
            uri: new Uri('/events/42'),
            identityHash: HashUtil::sha256('event-42'),
            email_template: EmailTemplatePath::EVENT_NOTIFICATION,
            title: 'Jazz concert',
        );
        $subscriber = $this->createSubscription(
            'first@example.com',
            new HexToken('0123456789abcdef0123456789abcdef'),
        );

        $uut = new UnitUnderTest(NotificationMailGenerator::class);
        $connection = $uut->mock(Connection::class);
        $connection->expects(self::once())
            ->method('transactional')
            ->willReturnCallback(static fn (callable $transaction): mixed => $transaction());

        $uut->mock(NotificationSubscriptionRepositoryInterface::class)
            ->expects(self::once())
            ->method('findByFilter')
            ->willReturn([$subscriber]);

        $uut->mock(NotificationProviderInterface::class)
            ->expects(self::once())
            ->method('getByScope')
            ->with('/events/42')
            ->willReturn($resource);

        $uut->mock(NotificationDeliveryRepositoryInterface::class)
            ->expects(self::once())
            ->method('claim')
            ->with($resource, $subscriber)
            ->willReturn(false);

        $uut->mock(MessageBusInterface::class)
            ->expects(self::never())
            ->method('dispatch');

        self::assertSame(0, $uut->target()->generate('/events/42'));
    }

    public function testGenerateReturnsZeroWhenThereAreNoSubscribers(): void
    {
        $uut = new UnitUnderTest(NotificationMailGenerator::class);
        $uut->mock(NotificationSubscriptionRepositoryInterface::class)
            ->expects(self::once())
            ->method('findByFilter')
            ->willReturn([]);
        $uut->mock(NotificationProviderInterface::class)
            ->expects(self::never())
            ->method('getByScope');
        $uut->mock(NotificationDeliveryRepositoryInterface::class)
            ->expects(self::never())
            ->method('claim');
        $uut->mock(Connection::class)
            ->expects(self::never())
            ->method('transactional');
        $uut->mock(MessageBusInterface::class)
            ->expects(self::never())
            ->method('dispatch');

        self::assertSame(0, $uut->target()->generate('/events/42'));
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
        self::assertInstanceOf(EmailMessage::class, $message);
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
