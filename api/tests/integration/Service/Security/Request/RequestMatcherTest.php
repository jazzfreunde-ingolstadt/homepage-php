<?php

declare(strict_types=1);
// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

namespace JazzfreundeTests\Api\Tests\Service\Security\Request;

use Jazzfreunde\Api\Service\Security\Attribute\FirewallEntryPoint;
use Jazzfreunde\Api\Service\Security\Request\RequestMatcher;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

/**
 * Dummy controller for testing RequestMatcher.
 */
#[FirewallEntryPoint('test_firewall')]
class DummyController
{
    /**
     * Dummy method to simulate a controller action.
     *
     * @return Response
     */
    public function handle(): Response
    {
        return new Response('Hello World');
    }
}

/**
 * Tests for the RequestMatcher class.
 *
 * @internal
 *
 * @coversNothing
 */
final class RequestMatcherTest extends TestCase
{
    /**
     * Test that the RequestMatcher can be created with valid parameters.
     */
    #[Test]
    public function createRequestMatcher(): void
    {
        $controllerResolver = $this->createMock(ControllerResolverInterface::class);
        $controllerResolver
            ->expects($this->once())
            ->method('getController')
            ->willReturn(false);
        $firewallName = 'test_firewall';

        $matcher = RequestMatcher::create($controllerResolver, $firewallName);

        $this->assertFalse($matcher->matches(new Request()));
    }

    /**
     * Test that matches returns true if requested route has entry point attribute with matching name.
     */
    #[Test]
    public function matchesReturnsTrueForMatchingEntryPoint(): void
    {
        $controller = #[FirewallEntryPoint('test_firewall')] fn () => new Response('Hello World');
        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getController')
            ->willReturn($controller);
        $uut->configure('firewallName', 'test_firewall');

        $request = $this->createMock(Request::class);
        $request
            ->expects($this->never())
            ->method($this->anything());

        $matches = $uut->target()->matches($request);
        $this->assertTrue($matches);
    }

    /**
     * Test that matches returns false if requested route has entry point attribute with different name.
     */
    #[Test]
    public function matchesReturnsFalseForNonMatchingEntryPoint(): void
    {
        $controller = #[FirewallEntryPoint('test_firewall')] fn () => new Response('Hello World');
        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getController')
            ->willReturn($controller);
        $uut->configure('firewallName', 'different_firewall');

        $request = $this->createMock(Request::class);
        $request
            ->expects($this->never())
            ->method($this->anything());

        $matches = $uut->target()->matches($request);
        $this->assertFalse($matches);
    }

    /**
     * Test that matches returns false if no entry point attribute is present.
     */
    #[Test]
    public function matchesReturnsFalseForNoEntryPoint(): void
    {
        $controller = fn () => new Response('Hello World');

        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getController')
            ->willReturn($controller);
        $uut->configure('firewallName', 'different_firewall');

        $request = $this->createMock(Request::class);
        $request
            ->expects($this->never())
            ->method($this->anything());

        $matches = $uut->target()->matches($request);
        $this->assertFalse($matches);
    }

    /**
     * Test that  matches returns true if entrypoint attribute is present on class level.
     */
    #[Test]
    public function matchesReturnsTrueForClassLevelEntryPoint(): void
    {
        $controller = new DummyController();
        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getController')
            ->willReturn([$controller, 'handle']);
        $uut->configure('firewallName', 'test_firewall');

        $request = $this->createMock(Request::class);
        $request
            ->expects($this->never())
            ->method($this->anything());

        $matches = $uut->target()->matches($request);
        $this->assertTrue($matches);
    }
}
