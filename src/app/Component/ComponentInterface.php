<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component;

/**
 * Interface für alle Komponentenklassen.
 */
interface ComponentInterface
{
    /**
     * Erzeugt die HTML-Seite
     *
     * @return void
     */
    public function render(): void;
}
