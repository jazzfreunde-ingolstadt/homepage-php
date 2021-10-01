<?php

namespace Jazzfreunde\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Jazzfreunde\App\Kernel;

class LegacyContentController extends AbstractController
{
    public function indexAction(Kernel $kernel)
    {
        include $kernel->getProjectDir().'/public/legacy/pages/index.php';
        return new Response();
    }
}