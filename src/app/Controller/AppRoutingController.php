<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Jazzfreunde\App\Kernel;
use Jazzfreunde\App\Components\Main;
use Jazzfreunde\App\Components\EventList;
use Components\Props\PropsWithChildren;
use Symfony\Component\HttpFoundation\Request;

class AppRoutingController extends AbstractController
{
    #[Route('/', name: 'index')]
    #[Route('/ueberuns/', name: 'ueberuns')]
    #[Route('/ziele/', name: 'ziele')]
    #[Route('/projekte/', name: 'projekte')]
    #[Route('/jazzlehrer/', name: 'jazzlehrer')]
    #[Route('/bilder/', name: 'bilder')]
    #[Route('/beitritt/', name: 'beitritt')]
    #[Route('/newsletter/', name: 'newsletter')]
    #[Route('/satzung/', name: 'satzung')]
    #[Route('/links/', name: 'links')]
    #[Route('/kontakt/', name: 'kontakt')]
    #[Route('/daten/', name: 'daten')]
    public function index(Kernel $kernel, Request $request): Response
    {
        $routeName = $request->attributes->get('_route');
        $pageDir = $kernel->getProjectDir().'/legacy/pages';

        if (!file_exists("{$pageDir}/{$routeName}.php")) {
            return new Response(status: 404);
        }

        include "{$pageDir}/{$routeName}.php";

        return new Response();
    }

    #[Route('/termine/', name: 'termine')]
    public function events(Kernel $kernel)
    {
        return new Response(
            (string) new Main(
                new PropsWithChildren(
                    children: new EventList()
                )
            )
        );
    }
}
