<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Http\Request;

/**
 * Interface für Frontend Routen
 */
interface RouteInterface
{
    /**
     * Generiert eine URL zur angeforderten Resource.
     *
     * @param string $resource
     * @param array $parameter
     * @return string Route
     * @throws \Symfony\Component\Routing\Exception\RouteNotFoundException
     */
    public function generate(string $resource, array $parameter = []): string;
}
