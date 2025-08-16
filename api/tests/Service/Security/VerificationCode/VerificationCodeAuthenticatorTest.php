<?php declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Service\Security\VerificationCode;

use Jazzfreunde\App\Exception\Security\InvalidVerificationCodeAuthenticationException;
use Jazzfreunde\App\Service\Security\VerificationCode\VerificationCodeAuthenticator;
use Jazzfreunde\App\Service\Security\VerificationCode\VerificationCodeHandlerInterface;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\InputBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\HttpUtils;

use function sprintf;

/**
 * Tests for the VerificationCodeAuthenticator.
 */
final class VerificationCodeAuthenticatorTest extends TestCase
{
    use MockingTrait;

    /**
     * Tests that the authenticator supports a request with the correct method and path.
     */
    #[Test]
    #[TestWith(['POST', 'check/route', true])]
    #[TestWith(['GET', 'check/route', false])]
    #[TestWith(['POST', 'other/route', false])]
    #[TestWith(['GET', 'other/route', false])]
    public function supportsRequest(
        string $httpMethod,
        string $checkRoute,
        bool $expectedResult
    ): void {
        $uut = new UnitUnderTest(VerificationCodeAuthenticator::class);
        $uut->configure('options', ['check_route' => 'check/route']);
        $uut->mock(HttpUtils::class)
            ->method('checkRequestPath')
            ->willReturnCallback(function (Request $_, string $route) use ($checkRoute) {
                return $route === $checkRoute;
            });

        $request = new Request(
            attributes: ['_route' => $checkRoute],
            server: ['REQUEST_METHOD' => $httpMethod]
        );

        $isSupported = $uut->target()->supports($request);
        $this->assertSame($expectedResult, $isSupported);
    }

    /**
     * Tests that onAuthenticationSuccess delegates to the success handler.
     */
    #[Test]
    public function onAuthenticationSuccessDelegatesToHandler(): void
    {
        $uut = new UnitUnderTest(VerificationCodeAuthenticator::class);
        $uut->mock(AuthenticationSuccessHandlerInterface::class)
            ->expects($this->once())
            ->method('onAuthenticationSuccess')
            ->willReturn(new Response('Success'));

        $request = new Request();
        $token = $this->mock(TokenInterface::class);

        $response = $uut->target()->onAuthenticationSuccess($request, $token, 'firewall_name');
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame('Success', $response->getContent());
    }

    /**
     * Tests that onAuthenticationFailure delegates to the failure handler.
     */
    #[Test]
    public function onAuthenticationFailureDelegatesToHandler(): void
    {
        $uut = new UnitUnderTest(VerificationCodeAuthenticator::class);
        $uut->mock(AuthenticationFailureHandlerInterface::class)
            ->expects($this->once())
            ->method('onAuthenticationFailure')
            ->willReturn(new Response('Failure'));

        $request = new Request();
        $authenticationException = new AuthenticationException('Authentication failed');
        $authenticationException->setToken($this->mock(TokenInterface::class));

        $response = $uut->target()->onAuthenticationFailure($request, $authenticationException);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame('Failure', $response->getContent());
    }

    /**
     * Tests that authenticate method handles required request input.
     */
    #[Test]
    #[TestWith(['user'])]
    #[TestWith(['hash'])]
    #[TestWith(['expires'])]
    #[TestWith(['code'])]
    public function authenticateHandlesRequiredRequestInput(
        string $paramName
    ): void {
        $request = new Request();
        $request->request = new InputBag([
            'user' => 'user@example.com',
            'hash' => 'test_hash',
            'expires' => 3600,
            'code' => '123456'
        ]);
        $request->request->remove($paramName);
        
        $uut = new UnitUnderTest(VerificationCodeAuthenticator::class);
        $this->expectException(InvalidVerificationCodeAuthenticationException::class);
        $this->expectExceptionMessage(sprintf('Missing "%s" parameter.', $paramName));

        $uut->target()->authenticate($request);
    }

    /**
     * Tests that authenticate method returns a valid Passport.
     */
    #[Test]
    public function authenticateReturnsValidPassport(): void
    {
        $request = new Request();
        $request->request = new InputBag([
            'user' => 'user@example.com',
            'hash' => 'test_hash',
            'expires' => 3600,
            'code' => '123456'
        ]);
        
        $uut = new UnitUnderTest(VerificationCodeAuthenticator::class);
        $uut->mock(VerificationCodeHandlerInterface::class)
            ->expects($this->once())
            ->method('consumeVerificationCode')
            ->with('user@example.com', 'test_hash', 3600, '123456');

        $passport = $uut->target()->authenticate($request);
        $this->assertInstanceOf(SelfValidatingPassport::class, $passport);
        $this->assertCount(1, $passport->getBadges());
        
        $userBadge = $passport->getBadge(UserBadge::class);
        $this->assertInstanceOf(UserBadge::class, $userBadge);
        $this->assertSame('user@example.com', $userBadge->getUserIdentifier());

        $userLoader = $userBadge->getUserLoader();
        $this->assertIsCallable($userLoader);
        $userLoader();
    }
}
