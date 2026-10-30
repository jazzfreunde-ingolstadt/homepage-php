<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Twig;

use InvalidArgumentException;
use Override;
use Pelago\Emogrifier\CssInliner;
use Pelago\Emogrifier\HtmlProcessor\CssToAttributeConverter;
use Pelago\Emogrifier\HtmlProcessor\CssVariableEvaluator;
use Pelago\Emogrifier\HtmlProcessor\HtmlPruner;
use RuntimeException;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

use function array_filter;
use function array_map;
use function implode;
use function mb_convert_encoding;
use function mb_detect_encoding;
use function sprintf;

/**
 * Erweitert die Integration von Encore in Twig Templates.
 *
 * @psalm-api
 */
final class EncoreExtension extends AbstractExtension
{
    /**
     * Dependency Injection.
     *
     * @param EntrypointLookupInterface $lookup
     * @param string                    $publicDir
     */
    public function __construct(private EntrypointLookupInterface $lookup, private string $publicDir) {}

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('encore_entry_css_source', $this->getEncoreEntryCssSource(...)),
        ];
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getFilters(): array
    {
        return [
            new TwigFilter('inline_css_custom', $this->inlineCss(...), options: ['is_safe' => ['all']]),
        ];
    }

    /**
     * Gibt generierte Encore CSS-Datei zur Laufzeit.
     *
     * @param string $entryName
     *
     * @return string
     *
     * @throws RuntimeException
     */
    public function getEncoreEntryCssSource(string $entryName): string
    {
        /*
         * Since mails are processed in bulk, we need to reset the entrypoint lookup,
         * otherwise it won't render all mail.
         *
         * @link https://symfony.com/doc/current/frontend/encore/advanced-config.html#avoid-missing-css-when-rendering-multiple-templates
         */
        $this->lookup->reset();

        $entryPoints = $this
            ->lookup
            ->getCssFiles($entryName);

        $source = '';
        foreach ($entryPoints as $entryPoint) {
            if (!\is_string($entryPoint)) {
                throw new RuntimeException('Encore CSS entrypoint must be a string.');
            }
            $source .= $this->readFile($this->publicDir.$entryPoint);
        }

        return $source;
    }

    /**
     * Converts CSS-styles into inline styles.
     *
     * @param string $html
     * @param string $css
     *
     * @return string
     */
    public function inlineCss(string $html, string ...$css): string
    {
        if (empty($html)) {
            throw new InvalidArgumentException('HTML cannot be empty.');
        }

        $mergedCss = $this->mergeCss($css);

        if (0 === strlen($mergedCss)) {
            throw new InvalidArgumentException('CSS cannot be empty.');
        }

        $cssInliner = CssInliner::fromHtml($html)
            ->inlineCss($mergedCss);

        $domDocument = $cssInliner->getDomDocument();
        HtmlPruner::fromDomDocument($domDocument)
            ->removeElementsWithDisplayNone()
            ->removeRedundantClassesAfterCssInlined($cssInliner);

        CssVariableEvaluator::fromDomDocument($domDocument)
            ->evaluateVariables();
        $processor = CssToAttributeConverter::fromDomDocument($domDocument)
            ->convertCssToVisualAttributes();

        return $processor->render();
    }

    /**
     * Reads a file and returns its content.
     *
     * @param string $fullPath
     *
     * @return string
     */
    private function readFile(string $fullPath): string
    {
        if (!file_exists($fullPath)) {
            throw new RuntimeException(sprintf('File not found: "%s"', $fullPath));
        }
        $raw = file_get_contents($fullPath);

        if (false === $raw) {
            throw new RuntimeException(sprintf('Unable to read file: "%s"', $fullPath));
        }

        $encoding = mb_detect_encoding($raw, 'UTF-8, ISO-8859-1', true);

        if ('UTF-8' === $encoding) {
            return $raw;
        }

        return mb_convert_encoding($raw, 'UTF-8', 'ISO-8859-1');
    }

    /**
     * Merges multiple CSS strings into one, removing empty lines.
     *
     * @param array<string> $css
     *
     * @return string
     */
    private function mergeCss(array $css): string
    {
        $lines = array_map(fn (string $line) => trim($line), $css);
        $lines = array_filter($lines, fn (string $line) => 0 !== strlen($line));

        return implode("\n", $lines);
    }
}
