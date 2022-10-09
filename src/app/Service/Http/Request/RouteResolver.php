<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Http\Request;

use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Routing Service
 */
final class RouteResolver implements RouteInterface
{
    /**
     * @param UrlGeneratorInterface $router
     */
    public function __construct(private UrlGeneratorInterface $router)
    {
    }

    /**
     * @inheritDoc
     */
    public function generate(string $resource, array $parameter = []): string
    {
        try {
            $url = $this->router->generate($resource, $parameter);
        } catch (RouteNotFoundException $e) {
            throw $e;
        }
            
        return $url;
    }
}
