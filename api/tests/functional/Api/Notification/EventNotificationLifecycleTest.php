<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Api\Notification;

use DateInterval;
use DateTime;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\App\Entity\EventLocation;
use Jazzfreunde\App\Entity\Notification\NotificationSubscription;
use Jazzfreunde\App\Message\Handler\Tasks\EventNotificationHandler;
use Jazzfreunde\App\Message\Messages\Tasks\SendEventNotificationsMessage;
use Jazzfreunde\App\Repository\Filter\EventFilter;
use Jazzfreunde\App\Repository\Filter\NotificationSubscriptionFilter;
use Jazzfreunde\App\Service\Event\EventRepositoryInterface;
use Jazzfreunde\App\Service\Notification\NotificationSubscriptionRepositoryInterface;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\UnitTest\Fixtures\CallbackFixture;
use Jazzfreunde\UnitTest\Fixtures\KnownEmailsFixture;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

/**
 * Functional coverage for the event notification subscription lifecycle.
 *
 * @internal
 *
 * @coversNothing
 */
final class EventNotificationLifecycleTest extends WebTestCase
{
    use SetupDatabaseTrait;

    private const string SUBSCRIBER_EMAIL = 'event-subscriber@example.test';
    private const string EVENT_TITLE = 'Upcoming Jazz Night';

    private KernelBrowser $client;

    private ManagerRegistry $registry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = self::createClient();
        $this->client->disableReboot();
        $this->initDatabase(self::$kernel);

        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);
        $this->registry = $registry;
    }

    public function testEventNotificationSubscriptionLifecycle(): void
    {
        $resourceScope = $this->createDueEvent(self::EVENT_TITLE);
        $expirationTime = new DateTimeImmutable('+3 days', new DateTimeZone('Europe/Berlin'));
        $token = $this->requestSubscription(self::SUBSCRIBER_EMAIL, $resourceScope, $expirationTime);
        $subscriptionRepository = $this->confirmSubscription(
            self::SUBSCRIBER_EMAIL,
            $resourceScope,
            $token,
        );

        $this->assertAlreadySubscribedRequestIsRejected(self::SUBSCRIBER_EMAIL, $resourceScope);
        $this->dispatchEventNotification(self::EVENT_TITLE);
        $this->cancelSubscription($subscriptionRepository, $resourceScope, $token);
    }

    public function testSubscriptionRejectsExpirationTimeBeforeRequestTime(): void
    {
        $resourceScope = $this->createDueEvent('Event With Invalid Expiration');

        $this->client->request(
            Request::METHOD_POST,
            '/api/notifications',
            server: ['CONTENT_TYPE' => 'application/json'],
            content: json_encode([
                'resourceScope' => $resourceScope,
                'email' => 'invalid-expiration@example.test',
                'expirationTime' => (new DateTimeImmutable('-1 day'))->format(DATE_ATOM),
            ], flags: JSON_THROW_ON_ERROR),
        );

        $this->assertResponseStatusCodeSame(422);
    }

    private function createDueEvent(string $eventTitle): string
    {
        $this->applyFixtures(
            self::$kernel,
            new KnownEmailsFixture(),
            new CallbackFixture(callback: static function (ObjectManager $manager) use ($eventTitle): void {
                $location = new EventLocation();
                $location->name = 'Test Jazz Club';
                $manager->persist($location);

                $start = new DateTime('+2 days', new DateTimeZone('Europe/Berlin'));
                $event = new Event();
                $event->title = $eventTitle;
                $event->start = $start;
                $event->end = (clone $start)->modify('+2 hours');
                $event->location = $location;
                $manager->persist($event);
                $manager->flush();
            }),
        );

        /** @var null|Event $event */
        $event = $this->registry->getRepository(Event::class)->findOneBy(['title' => $eventTitle]);
        self::assertNotNull($event);
        self::assertNotNull($event->id);

        return '/events/'.$event->id;
    }

    private function requestSubscription(
        string $subscriberEmail,
        string $resourceScope,
        DateTimeImmutable $expirationTime,
    ): string {
        $this->client->request(
            Request::METHOD_POST,
            '/api/notifications',
            server: ['CONTENT_TYPE' => 'application/json'],
            content: json_encode([
                'resourceScope' => $resourceScope,
                'email' => $subscriberEmail,
                'expirationTime' => $expirationTime->format(DATE_ATOM),
            ], flags: JSON_THROW_ON_ERROR),
        );

        $this->assertResponseStatusCodeSame(201);
        self::assertEmailCount(1);
        $confirmationEmail = self::getMailerMessage(0);
        self::assertNotNull($confirmationEmail);
        self::assertEmailSubjectContains($confirmationEmail, 'Bestätigen Sie Ihre Newsletter Anmeldung');
        self::assertInstanceOf(TemplatedEmail::class, $confirmationEmail);

        /** @var null|NotificationSubscription $subscription */
        $subscription = $this->registry->getRepository(NotificationSubscription::class)->findOneBy([
            'email' => $subscriberEmail,
        ]);
        self::assertNotNull($subscription);
        self::assertSame(ConfirmationStateEnum::Pending, $subscription->confirmation->state);
        self::assertNotNull($subscription->confirmation->expirationTime);
        self::assertSame(
            $expirationTime->getTimestamp(),
            $subscription->confirmation->expirationTime->getTimestamp(),
        );

        return $subscription->confirmation->token->value();
    }

    private function confirmSubscription(
        string $subscriberEmail,
        string $resourceScope,
        string $token,
    ): NotificationSubscriptionRepositoryInterface {
        $this->client->request(Request::METHOD_POST, '/api/contracts/confirm/'.$token);

        $this->assertResponseStatusCodeSame(202);

        /** @var null|NotificationSubscription $confirmedSubscription */
        $confirmedSubscription = $this->registry->getRepository(NotificationSubscription::class)->findOneBy([
            'email' => $subscriberEmail,
        ]);
        self::assertNotNull($confirmedSubscription);
        self::assertSame(
            ConfirmationStateEnum::Confirmed,
            $confirmedSubscription->confirmation->state,
        );

        /** @var NotificationSubscriptionRepositoryInterface $subscriptionRepository */
        $subscriptionRepository = self::getContainer()->get(NotificationSubscriptionRepositoryInterface::class);
        self::assertCount(
            1,
            $subscriptionRepository->findByFilter(new NotificationSubscriptionFilter($resourceScope)),
        );

        return $subscriptionRepository;
    }

    private function assertAlreadySubscribedRequestIsRejected(
        string $subscriberEmail,
        string $resourceScope,
    ): void {
        $this->client->request(
            Request::METHOD_POST,
            '/api/notifications',
            server: ['CONTENT_TYPE' => 'application/json'],
            content: json_encode([
                'resourceScope' => $resourceScope,
                'email' => $subscriberEmail,
            ], flags: JSON_THROW_ON_ERROR),
        );

        $this->assertResponseStatusCodeSame(409);

        /** @var array{status:int, type:string, title:string, detail:string} $response */
        $response = json_decode((string) $this->client->getResponse()->getContent(), true, flags: JSON_THROW_ON_ERROR);
        self::assertSame(409, $response['status']);
        self::assertSame('Already subscribed', $response['title']);
        self::assertSame(
            'User with this email is already subscribed to this resource scope.',
            $response['detail'],
        );
        self::assertSame('urn:jazzfreunde-ingolstadt-error:already-subscribed', $response['type']);
        self::assertEmailCount(0);

        /** @var null|NotificationSubscription $subscription */
        $subscription = $this->registry->getRepository(NotificationSubscription::class)->findOneBy([
            'email' => $subscriberEmail,
        ]);
        self::assertNotNull($subscription);
        self::assertSame(ConfirmationStateEnum::Confirmed, $subscription->confirmation->state);
    }

    private function dispatchEventNotification(string $eventTitle): void
    {
        /** @var EventRepositoryInterface $eventRepository */
        $eventRepository = self::getContainer()->get(EventRepositoryInterface::class);
        self::assertCount(
            1,
            $eventRepository->findByFilter(new EventFilter(
                latestStart: (new DateTimeImmutable(timezone: new DateTimeZone('Europe/Berlin')))
                    ->add(new DateInterval('P7D')),
            )),
        );

        /** @var MessageBusInterface $messageBus */
        $messageBus = self::getContainer()->get(MessageBusInterface::class);
        $message = new SendEventNotificationsMessage(new DateInterval('P7D'));
        $envelope = $messageBus->dispatch($message);

        $handledStamp = $envelope->last(HandledStamp::class);
        self::assertNotNull($handledStamp);
        self::assertSame(
            EventNotificationHandler::class.'::handleSendEventNotifications',
            $handledStamp->getHandlerName(),
        );
        self::assertCount(2, self::getMailerEvents());
        self::assertQueuedEmailCount(1);
        self::assertEmailCount(1);
        self::assertEmailIsQueued(self::getMailerEvent(0));
        self::assertEmailIsNotQueued(self::getMailerEvent(1));
        $eventNotificationEmail = self::getMailerMessage(0);
        self::assertNotNull($eventNotificationEmail);
        self::assertEmailSubjectContains($eventNotificationEmail, $eventTitle);
    }

    private function cancelSubscription(
        NotificationSubscriptionRepositoryInterface $subscriptionRepository,
        string $resourceScope,
        string $token,
    ): void {
        $this->client->request(Request::METHOD_DELETE, '/api/contracts/cancel/'.$token);

        $this->assertResponseStatusCodeSame(202);
        self::assertCount(
            0,
            $subscriptionRepository->findByFilter(new NotificationSubscriptionFilter($resourceScope)),
        );

        /** @var MessageBusInterface $messageBus */
        $messageBus = self::getContainer()->get(MessageBusInterface::class);
        $message = new SendEventNotificationsMessage(new DateInterval('P7D'));
        $messageBus->dispatch($message);

        self::assertEmailCount(0);
        self::assertQueuedEmailCount(0);
    }
}
