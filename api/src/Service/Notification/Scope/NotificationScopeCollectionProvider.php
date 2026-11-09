<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use Jazzfreunde\Api\Service\Notification\Scope\Attribute\NotificationResource;
use LogicException;
use Override;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * Receives all notification scope definitions from compiler pass,
 * compiles them into a collection of compiled scopes.
 *
 * @psalm-api
 */
final class NotificationScopeCollectionProvider implements NotificationScopeCollectionProviderInterface
{
    private const CACHE_KEY = 'notifications.scope.collection.v2';

    /**
     * @param array<int, array{uri: non-empty-string, className: class-string}> $scopeResources
     */
    public function __construct(
        private NotificationScopeCompilerInterface $compiler,
        private array $scopeResources,
        #[Autowire(service: 'cache.app')]
        private CacheInterface $cache,
    ) {}

    /** {@inheritdoc} */
    #[Override]
    public function provide(): NotificationScopeCollection
    {
        // @var NotificationScopeCollection $collection
        $collection = $this->cache->get(self::CACHE_KEY, function (ItemInterface $item): NotificationScopeCollection {
            $item->expiresAfter(86400);

            $collection = new NotificationScopeCollection();

            foreach ($this->scopeResources as $resource) {
                $compiled = $this->compiler->compile(
                    new NotificationResource($resource['uri']),
                    $resource['className'],
                );

                $collection->add($compiled);
            }

            return $collection;
        });

        if (0 === count($collection)) {
            throw new LogicException('No notification scopes are configured.');
        }

        return $collection;
    }
}
