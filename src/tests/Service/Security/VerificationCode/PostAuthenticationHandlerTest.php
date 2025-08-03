<?php declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Service\Security\VerificationCode;

use Jazzfreunde\App\Service\Security\VerificationCode\PostAuthenticationHandler;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use PHPUnit\Framework\MockObject\MockObject;
use Jazzfreunde\UnitTest\UnitUnderTest;
use LogicException;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\HttpUtils;

/**
 * Tests for the PostAuthenticationHandler.
 * This class handles post-authentication actions such as redirecting users
 * after successful or failed authentication.
 */
final class PostAuthenticationHandlerTest extends \PHPUnit\Framework\TestCase
{
    use MockingTrait;

    /**
     * Tests that onAuthenticationSuccess redirects to the correct URI.
     */
    #[Test]
    public function onAuthenticationSuccessRedirectsToOrigin(): void
    {
        $session = $this->mock(SessionInterface::class);
        $session->method('get')->with('redirect_uri')->willReturn('https://example.com/redirect');
        
        $uut = new UnitUnderTest(PostAuthenticationHandler::class);
        $uut->mock(HttpUtils::class)
            ->expects($this->once())
            ->method('createRedirectResponse')
            ->willReturnCallback(function (Request $_, string $url) {
                $this->assertEquals('https://example.com/redirect', $url, 'Redirect URL should match session value');
                return new RedirectResponse($url);
            });

        $request = new Request([], [], [], [], [], ['REQUEST_URI' => '/current']);
        $request->setSession($session);
        $token = $this->mock(TokenInterface::class);

        $response = $uut->target()->onAuthenticationSuccess($request, $token);

        $this->assertNotNull($response, 'Response should not be null');
        $this->assertInstanceOf(RedirectResponse::class, $response, 'Response should be a RedirectResponse');
    }

    /**
     * Tests that onAuthenticationFailure redirects to the verification form.
     */
    #[Test]
    public function onAuthenticationFailureRedirectsToVerificationForm(): void
    {
        $session = $this->mock(FlashBagAwareSessionInterface::class);
        $session->method('get')->with('redirect_uri')->willReturn('/verification/form');
        
        $uut = new UnitUnderTest(PostAuthenticationHandler::class);
        $uut->mock(UrlGeneratorInterface::class)
            ->method('generate')
            ->with('security_code_verification')
            ->willReturn('/verification/form');
        $uut->mock(HttpUtils::class)
            ->expects($this->once())
            ->method('createRedirectResponse')
            ->willReturnCallback(function (Request $_, string $url, int $status) {
                $this->assertEquals('/verification/form', $url, 'Redirect URL should match session value');
                $this->assertEquals(307, $status, 'Redirect status should be 307 to redirect to POST endpoint');
                return new RedirectResponse($url);
            });

        $request = new Request([], [], [], [], [], ['REQUEST_URI' => '/current']);
        $request->setSession($session);
        $authenticationException = new AuthenticationException('Authentication failed');
        $authenticationException->setToken($this->mock(TokenInterface::class));

        $response = $uut->target()->onAuthenticationFailure($request, $authenticationException);

        $this->assertNotNull($response, 'Response should not be null');
        $this->assertInstanceOf(RedirectResponse::class, $response, 'Response should be a RedirectResponse');
    }

    /**
     * Tests that an exception is thrown if the session is not found during failure handling.
     */
    #[Test]
    public function onAuthenticationFailureThrowsExceptionIfSessionNotFound(): void
    {
        $uut = new UnitUnderTest(PostAuthenticationHandler::class);
        $request = new Request();
        $authenticationException = new AuthenticationException('Authentication failed');
        $authenticationException->setToken($this->mock(TokenInterface::class));

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('You cannot use the flash messages if there is no active session.');

        $uut->target()->onAuthenticationFailure($request, $authenticationException);
    }

    /**
     * Tests that an exception is thrown if the session does not implement FlashBagAwareSessionInterface.
     */
    #[Test]
    public function onAuthenticationFailureThrowsExceptionIfSessionNotFlashBagAware(): void
    {
        $session = $this->mock(SessionInterface::class);
        $uut = new UnitUnderTest(PostAuthenticationHandler::class);
        $request = new Request(server: ['REQUEST_URI' => '/current']);
        $request->setSession($session);
        $authenticationException = new AuthenticationException('Authentication failed');
        $authenticationException->setToken($this->mock(TokenInterface::class));

        $this->expectException(LogicException::class);

        $uut->target()->onAuthenticationFailure($request, $authenticationException);
    }
}
