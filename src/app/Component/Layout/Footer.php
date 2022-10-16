<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Layout;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Footer
 */
class Footer implements ComponentInterface
{
    /**
     * @inheritDoc
     */
    public function render(): void
    {
        ?>
        <footer class="container-fluid text-start text-white">
            <div class="container">
                <div class="row p-3 pt-5 gx-5">
                    <div class="col">
                        <h6>Adresse</h6>
                        <p>
                            <span class="text-nowrap">Jazzfreunde Ingolstadt e. V.</span><br/>
                            <span class="text-nowrap">Lindbergstraße 3a</span><br/>
                            <span class="text-nowrap">85051 Ingolstadt</span>
                        </p>
                    </div>
                    <div class="col">
                        Impressum
                    </div>
                </div>
                <hr/>
                <div class="row p-3">
                    <small class="text-center">
                        Es is untersagt, die innerhalb der Internetpräsenz der Jazzfreunde Ingolstadt angegebenen Kontaktdaten für Werbung oder unerwünschte Kontaktierung (i. d. R. nicht den Verein betreffende Angelegenheiten, Umfragen, Statistiken etc.) zu speichern oder zu verwenden!<br/>
                        <br/>
                        Wenn Sie interessiert, was wir mit Ihren Daten anfangen und wie wir sie schützen, lesen Sie unsere Informationen zu <a href="/daten/">Datenerhebung und Datenschutz</a>.
                    </small>
                </div>
            </div>
        </footer>
        <?php
    }
}
