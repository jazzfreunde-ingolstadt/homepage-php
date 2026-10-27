<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Newsletter;

use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Service\Email\DnsRecordLookupInterface;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\UnitTest\Fixtures\KnownEmailsFixture;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Functional coverage for the newsletter subscription lifecycle.
 *
 * @internal
 *
 * @coversNothing
 */
final class NewsletterSubscriptionLifecycleTest extends WebTestCase
{
    use SetupDatabaseTrait;

    private const string NEWSLETTER_EMAIL = 'newsletter-subscriber@example.test';

    private KernelBrowser $client;

    private ManagerRegistry $registry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = self::createClient();
        $this->client->disableReboot();
        $dnsRecordLookup = self::createStub(DnsRecordLookupInterface::class);
        $dnsRecordLookup->method('lookup')
            ->willReturnCallback(
                static fn (string $domain, int $type): array|false => DNS_MX === $type
                    ? [['target' => 'mail.example.test', 'pri' => 10]]
                    : [],
            );
        self::getContainer()->set(DnsRecordLookupInterface::class, $dnsRecordLookup);

        $this->initDatabase(self::$kernel);
        $this->applyFixtures(self::$kernel, new KnownEmailsFixture());

        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);
        $this->registry = $registry;

        /** @var CacheItemPoolInterface $rateLimiterCache */
        $rateLimiterCache = self::getContainer()->get('cache.rate_limiter');
        $rateLimiterCache->clear();
    }

    public function testNewsletterSubscriptionLifecycle(): void
    {
        $token = $this->requestNewsletterSubscription();
        $this->confirmNewsletterSubscription($token);
        $this->cancelNewsletterSubscription($token);
    }

    public function testHoneypotSubmissionDoesNotSendEmailOrCreateSubscription(): void
    {
        $crawler = $this->client->request(Request::METHOD_GET, '/');
        $form = $crawler->selectButton('Benachrichtige mich')->form();
        $form['newsletter_subscription[email]'] = self::NEWSLETTER_EMAIL;
        $form['newsletter_subscription[website]'] = 'https://spam.example';

        $this->client->submit($form);

        $this->assertResponseRedirects('/newsletter/newsletter_subscription_received/');
        self::assertEmailCount(0);
        self::assertNull(
            $this->registry->getRepository(NewsletterSubscription::class)
                ->findOneBy(['email' => self::NEWSLETTER_EMAIL])
        );
    }

    public function testNewsletterSubscriptionIsRateLimitedByEmail(): void
    {
        for ($attempt = 0; $attempt < 3; ++$attempt) {
            $this->submitNewsletterSubscription(self::NEWSLETTER_EMAIL);
            $this->assertResponseRedirects('/newsletter/newsletter_subscription_received/');
        }

        $confirmationToken = $this->findSubscription()->confirmation->token->value();
        $this->submitNewsletterSubscription(self::NEWSLETTER_EMAIL);

        $this->assertResponseStatusCodeSame(Response::HTTP_TOO_MANY_REQUESTS);
        self::assertGreaterThan(0, (int) $this->client->getResponse()->headers->get('Retry-After'));
        self::assertSame(
            $confirmationToken,
            $this->findSubscription()->confirmation->token->value(),
        );
    }

    public function testNewsletterSubscriptionIsRateLimitedByIp(): void
    {
        for ($attempt = 0; $attempt < 5; ++$attempt) {
            $this->submitNewsletterSubscription(sprintf('ip-limit-%d@example.test', $attempt));
            $this->assertResponseRedirects('/newsletter/newsletter_subscription_received/');
        }

        $this->submitNewsletterSubscription('ip-limit-final@example.test');

        $this->assertResponseStatusCodeSame(Response::HTTP_TOO_MANY_REQUESTS);
        self::assertGreaterThan(0, (int) $this->client->getResponse()->headers->get('Retry-After'));
        self::assertNull(
            $this->registry->getRepository(NewsletterSubscription::class)
                ->findOneBy(['email' => 'ip-limit-final@example.test'])
        );
    }

    private function requestNewsletterSubscription(): string
    {
        $crawler = $this->client->request(Request::METHOD_GET, '/');
        $form = $crawler->selectButton('Benachrichtige mich')->form();
        $form['newsletter_subscription[email]'] = self::NEWSLETTER_EMAIL;
        $this->client->submit($form);

        $this->assertResponseRedirects('/newsletter/newsletter_subscription_received/');
        self::assertEmailCount(1);
        $confirmationEmail = self::getMailerMessage(0);
        self::assertNotNull($confirmationEmail);
        self::assertEmailSubjectContains($confirmationEmail, 'Bestätigen Sie Ihre Newsletter Anmeldung');
        self::assertInstanceOf(TemplatedEmail::class, $confirmationEmail);

        $this->client->followRedirect();
        $this->assertSelectorTextContains('body', 'Anfrage erhalten!');

        $subscription = $this->findSubscription();
        self::assertSame(ConfirmationStateEnum::Pending, $subscription->confirmation->state);

        return $subscription->confirmation->token->value();
    }

    private function submitNewsletterSubscription(string $email): void
    {
        $crawler = $this->client->request(Request::METHOD_GET, '/');
        $form = $crawler->selectButton('Benachrichtige mich')->form();
        $form['newsletter_subscription[email]'] = $email;
        $this->client->submit($form);
    }

    private function confirmNewsletterSubscription(string $token): void
    {
        $this->client->request(Request::METHOD_GET, '/newsletter/newsletter_confirm/'.$token);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Anmeldung bestätigt!');
        self::assertSame(ConfirmationStateEnum::Confirmed, $this->findSubscription()->confirmation->state);
        self::assertEmailCount(1);

        $newSubscriberNotice = self::getMailerMessage(0);
        self::assertNotNull($newSubscriberNotice);
        self::assertEmailSubjectContains($newSubscriberNotice, 'Neuer Newsletter Abonnent!');
        self::assertEmailAddressContains($newSubscriberNotice, 'to', 'jazzletter@example.com');
        self::assertEmailHtmlBodyContains($newSubscriberNotice, self::NEWSLETTER_EMAIL);
    }

    private function cancelNewsletterSubscription(string $token): void
    {
        $this->client->request(Request::METHOD_GET, '/newsletter/newsletter_cancel/'.$token);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Newsletter gekündigt!');
        self::assertSame(ConfirmationStateEnum::Cancelled, $this->findSubscription()->confirmation->state);
        self::assertEmailCount(1);

        $cancellationNotice = self::getMailerMessage(0);
        self::assertNotNull($cancellationNotice);
        self::assertEmailSubjectContains($cancellationNotice, 'Newsletter-Abmeldung');
        self::assertEmailAddressContains($cancellationNotice, 'to', 'jazzletter@example.com');
        self::assertEmailHtmlBodyContains($cancellationNotice, self::NEWSLETTER_EMAIL);
    }

    private function findSubscription(): NewsletterSubscription
    {
        /** @var null|NewsletterSubscription $subscription */
        $subscription = $this->registry
            ->getRepository(NewsletterSubscription::class)
            ->findOneBy(['email' => self::NEWSLETTER_EMAIL]);

        self::assertNotNull($subscription);

        return $subscription;
    }
}
