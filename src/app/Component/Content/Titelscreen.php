<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Layout;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Titelscreen
 */
class Titelscreen implements ComponentInterface
{
    /**
     * @inheritDoc
     */
    public function render(): void
    {
        ?>
        <div class="container-fluid bg-primary text-center">
            <span class="text-secondary" style="font-size: 1.8em; font-weight: bold"><span style="white-space: nowrap">Jazzfreunde</span> <span style="white-space: nowrap">Ingolstadt e. V.</span></span>
    </div>
        <?php
    }
}
