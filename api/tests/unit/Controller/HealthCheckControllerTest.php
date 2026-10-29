<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Controller;

use Jazzfreunde\App\Controller\HealthCheckController;
use Jazzfreunde\App\Service\Health\HealthCheckInterface;
use Jazzfreunde\App\Type\Enum\HealthStatusEnum;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Container;

/**
 * @covers \Jazzfreunde\App\Controller\HealthCheckController
 *
 * @internal
 */
final class HealthCheckControllerTest extends TestCase
{
    public function testHealthIsDegradedWhenAtLeastOneCheckIsDegraded(): void
    {
        $healthyCheck = $this->createMock(HealthCheckInterface::class);
        $healthyCheck->expects($this->once())
            ->method('checkHealth')
            ->willReturn(HealthStatusEnum::Healthy);

        $degradedCheck = $this->createMock(HealthCheckInterface::class);
        $degradedCheck->expects($this->once())
            ->method('checkHealth')
            ->willReturn(HealthStatusEnum::Degraded);

        $response = $this->createController([$healthyCheck, $degradedCheck])->healthCheck();
        $payload = json_decode((string) $response->getContent(), true, flags: JSON_THROW_ON_ERROR);

        self::assertIsArray($payload);
        self::assertArrayHasKey('status', $payload);
        $this->assertSame(HealthStatusEnum::Degraded->value, $payload['status']);
    }

    public function testUnhealthyStatusTakesPrecedenceAndAllChecksRun(): void
    {
        $unhealthyCheck = $this->createMock(HealthCheckInterface::class);
        $unhealthyCheck->expects($this->once())
            ->method('checkHealth')
            ->willReturn(HealthStatusEnum::Unhealthy);

        $degradedCheck = $this->createMock(HealthCheckInterface::class);
        $degradedCheck->expects($this->once())
            ->method('checkHealth')
            ->willReturn(HealthStatusEnum::Degraded);

        $response = $this->createController([$unhealthyCheck, $degradedCheck])->healthCheck();
        $payload = json_decode((string) $response->getContent(), true, flags: JSON_THROW_ON_ERROR);

        self::assertIsArray($payload);
        self::assertArrayHasKey('status', $payload);
        $this->assertSame(HealthStatusEnum::Unhealthy->value, $payload['status']);
    }

    /**
     * @param iterable<HealthCheckInterface> $healthChecks
     */
    private function createController(iterable $healthChecks): HealthCheckController
    {
        $uut = new UnitUnderTest(HealthCheckController::class);
        $uut->configure('healthChecks', $healthChecks);

        $controller = $uut->target();
        $controller->setContainer(new Container());

        return $controller;
    }
}
