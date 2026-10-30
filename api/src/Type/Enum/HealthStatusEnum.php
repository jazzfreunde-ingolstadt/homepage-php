<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Type\Enum;

/**
 * Health states exposed by the health check endpoint.
 */
enum HealthStatusEnum: string
{
    case Healthy = 'healthy';
    case Degraded = 'degraded';
    case Unhealthy = 'unhealthy';
}
