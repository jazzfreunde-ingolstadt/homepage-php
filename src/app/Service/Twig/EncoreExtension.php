<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Twig;

use Override;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Erweitert die Integration von Encore in Twig Templates
 * @psalm-api
 */
final class EncoreExtension extends AbstractExtension
{
    /**
     * Dependency Injection
     *
     * @param EntrypointLookupInterface $lookup
     * @param string $publicDir
     */
    public function __construct(private EntrypointLookupInterface $lookup, private string $publicDir)
    {
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('encore_entry_css_source', $this->getEncoreEntryCssSource(...)),
        ];
    }

    /**
     * Gibt generierte Encore CSS-Datei zur Laufzeit
     *
     * @param string $entryName
     * @return string
     * @throws \RuntimeException
     */
    public function getEncoreEntryCssSource(string $entryName): string
    {
        $entrypoints = $this
            ->lookup
            ->getCssFiles($entryName);

        return array_reduce(
            $entrypoints,
            function (string $source, string $location) {
                $rawCss = file_get_contents($this->publicDir.$location);

                if ($rawCss === false) {
                    throw new \RuntimeException("Unable to read CSS file: {$location}");
                }

                return $source.$rawCss;
            },
            ''
        );
    }
}
