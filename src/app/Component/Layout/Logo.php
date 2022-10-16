<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Layout;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Logo
 */
class Logo implements ComponentInterface
{
    /**
     * @inheritDoc
     */
    public function render(): void
    {
        ?>
            <picture>
                <source media="(max-width: 576px)" srcset="/assets/images/jicon.svg" type="image/svg+xml">
                <source media="(max-width: 1200px)" srcset="/assets/images/jazzlogo.svg" type="image/svg+xml">
                <source media="(min-width: 1200px)" srcset="/assets/images/fulllogo.svg" type="image/svg+xml">
                <img class="img-fluid" src="/assets/images/fulllogo.svg" alt="Jazzfreund Logo" style="object-fit: fill; width: 100%; max-width: 400px"/>
            </picture>
        <?php
    }
}
