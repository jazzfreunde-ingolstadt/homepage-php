<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\Request;

use Jazzfreunde\App\Service\Security\Attribute\FirewallEntryPoint;
use Override;
use ReflectionFunction;
use ReflectionFunctionAbstract;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

/**
 * Checks if a request matches a specific firewall name.
 */
final class RequestMatcher implements RequestMatcherInterface
{
    /**
     * @param ControllerResolverInterface $controllerResolver
     * @param string $firewallName
     */
    public function __construct(
        private readonly ControllerResolverInterface $controllerResolver,
        private readonly string $firewallName,
    ) {
    }

    /**
     * Factory method to create a new instance of RequestMatcher.
     *
     * @param ControllerResolverInterface $controllerResolver
     * @param string $firewallName
     * @return self
     * @psalm-api
     */
    public static function create(
        ControllerResolverInterface $controllerResolver,
        string $firewallName
    ): self {
        return new self(
            $controllerResolver,
            $firewallName
        );
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function matches(Request $request): bool
    {
        $controllerReflector = $this->getControllerReflector($request);
        $attributes = $this->getAttributes($controllerReflector);
        $attribute = array_pop($attributes);

        return $attribute?->getFirewallName() === $this->firewallName;
    }

    /**
     * Determine the reflection class for the controller handling the request.
     *
     * @param Request $request
     * @return ReflectionFunctionAbstract|null
     */
    public function getControllerReflector(Request $request): ?ReflectionFunctionAbstract
    {
        $controller = $this->controllerResolver->getController($request);
        if (\is_array($controller) && method_exists(...$controller)) {
            return new \ReflectionMethod(...$controller);
        } elseif (\is_string($controller) && str_contains($controller, '::')) {
            return new \ReflectionMethod(...explode('::', $controller, 2));
        } elseif ($controller instanceof \Closure) {
            return new \ReflectionFunction($controller);
        }

        return null;
    }

    /**
     * Get all FirewallEntryPoint attributes from class and method.
     *
     * @param ReflectionFunctionAbstract|null $controllerReflector
     * @return FirewallEntryPoint[]
     */
    public function getAttributes(?ReflectionFunctionAbstract $controllerReflector): array
    {
        $class = null;
        if ($controllerReflector instanceof \ReflectionMethod) {
            $class = $controllerReflector->getDeclaringClass();
        } elseif ($controllerReflector instanceof ReflectionFunction && $controllerReflector->isAnonymous()) {
            $class = $controllerReflector->getClosureCalledClass();
        }

        $attributes = array_merge(
            $class?->getAttributes(FirewallEntryPoint::class) ?? [],
            $controllerReflector?->getAttributes(FirewallEntryPoint::class) ?? []
        );

        return array_map(
            static fn($attribute) => $attribute->newInstance(),
            $attributes
        );
    }
}
