<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Controller;

use Jazzfreunde\App\Service\Security\Attribute\FirewallEntryPoint;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Landing pages for special events.
 *
 * @psalm-api
 */
#[Route('/landing', name: 'landing_pages_')]
final class LandingPageController extends AbstractController
{
    /**
     * @return Response
     */
    #[FirewallEntryPoint(firewallName: 'main')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    #[Route('/overview', name: 'overview')]
    public function qr_code_overview(): Response
    {
        return $this->render(
            '@pages/landing/overview.html.twig',
            [
                'landingPages' => [
                    [
                        'title' => 'Flyer 1',
                        'description' => 'Zielseite für den ersten Flyer.',
                        'route' => 'landing_pages_flyer_1',
                    ],
                    [
                        'title' => 'Jazztage 2026',
                        'description' => 'Informationen zu den Jazztagen 2026.',
                        'route' => 'landing_pages_jazztage_2026',
                    ],
                ],
            ]
        );
    }

    /**
     * Landing page for Flyer 1.
     *
     * @return Response
     */
    #[Route('/flyer-1', name: 'flyer_1')]
    public function landingFlyer1(): Response
    {
        return $this->render(
            '@pages/home.html.twig'
        );
    }

    /**
     * Landing page for Jazztage 2026.
     *
     * @return Response
     */
    #[Route('/jazztage-2026', name: 'jazztage_2026')]
    public function landingJazztage2026(): Response
    {
        return $this->redirectToRoute(
            'landing_pages_socials'
        );
    }

    /**
     * Social media landing page.
     * Do not link to this page directly. Create a new landing page that redirects here to get tracking and analytics data.
     *
     * @return Response
     */
    #[Route('/socials', name: 'socials')]
    public function landingSocials(): Response
    {
        return $this->render(
            '@pages/landing/socials.html.twig'
        );
    }
}
