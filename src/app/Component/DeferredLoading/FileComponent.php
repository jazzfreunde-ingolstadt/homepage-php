<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\DeferredLoading;

use Jazzfreunde\App\Component\ComponentInterface;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageComponent;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageInterface;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageTrait;
use Jazzfreunde\App\Service\LegacyStub;
use Symfony\Component\Config\Exception\FileLocatorFileNotFoundException;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * Komponente zum Laden von HTML aus Skriptdateien.
 */
class FileComponent implements ComponentInterface, SharedStorageInterface
{
    use SharedStorageTrait;

    private string|null $html = null;

    /**
     * @param \Jazzfreunde\Service\LegacyStub $legacyStub
     * @param string $filePath Pfad der Komponentendatei
     */
    public function __construct(private LegacyStub $legacyStub, private string $filePath = '')
    {
    }

    /**
     * Setzt den Dateipfad zum Skript
     *
     * @param string $filePath
     * @return void
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
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
    }

    #endregion

    /**
     * @inheritDoc
     */
    public function render(): void
    {
        if (is_null($this->html)) {
            throw new \LogicException('Komponente wurde noch nicht geladen. Stelle sicher, dass loadComponentFile(...) gerufen wird.');
        }

        echo $this->html;
    }

    /**
     * @return void
     */
    public function loadComponentFile(): void
    {
        if (empty($this->filePath)) {
            throw new \LogicException('Kein Dateipfad für Komponente definiert. Dieser kann direkt bei der Initialisierung angegeben werden oder über setFilePath(...) nachträglich gesetzt werden.');
        }

        try {
            ob_start();
            
            $sharedData = $this->sharedStorage->retrieveAll();
            $this->legacyStub->include($this->filePath, $sharedData);

            $this->html = ob_get_clean();
        } catch (FileLocatorFileNotFoundException) {
            throw new \LogicException("HTML Komponente existiert nicht unter dem angegebenen Pfad (in '$this->filePath')");
        }
    }
}
