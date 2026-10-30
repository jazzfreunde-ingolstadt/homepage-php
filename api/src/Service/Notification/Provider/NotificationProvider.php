<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Provider;

use Jazzfreunde\Api\Exception\Notification\NotificationScopeNotFoundException;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeMatcher;
use Jazzfreunde\Api\Service\Notification\Scope\ParsedScope;
use LogicException;
use Override;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

/**
 * Service to provide notification resources based on their scope.
 *
 * @psalm-api
 */
final class NotificationProvider implements NotificationProviderInterface
{
    /**
     * @param NotificationScopeMatcher              $scopeMatcher
     * @param iterable<NotificationSourceInterface> $notificationSources
     */
    public function __construct(
        private readonly NotificationScopeMatcher $scopeMatcher,
        #[AutowireIterator(NotificationSourceInterface::class)]
        private readonly iterable $notificationSources
    ) {}

    #[Override]
    public function getByScope(string $resourceScope): NotificationResource
    {
        $parsedScope = $this->scopeMatcher->parse($resourceScope);

        if (!$parsedScope instanceof ParsedScope) {
            throw NotificationScopeNotFoundException::forScope($resourceScope);
        }

        foreach ($this->notificationSources as $source) {
            if ($source->canHandle($parsedScope)) {
                return $source->get($parsedScope);
            }
        }

        throw new LogicException("No suitable notification source found for resource scope: '{$resourceScope}'");
    }
}
