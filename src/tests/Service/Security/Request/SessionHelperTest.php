<?php declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Service\Security\Request;

use PHPUnit\Framework\TestCase;
use Jazzfreunde\App\Service\Security\Request\SessionHelper;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use PHPUnit\Framework\Attributes\Test;

/**
 * Tests for the SessionHelper class.
 */
final class SessionHelperTest extends TestCase
{
    use MockingTrait;

    /**
     * Test getRedirectUri returns the URI if present and valid.
     */
    #[Test]
    public function getRedirectUriReturnsUriIfPresent()
    {
        $session = $this->mock(SessionInterface::class);
        $session->method('get')->with('redirect_uri')->willReturn('https://example.com/redirect');

        $uri = SessionHelper::getRedirectUri($session);

        $this->assertEquals('https://example.com/redirect', $uri);
    }

    /**
     * Test getRedirectUri returns null if not present.
     */
    #[Test]
    public function getRedirectUriReturnsNullIfNotPresent()
    {
        $session = $this->mock(SessionInterface::class);
        $session->method('get')->with('redirect_uri')->willReturn(null);

        $uri = SessionHelper::getRedirectUri($session);

        $this->assertNull($uri);
    }

    /**
     * Test getRedirectUri returns null if value is not a string.
     */
    #[Test]
    public function getRedirectUriReturnsNullIfNotString()
    {
        $session = $this->mock(SessionInterface::class);
        $session->method('get')->with('redirect_uri')->willReturn(['not', 'a', 'string']);

        $uri = SessionHelper::getRedirectUri($session);

        $this->assertNull($uri);
    }

    /**
     * Test setRedirectUri sets the value in the session.
     */
    #[Test]
    public function setRedirectUriSetsValue()
    {
        $session = $this->mock(SessionInterface::class);
        $session->expects($this->once())
            ->method('set')
            ->with('redirect_uri', 'https://example.com/redirect');

        SessionHelper::setRedirectUri($session, 'https://example.com/redirect');
    }

    /**
     * Test clearRedirectUri removes the value from the session.
     */
    #[Test]
    public function clearRedirectUriRemovesValue()
    {
        $session = $this->mock(SessionInterface::class);
        $session->expects($this->once())
            ->method('remove')
            ->with('redirect_uri');

        SessionHelper::clearRedirectUri($session);
    }

    /**
     * Test getUserEmail returns Email instance if present and valid.
     */
    #[Test]
    public function getUserEmailReturnsEmailIfPresent()
    {
        $session = $this->mock(SessionInterface::class);
        $session->method('get')->with('user_email')->willReturn('user@example.com');

        $email = SessionHelper::getUserEmail($session);

        $this->assertInstanceOf(Email::class, $email);
        $this->assertEquals('user@example.com', (string) $email);
    }

    /**
     * Test getUserEmail returns null if not present.
     */
    #[Test]
    public function getUserEmailReturnsNullIfNotPresent()
    {
        $session = $this->mock(SessionInterface::class);
        $session->method('get')->with('user_email')->willReturn(null);

        $email = SessionHelper::getUserEmail($session);

        $this->assertNull($email);
    }

    /**
     * Test getUserEmail returns null if value is not a string.
     */
    #[Test]
    public function getUserEmailReturnsNullIfNotString()
    {
        $session = $this->mock(SessionInterface::class);
        $session->method('get')->with('user_email')->willReturn(['not', 'a', 'string']);

        $email = SessionHelper::getUserEmail($session);

        $this->assertNull($email);
    }

    /**
     * Test setUserEmail sets the value in the session.
     */
    #[Test]
    public function setUserEmailSetsValue()
    {
        $session = $this->mock(SessionInterface::class);
        $email = new Email('user@example.com');

        $session->expects($this->once())
            ->method('set')
            ->with('user_email', 'user@example.com');

        SessionHelper::setUserEmail($session, $email);
    }
}
