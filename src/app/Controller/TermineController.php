<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Jazzfreunde\App\Kernel;
use Jazzfreunde\Config\Loader\FunctionComponentLoader;
use Symfony\Component\Config\FileLocator;

class TermineController extends AbstractController
{
    public function indexAction(Kernel $kernel)
    {
        define("PAGE", "termine");
        define("TITLE", "Veranstaltungen");

        include $kernel->getProjectDir().'/public/legacy/inc/environment.php';

        head();
        before();

        $loader = new FunctionComponentLoader(new FileLocator($kernel->getProjectDir().'/app/components'));
        $loader->load('termine_list.comp')();

        ?>
            <h1>Veranstaltungskalenderer</h1>
        <?php

        // $termineList();

        after();

        return new Response();
    }
}
