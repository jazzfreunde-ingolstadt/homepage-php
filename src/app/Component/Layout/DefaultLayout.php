<?php declare(strict_types=1);

namespace Jazzfreunde\App\Component\Layout;

use Jazzfreunde\App\Component\Layout\Footer;
use Jazzfreunde\App\Component\Layout\Navigation\Menu;
use Jazzfreunde\App\Component\Layout\Navigation\Scrollbar;

/**
 * Layout der Website.
 */
class DefaultLayout
{
    /**
     * Undocumented function
     *
     * @param Logo $logo
     * @param Footer $footer
     */
    public function __construct(private Logo $logo, private Footer $footer, private Scrollbar $scrollbar, private Menu $menu)
    {
    }

    /**
     * Rendert das Layout
     *
     * @param callable $renderContent
     * @return void
     */
    public function render(callable $renderContent): void
    {
        ?>  
            <?php $this->scrollbar->render(); ?>
            <div class="container-fluid position-absolute top-0" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" style="z-index: 10;">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                        <?php $this->logo->render(); ?>
                    </div>
                </div>
            </div>
            <div  id="main-menu" class="collapse container-fluid position-absolute top-0 bottom-0 start-0 px-0 bg-primary" style="z-index: 1;">
                <?php $this->menu->render(); ?>
            </div>
            <div class="container-fluid bg-light px-0 d-flex flex-column flex-nowrap" style="height: 100vh; overflow-x: hidden; overflow-y: auto;">
                <div class="row justify-content-center gx-0 flex-grow-1">
                    <div class="col-md-8 py-5 px-5 text-body fs-5">
                        <div class="container">
                            <?php $renderContent(); ?>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center bg-primary bg-gradient">
                    <div class="col-md-8">
                        <?php $this->footer->render(); ?>
                    </div>
                </div>
            </div>
        <?php
    }
}
