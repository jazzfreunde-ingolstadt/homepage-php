<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Components\Props\Props;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Jazzfreunde\App\Kernel;
use Jazzfreunde\App\Component\Main;
use Jazzfreunde\App\Component\EventList;
use Components\Props\PropsWithChildren;
use Jazzfreunde\App\Service\LegacyStub;
use Symfony\Component\HttpFoundation\Request;
use Exception;
use Jazzfreunde\App\Entity\Event;

/**
 * Routing Controller für die Website
 */
class AppRoutingController extends AbstractController
{
    /**
     * Routing für Legacy Content
     *
     * @param LegacyStub $legacyContent
     * @param Request    $request
     *
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
    public function legacyPages(LegacyStub $legacyContent, Request $request): Response
    {
        try {
            $legacyContent->include('pages/'.$request->attributes->get('_route').'.php');
        } catch (Exception $e) {
            return new Response(status: 404);
        }

        return new Response();
    }

    /**
     * Routing für die Termine
     *
     * @param Kernel $kernel
     *
     * @return Response
     */
    #[Route('/termine/', name: 'termine')]
    public function events(Kernel $kernel): Response
    {
        $events = $this->getDoctrine()
            ->getRepository(Event::class)
            ->findAll();

        $eventProps = new class($events) extends Props
        {
            public function __construct(public array $events)
            {
            }
        };

        return new Response(
            (string) new Main(
                new PropsWithChildren(
                    children: new EventList(
                        props: $eventProps
                    )
                )
            )
        );
    }
}
