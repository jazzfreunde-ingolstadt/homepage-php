<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\LocalStorage\Share;

/**
 * Komponente zum Austausch von Daten zwischen Koponenten.
 */
class SharedStorageComponent
{
    /**
     * @var SharedStorageComponent
     */
    protected static SharedStorageComponent|null $storage = null;

    /**
     * Gespeichertte Daten im Storage
     *
     * @var array
     */
    private array $storedData = [];

    /**
     * Erzeugt Singleton von SharedStorage.
     *
     * @return SharedStorageComponent
     */
    final public static function getSharedStorage(): SharedStorageComponent
    {
        if (!static::$storage) {
            static::$storage = new SharedStorageComponent();
        }

        return static::$storage;
    }

    /**
     * Legt Daten im Storage ab.
     *
     * @param mixed $value
     * @param string $referenceName
     * @return void
     * @throws \RuntimeException Exception, wenn bereits ein Eintrag für diese Referenz existiert.
     */
    public function share(mixed &$value, string $referenceName): void
    {
        if ($this->hasData($referenceName)) {
            throw new \RuntimeException("Für die Referenz '$referenceName' existieren im Storage bereits Daten.");
        }

        $this->storedData[$referenceName] =& $value;
    }

    /**
     * Liegt bereits eine Referenz im Storage vor?
     *
     * @param string $referenceName
     * @return boolean
     */
    public function hasData(string $referenceName): bool
    {
        return array_key_exists($referenceName, $this->storedData);
    }

    /**
     * Holt Daten aus dem Storage.
     *
     * @param string $referenceName
     * @return mixed
     * @throws \RuntimeException Exception, wenn für diesen Referenz kein Eintrag existiert.
     */
    public function retrieve(string $referenceName): mixed
    {
        if (!$this->hasData($referenceName)) {
            throw new \RuntimeException("Für die Referenz '$referenceName' existieren im Storage keine Daten.");
        }

        return $this->storedData[$referenceName] ?? null;
    }

    /**
     * Holt alle Daten des Storage.
     *
     * @return array
     */
    public function retrieveAll(): array
    {
        $storedData = [];
        foreach ($this->storedData as $reference => &$value) {
            $storedData[$reference] =& $value;
        }
        return $storedData;
    }

    /**
     * Darf nicht manuell Instanziert werden.
     */
    private function __construct()
    {
    }
}
