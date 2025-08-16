<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Implements an endpoint for health checks
 * @psalm-api
 */
final class HealthCheckController extends AbstractController
{
    /**
     * Health check endpoint called by the deployment pipeline after deployment
     *
     * @return Response
     */
    #[Route('/api/health', name: 'health-check')]
    public function healthCheck(): Response
    {
        return $this->json([
            'status' => Response::HTTP_OK,
            'timestamp' => (new \DateTimeImmutable())->format('Y-m-d H:i:s'),
        ]);
    }
}
