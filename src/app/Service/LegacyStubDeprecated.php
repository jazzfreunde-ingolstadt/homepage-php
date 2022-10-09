<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service;

use InvalidArgumentException;
use Jazzfreunde\Config\Loader\PHPfileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

/**
 * Stellt eine Brücke zum Legacy Content her.
 *
 * Darüber kann zum Beispiel der alte HTML Code geladen werden.
 */
final class LegacyStubDeprecated
{
    private array $lookupDirectories;

    /**
     * Undocumented function
     *
     * @param string ...$srcDirs
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string ...$srcDirs)
    {
        $this->lookupDirectories = $srcDirs;
        array_walk(
            $srcDirs,
            function (string &$path, string|int $sourceName) {
                if (!is_dir($path)) {
                    throw new InvalidArgumentException("Das angegebene Quellverzeichnis '$path' existiert nicht.");
                }
                $path = realpath($path);
            }
        );
    }

    /**
     * Include einer php-Datei aus einem der Quellverzeichnisse
     *
     * @param string $filePath
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public function include(string $filePath): void
    {
        $fileLocator = new FileLocator($this->lookupDirectories);
        $loaderResolver = new LoaderResolver([new PHPfileLoader($fileLocator)]);
        $delegatingLoader = new DelegatingLoader($loaderResolver);
        $delegatingLoader->load($filePath);
    }
}
