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
     * @param string      $resource
     * @param string|null $type
     *
     * @return void
     */
    public function load($resource, ?string $type = null)
    {
        require_once $this->locator->locate($resource);
    }

    /**
     * Wird die Resource vom Loader unterstützt
     *
     * @param string      $resource
     * @param string|null $type
     *
     * @return void
     */
    public function supports($resource, ?string $type = null)
    {
        return is_string($resource) && 'php' === pathinfo(
            $resource,
            PATHINFO_EXTENSION
        );
    }
}
