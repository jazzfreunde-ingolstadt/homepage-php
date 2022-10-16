<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Layout\Navigation;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Zeigt Informationen zum Verein.
 */
class Menu implements ComponentInterface
{
    /**
     * @inheritDoc
     */
    public function render(): void
    {
        ?>
        <style>
            .menu-item {
                height: 300px;
                background-repeat: no-repeat;
                background-size: cover;
                text-align: center;
            }
        </style>
        <div class="container-fluid bg-primary px-0 d-flex flex-column flex-nowrap" style="height: 100%">
            <div class="row justify-content-center gx-0 flex-grow-1">
                <div class="align-self-center">
                    <nav class="container-sm text-secondary align-self-center text-center gx-0 py-5">
                        <div class="row justify-content-center">
                            <div class="col-3 menu-item" style="background-image: url('/gfx/start_se/start_1a_ul.png')">
                                <span class="badge bg-secondary position-absolute top-20">Newsletter & Aktuelles</span>
                            </div>
                            <div class="col-3 menu-item" style="background-image: url('/gfx/start_se/start_1b_ul.png')">
                                <span class="badge bg-secondary position-absolute top-20">Über uns</span>
                            </div>
                            <div class="col-3 menu-item" style="background-image: url('/gfx/start_se/start_1c_ul.png')">
                                <span class="badge bg-secondary position-absolute top-20">Mitglied werden</span>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3 menu-item" style="background-image: url('/gfx/start_se/start_2a_ul.png')">
                                <span class="badge bg-secondary position-absolute top-20">Ziele</span>
                            </div>
                            <div class="col-3 menu-item" style="background-image: url('/gfx/start_se/start_2b_ul.png')">
                                <span class="badge bg-secondary position-absolute top-20">Projekte</span>
                            </div>
                            <div class="col-3 menu-item" style="background-image: url('/gfx/start_se/start_2c_ul.png')">
                                <span class="badge bg-secondary position-absolute top-20">Veranstaltungen</span>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <?php
    }
}
