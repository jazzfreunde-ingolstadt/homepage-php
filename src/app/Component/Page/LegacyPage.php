<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Page;

use Jazzfreunde\App\Component\ComponentInterface;
use Jazzfreunde\App\Component\DeferredLoading\FileComponent;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageComponent;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageInterface;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageTrait;
use Jazzfreunde\App\Service\Content\LegacyStub;

/**
 * Seitenkomponente als Brücke zur alten Frontendlogik des Service Portals
 */
class LegacyPage implements ComponentInterface, SharedStorageInterface
{
    use SharedStorageTrait;

    /**
     * Includes Content Components
     *
     * @var ComponentInterface[]
     */
    private array $includes = [];

    /**
     * @param LegacyStub $legacyStub
     */
    public function __construct(SharedStorageComponent $sharedStorage, private LegacyStub $legacyStub)
    {
        // Wird hier direkt gerufen, damit der SharedStorage für alle Komponenten verfügbar ist.
        $this->setSharedStorage($sharedStorage);
    }

    /**
     * @inheritDoc
     */
    public function setSharedStorage(SharedStorageComponent $sharedStorage): void
    {
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @inheritDoc
     */
    public function registerSharedValues(): void
    {
    }

    /**
     * Fügt dem Content eine Komponente hinzu, die ein PHP-Skript einbindet.
     * 
     * @param string $filePath Verzeichnis zur HTML Komponente, die von der Seite eingebunden wird.
     *
     * @return static
     */
    public function include(string $filePath): static
    {
        $component = new FileComponent($this->legacyStub, $filePath);
        $component->setSharedStorage($this->sharedStorage);
        $component->loadComponentFile();
        $this->component($component);

        return $this;
    }

    /**
     * Fügt dem Content eine Komponente hinzu
     *
     * @param ComponentInterface $component
     * @return static
     */
    public function component(ComponentInterface $component): static
    {
        $this->includes[] = $component;

        return $this;
    }

    /**
     * Schleust variablen als Globale in den Code, damit die alte Logik weiterhin funktioniert.
     *
     * @param array $globals assoziatives Array mit allen globals ['name_im_skript' => 'value']
     * @return static
     * @throws \InvalidArgumentException
     */
    public function setGlobals(array $globals): static
    {
        if (!empty($globals) && !count(array_filter(array_keys($globals), \is_string(...))) > 0) {
            throw new \InvalidArgumentException(self::class.'::setGlobals erwartet übergebene Globalen als assoziatives Array.');
        }

        array_walk($globals, $this->sharedStorage->share(...));

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function render(): void
    {
        array_walk($this->includes, fn(ComponentInterface $component) => $component->render());
    }

    /**
     * Direkter Aufrufe um PHP-Skripte in der 'render'-Methode mit einzufinden.
     *
     * @param string $filePath
     * @return static
     */
    protected function renderScript(string $filePath): static
    {
        $component = new FileComponent($this->legacyStub, $filePath);
        $component->setSharedStorage($this->sharedStorage);
        $component->loadComponentFile();
        $component->render();

        return $this;
    }
}
