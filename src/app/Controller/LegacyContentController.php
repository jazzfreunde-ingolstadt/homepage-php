<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Jazzfreunde\App\Component\Page\LegacyPage;
use Jazzfreunde\App\Service\Http\Response\BufferedResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Routing Controller für die Website
 */
class LegacyContentController extends AbstractController
{
    /**
     * Routing für Legacy Content
     *
     * @param LegacyPage $page
     * @param Request    $request
     * @return Response
     */
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
    #[Route('/404/', name: '404')]
    public function show(LegacyPage $page, Request $request): Response
    {
        try {
            return new BufferedResponse(
                $page
                    ->setGlobals([
                        'appVersion' => $this->getParameter('app.version')
                    ])
                    ->include($request->attributes->get('_route').'.php')
            );
        } catch (\LogicException) {
            if ('404' !== trim($request->getPathInfo(), '/')) {
                return $this->redirectToRoute('404');
            }
        }
    }
}
