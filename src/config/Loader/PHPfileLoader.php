<?php

declare(strict_types=1);

namespace Jazzfreunde\Config\Loader;

use Symfony\Component\Config\Loader\FileLoader;

/**
 * Include einer php-Datei aus einem der Quellverzeichnisse
 */
final class PHPfileLoader extends FileLoader
{
    /**
     * Include einer php-Datei aus einem der Quellverzeichnisse
     *
     * @param mixed       $resource
     * @param string|null $type
     *
     * @return mixed
     */
    public function load(mixed $resource, ?string $type = null)
    {
        require_once $this->locator->locate($resource);

        return null;
    }

    /**
     * Wird die Resource vom Loader unterstützt
     *
     * @param mixed       $resource
     * @param string|null $type
     *
     * @return bool
     */
    public function supports(mixed $resource, ?string $type = null)
    {
        return is_string($resource) && 'php' === pathinfo(
            $resource,
            PATHINFO_EXTENSION
        );
    }
}
