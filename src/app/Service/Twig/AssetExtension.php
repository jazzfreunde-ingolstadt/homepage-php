<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Twig;

use RuntimeException;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Erweitert die Integration von Assets in Twig Templates
 * @psalm-suppress UnusedClass
 */
class AssetExtension extends AbstractExtension
{
    /**
     * Dependency Injection
     *
     * @param string $publicDir
     */
    public function __construct(private string $publicDir)
    {
    }

    /**
     * @inheritDoc
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('random_image', $this->getRandomImage(...)),
        ];
    }

    /**
     * Gibt ein zufälliges Bild zurück
     *
     * @param string $directory Ablageort der Bilder
     * @return string URL zur Datei im Public-Verzeichnis
     */
    public function getRandomImage(string $directory): string
    {
        $lookup = trim($directory, '/');
        $finder = new Finder();

        try {
            $finder->files()->in("{$this->publicDir}/{$lookup}")->name(['*.png', '*.jpg']);
            $images = iterator_to_array($finder->getIterator(), false);

            if (!$finder->hasResults()) {
                return '';
            }

            $rndImage = fn(): SplFileInfo  => $images[random_int(0, $finder->count() - 1)] ?? throw new RuntimeException();

            return "{$lookup}/{$rndImage()->getRelativePathname()}";
        } catch (\Throwable) {
            return '';
        }
    }
}
