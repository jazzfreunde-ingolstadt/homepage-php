<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Api\Provider;

use ApiPlatform\Metadata\Exception\ProblemExceptionInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use InvalidArgumentException;
use Override;
use stdClass;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides sample payloads for notification ErrorResource endpoints.
 *
 * @implements ProviderInterface<stdClass>
 *
 * @psalm-api
 */
final class ErrorResourceSampleProvider implements ProviderInterface
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?stdClass
    {
        $request = $context['request'] ?? null;
        $resourceClass = $context['resource_class'] ?? null;

        if (!$request instanceof Request) {
            throw new InvalidArgumentException(sprintf('Request object is required in context for %s.', self::class));
        }

        if (!is_string($resourceClass) || !is_subclass_of($resourceClass, ProblemExceptionInterface::class)) {
            return null;
        }

        $baseUrl = $request->getSchemeAndHttpHost();

        $error = new $resourceClass($baseUrl);

        return (object) [
            'type' => $error->getType(),
            'title' => $error->getTitle(),
            'status' => $error->getStatus(),
            'detail' => $error->getDetail(),
            'instance' => $error->getInstance(),
        ];
    }
}
