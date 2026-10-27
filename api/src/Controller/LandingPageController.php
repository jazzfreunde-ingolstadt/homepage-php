<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Controller;

use Endroid\QrCode\Builder\BuilderRegistryInterface;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Jazzfreunde\App\Service\Security\Attribute\FirewallEntryPoint;
use Jazzfreunde\App\Service\Twig\PageTemplatePath;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
            PageTemplatePath::LANDING_OVERVIEW,
            [
                'landingPages' => [
                    [
                        'title' => 'Flyer 1',
                        'description' => 'Zielseite für den ersten Flyer.',
                        'route' => 'landing_pages_flyer_1',
                    ],
                    [
                        'title' => 'Jazztage 2026',
                        'description' => 'Tracker für die Jazztage 2026.',
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
            PageTemplatePath::HOME
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
    #[Route('/s', name: 'socials_short')]
    public function landingSocials(): Response
    {
        return $this->render(
            PageTemplatePath::LANDING_SOCIALS
        );
    }

    /**
     * Returns a PNG QR code pointing to the landing page identified by the slug.
     * The optional "design" query parameter selects the configured QR design and defaults to "default".
     *
     * @param string                   $slug            Landing page slug to encode
     * @param Request                  $request         Current request
     * @param BuilderRegistryInterface $builderRegistry Configured QR code builders
     *
     * @return Response QR code image response
     */
    #[FirewallEntryPoint(firewallName: 'main')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    #[Route('/qr/{slug}', name: 'qr_code', methods: ['GET'])]
    public function qrCode(
        string $slug,
        Request $request,
        BuilderRegistryInterface $builderRegistry,
    ): Response {
        $design = $request->query->getString('design', 'default');

        return new QrCodeResponse(
            $builderRegistry
                ->get($design)
                ->build(data: 'qr.jzz-f.de/'.$slug)
        );
    }
}
