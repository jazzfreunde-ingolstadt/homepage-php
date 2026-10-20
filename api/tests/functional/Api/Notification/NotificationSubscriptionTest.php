<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Api\Notification;

use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Entity\Notification\NotificationSubscription;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\App\Type\Primitive\Uri;
use Jazzfreunde\UnitTest\Fixtures\CallbackFixture;
use Jazzfreunde\UnitTest\Fixtures\KnownEmailsFixture;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tests for {@see NotificationSubscription}.
 *
 * @internal
 *
 * @coversNothing
 */
final class NotificationSubscriptionTest extends WebTestCase
{
    use SetupDatabaseTrait;

    /**
     * Test creating a notification subscription via the API.
     */
    public function testCreateSubscription(): void
    {
        $client = self::createClient();
        $this->initDatabase(self::$kernel);
        $this->applyFixtures(self::$kernel, new KnownEmailsFixture());

        $container = self::getContainer();

        /** @var ManagerRegistry $registry */
        $registry = $container->get(ManagerRegistry::class);

        $content = json_encode([
            'resourceScope' => '/events/123',
            'email' => 'test@mail.com',
        ]);

        $client->request(
            Request::METHOD_POST,
            '/api/notifications',
            server: [
                'CONTENT_TYPE' => 'application/json',
            ],
            content: $content
        );

        $this->assertResponseStatusCodeSame(201);

        /** @var NotificationSubscription $subscription */
        $subscription = $registry->getRepository(NotificationSubscription::class)->findOneBy(['email' => 'test@mail.com']);
        $this->assertNotNull($subscription);
        $this->assertEquals('/events/123', $subscription->resourceScope->value());
        $this->assertEquals('test@mail.com', $subscription->email->value());

        $contract = $subscription->confirmation;
        $this->assertNotNull($contract);
        $this->assertEquals($contract->state, ConfirmationStateEnum::Pending);
        self::assertSame(
            NotificationSubscription::class,
            $contract->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_CLASS]
        );
        self::assertSame(
            $subscription->uuid,
            $contract->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_UUID]
        );

        $email = self::getMailerMessage();
        self::assertNotNull($email);
        self::assertEmailSubjectContains($email, 'Bitte bestätigen Sie Ihre Anmeldung für Benachrichtigungen');
        self::assertEmailHtmlBodyContains($email, 'Vielen Dank für Ihr Interesse an unseren Benachrichtigungen.');
    }

    /**
     * Test that creating a subscription again restarts an unconfirmed subscription.
     */
    public function testCreateSubscriptionRestartsUnconfirmedSubscription(): void
    {
        $client = self::createClient();
        $expirationTime = new DateTimeImmutable('+3 days');
        $this->initDatabase(self::$kernel);
        $this->applyFixtures(
            self::$kernel,
            new KnownEmailsFixture(),
            new CallbackFixture(callback: function (ObjectManager $manager): void {
                $subscription = new NotificationSubscription();
                $subscription->resourceScope = Uri::from('/events/123');
                $subscription->email = Email::from('test@mail.com');
                $subscription->confirmation = new ConfirmationContract();
                $subscription->confirmation->state = ConfirmationStateEnum::Pending;
                $manager->persist($subscription);
                $manager->flush();
            })
        );

        $client->request(
            Request::METHOD_POST,
            '/api/notifications',
            server: [
                'CONTENT_TYPE' => 'application/json',
            ],
            content: json_encode([
                'resourceScope' => '/events/123',
                'email' => 'test@mail.com',
                'expirationTime' => $expirationTime->format(DATE_ATOM),
            ])
        );

        $this->assertResponseStatusCodeSame(200);

        /** @var array{message:string} $response */
        $response = json_decode((string) $client->getResponse()->getContent(), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame('The confirmation workflow has been restarted for this subscription.', $response['message']);

        $email = self::getMailerMessage();
        self::assertNotNull($email);
        self::assertEmailSubjectContains($email, 'Bitte bestätigen Sie Ihre Anmeldung für Benachrichtigungen');

        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);

        /** @var null|NotificationSubscription $subscription */
        $subscription = $registry->getRepository(NotificationSubscription::class)->findOneBy(['email' => 'test@mail.com']);
        self::assertNotNull($subscription);
        self::assertNotNull($subscription->confirmation->expirationTime);
        self::assertSame(
            $expirationTime->getTimestamp(),
            $subscription->confirmation->expirationTime->getTimestamp(),
        );
    }

    /**
     * Test creating a notification subscription that is already subscribed via the API.
     */
    public function testCreateSubscriptionAlreadySubscribed(): void
    {
        $client = self::createClient();
        $this->initDatabase(self::$kernel);
        $this->applyFixtures(
            self::$kernel,
            new KnownEmailsFixture(),
            new CallbackFixture(callback: function (ObjectManager $manager) {
                $subscription = new NotificationSubscription();
                $subscription->resourceScope = Uri::from('/events/123');
                $subscription->email = Email::from('test@mail.com');
                $subscription->confirmation = new ConfirmationContract();
                $subscription->confirmation->state = ConfirmationStateEnum::Confirmed;
                $manager->persist($subscription);
                $manager->flush();
            })
        );

        $content = json_encode([
            'resourceScope' => '/events/123',
            'email' => 'test@mail.com',
        ]);

        $client->request(
            Request::METHOD_POST,
            '/api/notifications',
            server: [
                'CONTENT_TYPE' => 'application/json',
            ],
            content: $content
        );

        $this->assertResponseStatusCodeSame(409, 'Expected a 409 Conflict response for already subscribed email.');

        /** @var array{status:int, type:string, title:string, detail:string} $response */
        $response = json_decode((string) $client->getResponse()->getContent(), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame(409, $response['status']);
        $this->assertSame('Already subscribed', $response['title']);
        $this->assertSame('User with this email is already subscribed to this resource scope.', $response['detail']);
        $this->assertSame('urn:jazzfreunde-ingolstadt-error:already-subscribed', $response['type']);

        $email = self::getMailerMessage();
        self::assertNull($email);
    }

    public function testSubscriptionEmailCanBeReusedAcrossScopesAndNewsletter(): void
    {
        $client = self::createClient();
        $client->disableReboot();
        $this->initDatabase(self::$kernel);

        $subscriberEmail = 'test@mail.com';
        $this->applyFixtures(
            self::$kernel,
            new KnownEmailsFixture(),
            new CallbackFixture(callback: static function (ObjectManager $manager) use ($subscriberEmail): void {
                $subscription = new NewsletterSubscription();
                $subscription->email = Email::from($subscriberEmail);
                $subscription->confirmation->state = ConfirmationStateEnum::Confirmed;
                $manager->persist($subscription);
                $manager->flush();
            }),
        );

        foreach (['/events/123', '/events/456'] as $resourceScope) {
            $client->request(
                Request::METHOD_POST,
                '/api/notifications',
                server: ['CONTENT_TYPE' => 'application/json'],
                content: json_encode([
                    'resourceScope' => $resourceScope,
                    'email' => $subscriberEmail,
                ], flags: JSON_THROW_ON_ERROR),
            );

            $this->assertResponseStatusCodeSame(201);
        }

        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);
        self::assertCount(
            2,
            $registry->getRepository(NotificationSubscription::class)->findBy(['email' => $subscriberEmail]),
        );
        self::assertCount(
            1,
            $registry->getRepository(NewsletterSubscription::class)->findBy(['email' => $subscriberEmail]),
        );
    }

    public function testAlreadySubscribedErrorSampleEndpoint(): void
    {
        $client = self::createClient();

        $client->request(Request::METHOD_GET, '/api/problems/already_subscribed_errors.json');

        $this->assertResponseStatusCodeSame(409);

        /** @var array{status:int, type:string, title:string, detail:string} $response */
        $response = json_decode((string) $client->getResponse()->getContent(), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame(409, $response['status']);
        $this->assertSame('Already subscribed', $response['title']);
        $this->assertSame('User with this email is already subscribed to this resource scope.', $response['detail']);
        $this->assertSame('urn:jazzfreunde-ingolstadt-error:already-subscribed', $response['type']);
    }
}
