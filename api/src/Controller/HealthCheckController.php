<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Controller;

use DateTimeImmutable;
use Jazzfreunde\App\Service\Health\HealthCheckInterface;
use Jazzfreunde\App\Type\Enum\HealthStatusEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Implements an endpoint for health checks.
 *
 * @psalm-api
 */
final class HealthCheckController extends AbstractController
{
    /**
     * @param iterable<HealthCheckInterface> $healthChecks
     */
    public function __construct(
        #[AutowireIterator(HealthCheckInterface::class)]
        private readonly iterable $healthChecks,
    ) {}

    /**
     * Health check endpoint called by the deployment pipeline after deployment.
     *
     * @return Response
     */
    #[Route('/api/health', name: 'health-check')]
    public function healthCheck(): Response
    {
        $status = HealthStatusEnum::Healthy;

        foreach ($this->healthChecks as $healthCheck) {
            $checkStatus = $healthCheck->checkHealth();

            if (HealthStatusEnum::Unhealthy === $checkStatus) {
                $status = HealthStatusEnum::Unhealthy;
            } elseif (HealthStatusEnum::Degraded === $checkStatus && HealthStatusEnum::Healthy === $status) {
                $status = HealthStatusEnum::Degraded;
            }
        }

        return $this->json(
            data: [
                'status' => $status->value,
                'timestamp' => (new DateTimeImmutable())->format('Y-m-d H:i:s'),
            ],
            status: HealthStatusEnum::Healthy === $status ? Response::HTTP_OK : Response::HTTP_SERVICE_UNAVAILABLE,
        );
    }
}
