<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service;

use Jazzfreunde\App\Loader\PHPfileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

/**
 * Stellt eine Brücke zu den Inhalten aus dem src Dir her.
 *
 * Darüber kann zum Beispiel der alte HTML Code geladen werden.
 */
final class LegacyStub
{
    private array $lookupDirectories;

    /**
     * @param string ...$srcDirs
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(string ...$srcDirs)
    {
        $this->lookupDirectories = $srcDirs;
        array_walk(
            $srcDirs,
            function (string &$path) {
                if (!is_dir($path)) {
                    throw new \InvalidArgumentException("Das angegebene Quellverzeichnis '$path' existiert nicht.");
                }
                $path = realpath($path);
            }
        );
    }

    /**
     * Include einer php-Datei aus einem der Quellverzeichnisse
     *
     * @param string $filePath
     * @param array &$localGlobals = [] lokale Globalen für die Kompatibilität zu alten Skripten.
     *
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\Config\Exception\FileLocatorFileNotFoundException
     *
     * @return void
     */
    public function include(string $filePath, array &$localGlobals = []): void
    {
        $fileLocator = new FileLocator($this->lookupDirectories);
        $loaderResolver = new LoaderResolver([new PHPfileLoader($fileLocator)]);
        $delegatingLoader = new DelegatingLoader($loaderResolver);
        try {
            $filePath = $delegatingLoader->load($filePath);
        } catch (\InvalidArgumentException | \Symfony\Component\Config\Exception\FileLocatorFileNotFoundException $e) {
            throw $e;
        }

        foreach ($localGlobals as $globalName => &$value) {
            if (!is_string($globalName)) {
                throw new \InvalidArgumentException('Kein Name für Globale definiert.');
            }
            
            $$globalName = &$value;
        }
        
        /**
         * @psalm-suppress UnresolvableInclude
         */
        require_once $filePath;
    }
}
