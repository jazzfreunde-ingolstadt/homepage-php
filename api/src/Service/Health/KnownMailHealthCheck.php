<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Health;

use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\Api\Entity\KnownMail;
use Jazzfreunde\Api\Type\Enum\HealthStatusEnum;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Override;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

/**
 * Checks that every known mail handle has a configured database entry.
 *
 * @psalm-api
 */
final class KnownMailHealthCheck implements HealthCheckInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

    public function __construct(
        private readonly ManagerRegistry $doctrine,
    ) {}

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function checkHealth(): HealthStatusEnum
    {
        $knownMails = $this->doctrine->getRepository(KnownMail::class)->findAll();
        $configuredHandles = array_map(
            static fn (KnownMail $knownMail): KnownMailHandleEnum => $knownMail->handle,
            $knownMails,
        );

        $status = HealthStatusEnum::Healthy;
        foreach (KnownMailHandleEnum::cases() as $handle) {
            if (!in_array($handle, $configuredHandles, true)) {
                $status = HealthStatusEnum::Degraded;
                $this->logger?->error(sprintf('Known mail handle "%s" is not configured.', $handle->value));
            }
        }

        return $status;
    }
}
