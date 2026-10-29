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
 * Error when a confirmation contract cannot be found.
 */
#[ErrorResource(
    status: 404,
    provider: ErrorResourceSampleProvider::class,
    routePrefix: '/problems',
    openapi: new OpenApiOperation(
        tags: ['Problems']
    )
)]
final class ConfirmationContractNotFoundError extends Exception implements ProblemExceptionInterface
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getType(): string
    {
        return ProblemType::from('confirmation-contract-not-found');
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getTitle(): string
    {
        return 'Confirmation contract not found';
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getStatus(): int
    {
        return 404;
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getDetail(): string
    {
        return 'The confirmation contract could not be found.';
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
