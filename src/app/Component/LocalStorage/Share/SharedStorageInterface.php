<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\LocalStorage\Share;

use Symfony\Contracts\Service\Attribute\Required;

/**
 * Interface für Komponenten, die die SharedStorage Komponente nutzen.
 * @see \Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageComponent
 */
interface SharedStorageInterface
{
    /**
     * Registriert Werte, die von einer Komponente an andere Komponenten weitergegeben werden sollen, im Shared Storage.
     * Das Code Attribute #[Required] sorgt dafür, dass bei allen Klassen, die dieses Interface einbinden, diese Methode nach der Initialisierung aufgerufen wird.
     *
     * @return void
     */
    #[Required]
    public function registerSharedValues(): void;
}
