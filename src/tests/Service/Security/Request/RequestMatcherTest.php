<?php declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Service\Security\Request;

use Jazzfreunde\App\Service\Security\Request\RequestMatcher;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use Reflector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

/**
 * Tests for the RequestMatcher class.
 */
final class RequestMatcherTest extends TestCase
{
    use MockingTrait;

    /**
     * Test that the RequestMatcher can be created with valid parameters.
     */
    public function testCreateRequestMatcher()
    {
        $controllerResolver = $this->mock(ControllerResolverInterface::class);
        $firewallName = 'test_firewall';

        $matcher = RequestMatcher::create($controllerResolver, $firewallName);

        $this->assertInstanceOf(RequestMatcher::class, $matcher);
    }

    /**
     * Test that matches returns true if requested route has entry point attribute with matching name.
     */
    public function testMatchesReturnsTrueForMatchingEntryPoint()
    {
        $reflectionMethod = $this->mock(ReflectionMethod::class);

        $uut = new UnitUnderTest(RequestMatcher::class);
        $uut->mock(ControllerResolverInterface::class)
            ->method('getControllerReflector')
            ->willReturn($reflectionMethod);

        $firewallName = 'test_firewall';

        $request = $this->mock(Request::class);
        $uut->target()->matches($request);
    }
}
