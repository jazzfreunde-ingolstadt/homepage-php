<?php

declare(strict_types=1);

namespace JazzfreundeTests\Api\Tests\Service\Security\EntryPoint;

use InvalidArgumentException;
use Jazzfreunde\Api\Service\Security\Request\RequestHelper;
use Jazzfreunde\Api\Type\Primitive\Email;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tests for the RequestHelper class.
 *
 * @internal
 *
 * @coversNothing
 */
final class RequestHelperTest extends TestCase
{
    /**
     * Test that redirectToOrigin uses the Referer header if present.
     */
    #[Test]
    public function redirectToOriginUsesRefererHeader(): void
    {
        $request = new Request();
        $request->headers->set('referer', 'https://example.com/origin');
        $default = 'https://example.com/default';

        $response = RequestHelper::redirectToOrigin($request, $default);

        $this->assertEquals('https://example.com/origin', $response->getTargetUrl());
    }

    /**
     * Test that redirectToOrigin uses the default URL if no Referer header is present.
     */
    #[Test]
    public function redirectToOriginUsesDefaultIfNoReferer(): void
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
    public function redirectToOriginAppendsAnchor(): void
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
    public function getUserEmailFromPostReturnsEmailInstance(): void
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
    public function getUserEmailFromPostReturnsNullIfEmailMissing(): void
    {
        $request = new Request([], []);
        $email = RequestHelper::getUserEmailFromPost($request);

        $this->assertNull($email);
    }

    /**
     * Test that getUserEmailFromPost throws an exception for an invalid email.
     */
    #[Test]
    public function getUserEmailFromPostThrowsOnInvalidEmail(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $request = new Request([], ['email' => 'not-an-email']);
        RequestHelper::getUserEmailFromPost($request);
    }

    /**
     * Test that getRedirectUri uses the Referer header if present.
     */
    #[Test]
    public function getRedirectUriUsesReferer(): void
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
    public function getRedirectUriUsesDefaultIfNoReferer(): void
    {
        $request = new Request();
        $uri = RequestHelper::getRedirectUri($request, 'https://example.com/fallback');

        $this->assertEquals('https://example.com/fallback', $uri);
    }

    /**
     * Test that getRedirectUri uses the request URI if neither Referer nor default is present.
     */
    #[Test]
    public function getRedirectUriUsesRequestUriIfNoRefererOrDefault(): void
    {
        $request = new Request([], [], [], [], [], ['REQUEST_URI' => '/current']);
        $uri = RequestHelper::getRedirectUri($request, null);

        $this->assertEquals('/current', $uri);
    }
}
