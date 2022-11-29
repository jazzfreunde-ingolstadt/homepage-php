<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Closure;
use Components\Component;
use Components\Props\Props;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Jazzfreunde\App\Component\MainDeprecated;
use Jazzfreunde\App\Component\EventList;
use Components\Props\PropsWithChildren;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Component\Content\About;
use Jazzfreunde\App\Component\Page\DefaultPage;
use Symfony\Component\HttpFoundation\Request;
use Jazzfreunde\App\Service\Http\Response\BufferedResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

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
     * About
     *
     * @param DefaultPage $page
     * @return BufferedResponse
     */
    #[Route('/about/', name: 'about')]
    public function about(DefaultPage $page): Response
    {
        // return new BufferedResponse(
        //     $page->component(new About())
        // );
        return $this->render('pages/about.html.twig', [
        ]);
    }

    /**
     * Routing für die Termine
     * @param bool    $edit
     * @param Request $request
     *
     * @return Response
     */
    #[Route('/termine/{edit}', name: 'termine', requirements: ['edit' => '^(?:edit/?$)?'])]
    public function events(string|null $edit = null, SerializerInterface $serializer, UrlGeneratorInterface $router): Response
    {
        $eventProps = new class(
            edit: $edit ? true : false,
            debug: 'dev' === $this->getParameter('kernel.environment')
            ) extends Props
        {
            /**
             * @param bool $edit
             * @param string $appVersion
             * @param bool $debug
             */
            public function __construct(public bool $edit, public bool $debug = false)
            {
            }
        };

        $props = new class(
            appVersion: $this->getParameter('app.version') ?? 'v0.0.0',
            children: new EventList(
                props: $eventProps,
                serializer: $serializer,
                router: $router
            )
        ) extends PropsWithChildren {
            /**
             * @param string $appVersion
             */
            public function __construct(public string $appVersion, Component|Closure $children)
            {
                parent::__construct($children);
            }
        };

        return new Response(
            (string) new MainDeprecated($props)
        );
    }
}
