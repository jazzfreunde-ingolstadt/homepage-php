<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\LocalStorage\Share;

/**
 * Dependency Injection für Shared Storage.
 */
trait SharedStorageTrait
{
    protected SharedStorageComponent $sharedStorage;

    /**
     * Schnittstelle zum Injizieren der Storage-Komponente
     *
     * Um die Dependency Injection über Setter auszulösen muss bei der Implementierung das Attribute #[Required] gesetzt sein.
     */
    abstract public function setSharedStorage(SharedStorageComponent $sharedStorage): void;
}
