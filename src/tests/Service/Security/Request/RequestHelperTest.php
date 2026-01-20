<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Security\EntryPoint;

use PHPUnit\Framework\TestCase;
use Jazzfreunde\App\Service\Security\Request\RequestHelper;
use Jazzfreunde\App\Type\Primitive\Email;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;

/**
 * Tests for the RequestHelper class.
 */
final class RequestHelperTest extends TestCase
{
    /**
     * Test that redirectToOrigin uses the Referer header if present.
     */
    #[Test]
    public function redirectToOriginUsesRefererHeader()
    {
        $request = new Request();
        $request->headers->set('referer', 'https://example.com/origin');
        $default = 'https://example.com/default';

        $response = RequestHelper::redirectToOrigin($request, $default);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('https://example.com/origin', $response->getTargetUrl());
    }

    /**
     * Test that redirectToOrigin uses the default URL if no Referer header is present.
     */
    #[Test]
    public function redirectToOriginUsesDefaultIfNoReferer()
    {
        $request = new Request();
        $default = 'https://example.com/default';

        $response = RequestHelper::redirectToOrigin($request, $default);

        $this->assertEquals($default, $response->getTargetUrl());
    }

    /**
     * Test that redirectToOrigin appends the anchor if provided.
     */
    #[Test]
    public function redirectToOriginAppendsAnchor()
    {
        $request = new Request();
        $default = 'https://example.com/default';
        $anchor = 'section1';

        $response = RequestHelper::redirectToOrigin($request, $default, $anchor);

        $this->assertEquals($default.'#'.$anchor, $response->getTargetUrl());
    }

    /**
     * Test that getUserEmailFromPost returns an Email instance for a valid email.
     */
    #[Test]
    public function getUserEmailFromPostReturnsEmailInstance()
    {
        $request = new Request([], ['email' => 'user@example.com']);
        // Assuming Email::tryFrom returns Email instance for valid email
        $email = RequestHelper::getUserEmailFromPost($request);

        $this->assertInstanceOf(Email::class, $email);
        $this->assertEquals('user@example.com', (string) $email);
    }

    /**
     * Test that getUserEmailFromPost returns null if the email is missing.
     */
    #[Test]
    public function getUserEmailFromPostReturnsNullIfEmailMissing()
    {
        $request = new Request([], []);
        $email = RequestHelper::getUserEmailFromPost($request);

        $this->assertNull($email);
    }

    /**
     * Test that getUserEmailFromPost throws an exception for an invalid email.
     */
    #[Test]
    public function getUserEmailFromPostThrowsOnInvalidEmail()
    {
        $this->expectException(InvalidArgumentException::class);

        $request = new Request([], ['email' => 'not-an-email']);
        RequestHelper::getUserEmailFromPost($request);
    }

    /**
     * Test that getRedirectUri uses the Referer header if present.
     */
    #[Test]
    public function getRedirectUriUsesReferer()
    {
        $request = new Request();
        $request->headers->set('referer', 'https://example.com/prev');
        $uri = RequestHelper::getRedirectUri($request, 'https://example.com/fallback');

        $this->assertEquals('https://example.com/prev', $uri);
    }

    /**
     * Test that getRedirectUri uses the default URI if no Referer header is present.
     */
    #[Test]
    public function getRedirectUriUsesDefaultIfNoReferer()
    {
        $request = new Request();
        $uri = RequestHelper::getRedirectUri($request, 'https://example.com/fallback');

        $this->assertEquals('https://example.com/fallback', $uri);
    }

    /**
     * Test that getRedirectUri uses the request URI if neither Referer nor default is present.
     */
    #[Test]
    public function getRedirectUriUsesRequestUriIfNoRefererOrDefault()
    {
        $request = new Request([], [], [], [], [], ['REQUEST_URI' => '/current']);
        $uri = RequestHelper::getRedirectUri($request, null);

        $this->assertEquals('/current', $uri);
    }
}
