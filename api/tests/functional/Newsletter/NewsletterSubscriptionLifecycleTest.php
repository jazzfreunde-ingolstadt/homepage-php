<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Newsletter;

use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\UnitTest\Fixtures\KnownEmailsFixture;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

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
        $this->initDatabase(self::$kernel);
        $this->applyFixtures(self::$kernel, new KnownEmailsFixture());

        /** @var ManagerRegistry $registry */
        $registry = self::getContainer()->get(ManagerRegistry::class);
        $this->registry = $registry;
    }

    public function testNewsletterSubscriptionLifecycle(): void
    {
        $token = $this->requestNewsletterSubscription();
        $this->confirmNewsletterSubscription($token);
        $this->cancelNewsletterSubscription($token);
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

    private function confirmNewsletterSubscription(string $token): void
    {
        $this->client->request(Request::METHOD_GET, '/newsletter/newsletter_confirm/'.$token);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Anmeldung bestätigt!');
        self::assertSame(ConfirmationStateEnum::Confirmed, $this->findSubscription()->confirmation->state);
    }

    private function cancelNewsletterSubscription(string $token): void
    {
        $this->client->request(Request::METHOD_GET, '/newsletter/newsletter_cancel/'.$token);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Newsletter gekündigt!');
        self::assertSame(ConfirmationStateEnum::Cancelled, $this->findSubscription()->confirmation->state);
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
