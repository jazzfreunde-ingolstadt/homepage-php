<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Security\EntryPoint;

use Jazzfreunde\App\Service\Security\EntryPoint\AuthenticationEntryPoint;
use PHPUnit\Framework\TestCase;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\SecurityBundle\Security\FirewallConfig;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Tests for the authentication entry point.
 */
final class AuthenticationEntryPointTest extends TestCase
{
    use MockingTrait;

    /**
     * Test the start method with a valid firewall name.
     */
    #[Test]
    #[TestWith(['main', 'security_link_login'])]
    #[TestWith(['low_trust', 'security_code_login'])]
    public function startWithValidFirewallName(
        string $firewallName,
        string $expectedRouteName
    ): void {
        
        $uut = new UnitUnderTest(AuthenticationEntryPoint::class);
        $uut->mock(UrlGeneratorInterface::class)
            ->expects($this->once())
            ->method('generate')
            ->with($this->equalTo($expectedRouteName))
            ->willReturn('http://example.com/'.$expectedRouteName);

        $uut->mock(Security::class)
            ->expects($this->once())
            ->method('getFirewallConfig')
            ->with($this->isInstanceOf(Request::class))
            ->willReturn(new FirewallConfig(
                name: $firewallName,
                userChecker: 'user_checker',
                securityEnabled: true,
                stateless: false,
                authenticators: [],
            ));

        $session = $this->mock(Session::class);
        $request = new Request();
        $request->setSession($session);

        $response = $uut->target()
                        ->start($request);

        $this->assertEquals('http://example.com/'.$expectedRouteName, $response->getTargetUrl());
    }

    /**
     * Test the start method with no firewall configuration.
     */
    #[Test]
    public function noFirewallConfigThrows(): void
    {
        $uut = new UnitUnderTest(AuthenticationEntryPoint::class);
        $uut->mock(Security::class)
            ->expects($this->once())
            ->method('getFirewallConfig')
            ->with($this->isInstanceOf(Request::class))
            ->willReturn(null);

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Unable to load firewall for the request.');

        $request = new Request();
        $uut->target()->start($request);
    }

    /**
     * Test the start method with an unknown firewall name.
     */
    #[Test]
    public function unknownFirewallNameThrows(): void
    {
        $uut = new UnitUnderTest(AuthenticationEntryPoint::class);
        $uut->mock(Security::class)
            ->expects($this->once())
            ->method('getFirewallConfig')
            ->with($this->isInstanceOf(Request::class))
            ->willReturn(new FirewallConfig(
                name: 'unknown_firewall',
                userChecker: 'user_checker',
                securityEnabled: true,
                stateless: false,
                authenticators: [],
            ));

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage("Unknown firewall name: 'unknown_firewall'");

        $request = new Request();
        $uut->target()->start($request);
    }

    /**
     * Test the retrieval of the redirect URI from the request.
     */
    #[Test]
    public function retrieveRedirectUri(): void
    {
        $uut = new UnitUnderTest(AuthenticationEntryPoint::class);
        $uut->mock(UrlGeneratorInterface::class)
            ->method('generate')
            ->willReturn('http://example.com/security_link_login');

        $uut->mock(Security::class)
            ->method('getFirewallConfig')
            ->willReturn(new FirewallConfig(
                name: 'main',
                userChecker: 'user_checker',
                securityEnabled: true,
                stateless: false,
                authenticators: [],
            ));

        $session = $this->mock(Session::class);
        $session->expects($this->once())
            ->method('set')
            ->with('redirect_uri', 'http://example.com/referrer');
        $request = new Request();
        $request->headers->set('Referer', 'http://example.com/referrer');
        $request->setSession($session);

        $uut->target()
            ->start($request);
    }
}
