<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Head;

use Jazzfreunde\App\Component\ComponentInterface;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageComponent;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageInterface;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageTrait;
use Jazzfreunde\App\Component\Head\Link\ScriptLink;
use Jazzfreunde\App\Component\Head\Link\StylesheetLink;
use Jazzfreunde\App\Component\Head\Meta\Metadata;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * Verarbeitet Kopfdaten der Seite.
 */
class Head implements ComponentInterface, SharedStorageInterface
{
    use SharedStorageTrait;
    
    private string $title = '';
    private string $favicon = 'favicon.ico';

    /**
     * @var Metadata[]
     */
    private array $metadata = [];

    /**
     * @var StylesheetLink[]
     */
    private array $styles = [];

    /**
     * @var ScriptLink[]
     */
    private array $scripts = [];

    /**
     * @inheritDoc
     */
    public function render(): void
    {
        $entries = array_merge($this->metadata, $this->styles, $this->scripts);
        ?>
            <meta>
                <meta charset="utf-8" />
                <title><?= $this->title ?></title>
                <link rel="shortcut icon" type="image/x-icon" href="/<?= $this->favicon ?>">
        <?php array_walk($entries, fn(ComponentInterface $element) => $element->render()); ?>
            </meta>
        <?php
    }

    #region Shared Storage

    /**
     * @inheritDoc
     */
    #[Required]
    public function setSharedStorage(SharedStorageComponent $sharedStorage): void
    {
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @inheritDoc
     */
    public function registerSharedValues(): void
    {
        $this->sharedStorage->share($this, 'head');
    }

    #endregion

    /**
     * Legt den Titel der Seite fest.
     *
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Legt das Favicon der Seite fest.
     *
     * @param string $path
     * @return static
     */
    public function setFavicon(string $path): static
    {
        $this->favicon = $path;

        return $this;
    }

    /**
     * Fügt dem Kopfsatz einen neuen Metadateneintrag hinzu.
     *
     * @param Metadata ...$meta
     * @return static
     */
    public function addMetadata(Metadata ...$meta): static
    {
        array_push($this->metadata, ...$meta);

        return $this;
    }

    /**
     * Fügt dem Kopfsatz einen neuen Stylesheeteintrag hinzu.
     *
     * @param StylesheetLink ...$style
     * @return static
     */
    public function addStylesheet(StylesheetLink ...$style): static
    {
        array_push($this->styles, ...$style);

        return $this;
    }

    /**
     * Fügt dem Kopfsatz einen neuen Skripteintrag hinzu.
     *
     * @param ScriptLink ...$script
     * @return static
     */
    public function addScript(ScriptLink ...$script): static
    {
        array_push($this->scripts, ...$script);

        return $this;
    }
}
