<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Erweitert die Integration von Encore in Twig Templates
 */
class EncoreExtension extends AbstractExtension
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
    public function getFunctions(): array
    {
        return [
            new TwigFunction('encore_entry_css_source', [$this, 'getEncoreEntryCssSource']),
        ];
    }

    /**
     * @inheritDoc
     */
    public function getEncoreEntryCssSource(string $entryName): string
    {
        $entrypoints = $this
            ->lookup
            ?->getCssFiles($entryName)
            ?? throw new \LogicException(EntrypointLookupInterface::class);

        return array_reduce(
            $entrypoints,
            fn(string $source, string $location)
                => $source.file_get_contents($this->publicDir.$location),
            ''
        );
    }
}
