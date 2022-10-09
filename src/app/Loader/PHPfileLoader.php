<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Loader;

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
    public function load($resource, string $type = null)
    {
        return $this->locator->locate($resource);
    }

    /**
     * Wird die Resource vom Loader unterstützt
     *
     * @param mixed       $resource
     * @param string|null $type
     *
     * @return bool
     */
    public function supports($resource, string $type = null)
    {
        return is_string($resource) && 'php' === pathinfo(
            $resource,
            PATHINFO_EXTENSION
        );
    }
}
