<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Api\Contract;

use ApiPlatform\Metadata\ErrorResource;
use ApiPlatform\Metadata\Exception\ProblemExceptionInterface;
use ApiPlatform\OpenApi\Model\Operation as OpenApiOperation;
use Exception;
use Jazzfreunde\App\Api\ProblemType;
use Jazzfreunde\App\Service\Api\Provider\ErrorResourceSampleProvider;
use Override;

/**
 * Error when the confirmation period for a contract has expired.
 */
#[ErrorResource(
    status: 410,
    provider: ErrorResourceSampleProvider::class,
    routePrefix: '/problems',
    openapi: new OpenApiOperation(
        tags: ['Problems']
    )
)]
final class ConfirmationPeriodExpiredError extends Exception implements ProblemExceptionInterface
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getType(): string
    {
        return ProblemType::from('confirmation-expired');
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getTitle(): string
    {
        return 'Confirmation expired';
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getStatus(): int
    {
        return 410;
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getDetail(): string
    {
        return 'The confirmation period for this contract has expired.';
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getInstance(): ?string
    {
        return null;
    }
}
