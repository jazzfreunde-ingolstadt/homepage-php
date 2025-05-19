<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Twig;

use Override;
use RuntimeException;
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
        /**
         * Since mails are processed in bulk, we need to reset the entrypoint lookup,
         * otherwise it won't render all mail.
         *
         * @link $this->publicDir.$entryPoint
         */
        $this->lookup->reset();

        $entryPoints = $this
            ->lookup
            ->getCssFiles($entryName);

        return array_reduce(
            $entryPoints,
            fn(string $source, string $entryPoint) => $source.$this->readFile($this->publicDir.$entryPoint),
            ''
        );
    }

    /**
     * Reads a file and returns its content
     *
     * @param string $fullPath
     * @return string
     */
    private function readFile(string $fullPath): string
    {
        if (!file_exists($fullPath)) {
            throw new RuntimeException(sprintf('File not found: "%s"', $fullPath));
        }
        $raw = file_get_contents($fullPath);

        if ($raw === false) {
            throw new RuntimeException(sprintf('Unable to read file: "%s"', $fullPath));
        }

        return $raw;
    }
}
