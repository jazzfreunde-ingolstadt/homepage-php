<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Components\Props\Props;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Jazzfreunde\App\Component\Main;
use Jazzfreunde\App\Component\EventList;
use Components\Props\PropsWithChildren;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\App\Model\EventRepository;

/**
 * Routing Controller für die Website
 */
class AppRoutingController extends AbstractController
{
    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct(private ManagerRegistry $doctrine)
    {
    }

    /**
     * Routing für die Termine
     * @param bool    $edit
     * @param Request $request
     *
     * @return Response
     */
    #[Route('/termine/{edit}', name: 'termine', requirements: ['edit' => '^(?:edit/?$)?'])]
    public function events(string|null $edit = null, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            echo $request->getContent();
        }

        $eventRepository = fn(): EventRepository => $this->doctrine
            ->getRepository(Event::class);

        $eventProps = new class(
            futureEvents: $eventRepository()->findFutureEvents(),
            pastEvents: $eventRepository()->findPastEvents(),
            archivedEvents: $eventRepository()->findArchivedEvents(100),
            edit: $edit ? true : false
            ) extends Props
        {
            /**
             * @param array $futureEvents
             * @param array $pastEvents
             * @param array $archivedEvents
             * @param bool  $edit
             */
            public function __construct(public array $futureEvents, public array $pastEvents, public array $archivedEvents, public bool $edit)
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
