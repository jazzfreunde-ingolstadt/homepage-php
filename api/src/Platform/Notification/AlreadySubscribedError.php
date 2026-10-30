<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Platform\Notification;

use ApiPlatform\Metadata\ErrorResource;
use ApiPlatform\Metadata\Exception\ProblemExceptionInterface;
use ApiPlatform\OpenApi\Model\Operation as OpenApiOperation;
use Exception;
use Jazzfreunde\Api\Platform\ProblemType;
use Jazzfreunde\Api\Service\Api\Provider\ErrorResourceSampleProvider;
use Override;

/**
 * Error when a subscription already exists for the given email and resource scope.
 * This indicates that the user has already subscribed to notifications for this resource.
 */
#[ErrorResource(
    status: 409,
    provider: ErrorResourceSampleProvider::class,
    routePrefix: '/problems',
    openapi: new OpenApiOperation(
        tags: ['Problems']
    )
)]
final class AlreadySubscribedError extends Exception implements ProblemExceptionInterface
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getType(): string
    {
        return ProblemType::from('already-subscribed');
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getTitle(): string
    {
        return 'Already subscribed';
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getStatus(): int
    {
        return 409;
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getDetail(): string
    {
        return 'User with this email is already subscribed to this resource scope.';
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
