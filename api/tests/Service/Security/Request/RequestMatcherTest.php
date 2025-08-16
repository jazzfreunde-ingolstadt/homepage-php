<?php declare(strict_types=1);
// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

namespace JazzfreundeTests\App\Tests\Service\Security\Request;

use Jazzfreunde\App\Service\Security\Attribute\FirewallEntryPoint;
use Jazzfreunde\App\Service\Security\Request\RequestMatcher;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
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
 */
final class RequestMatcherTest extends TestCase
{
    use MockingTrait;

    /**
     * Test that the RequestMatcher can be created with valid parameters.
     */
    #[Test]
    public function createRequestMatcher()
    {
        $controllerResolver = $this->mock(ControllerResolverInterface::class);
        $firewallName = 'test_firewall';

        $matcher = RequestMatcher::create($controllerResolver, $firewallName);

        $this->assertInstanceOf(RequestMatcher::class, $matcher);
    }

    /**
     * Test that matches returns true if requested route has entry point attribute with matching name.
     */
    #[Test]
    public function matchesReturnsTrueForMatchingEntryPoint()
    {
        $controller = #[FirewallEntryPoint('test_firewall')]fn() => new Response('Hello World');

        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getController')
            ->willReturn($controller);
        $uut->configure('firewallName', 'test_firewall');
        
        $request = $this->mock(Request::class);

        $matches = $uut->target()->matches($request);
        $this->assertTrue($matches);
    }

    /**
     * Test that matches returns false if requested route has entry point attribute with different name.
     */
    #[Test]
    public function matchesReturnsFalseForNonMatchingEntryPoint()
    {
        $controller = #[FirewallEntryPoint('test_firewall')]fn() => new Response('Hello World');

        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getController')
            ->willReturn($controller);
        $uut->configure('firewallName', 'different_firewall');

        $request = $this->mock(Request::class);

        $matches = $uut->target()->matches($request);
        $this->assertFalse($matches);
    }

    /**
     * Test that matches returns false if no entry point attribute is present.
     */
    #[Test]
    public function matchesReturnsFalseForNoEntryPoint()
    {
        $controller = fn() => new Response('Hello World');

        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getController')
            ->willReturn($controller);
        $uut->configure('firewallName', 'different_firewall');

        $request = $this->mock(Request::class);

        $matches = $uut->target()->matches($request);
        $this->assertFalse($matches);
    }

    /**
     * Test that  matches returns true if entrypoint attribute is present on class level.
     */
    #[Test]
    public function matchesReturnsTrueForClassLevelEntryPoint()
    {
        $controller = new DummyController();
        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getController')
            ->willReturn([$controller, 'handle']);
        $uut->configure('firewallName', 'test_firewall');
        
        $request = $this->mock(Request::class);

        $matches = $uut->target()->matches($request);
        $this->assertTrue($matches);
    }
}
