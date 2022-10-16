<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Layout\Navigation;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Zeigt Informationen zum Verein.
 */
class Scrollbar implements ComponentInterface
{
    /**
     * @inheritDoc
     */
    public function render(): void
    {
        ?>
        <style>
            ::-webkit-scrollbar {
            width: 5px;
            }

            ::-webkit-scrollbar-thumb {
            background: #e8c400;
            }

            ::-webkit-scrollbar-thumb:hover {
            background: #555;
            }
        </style>
        <?php
    }
}
