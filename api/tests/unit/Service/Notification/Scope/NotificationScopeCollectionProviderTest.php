<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Notification\Scope;

use Jazzfreunde\Api\Service\Notification\Scope\Attribute\NotificationResource;
use Jazzfreunde\Api\Service\Notification\Scope\CompiledScope;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCollection;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCollectionProvider;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCompilerInterface;
use Jazzfreunde\UnitTest\UnitUnderTest;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * Unit tests for notification scope collection provisioning.
 *
 * @internal
 *
 * @covers \Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCollectionProvider
 */
final class NotificationScopeCollectionProviderTest extends TestCase
{
    /**
     * Ensures an empty compiled scope collection is rejected.
     */
    public function testProvideThrowsWhenNoScopesAreConfigured(): void
    {
        $uut = new UnitUnderTest(NotificationScopeCollectionProvider::class);
        $compiler = $uut->mock(NotificationScopeCompilerInterface::class);
        $compiler->expects(self::never())->method('compile');
        $uut->configure('scopeResources', []);
        $uut->mock(CacheInterface::class)
            ->expects(self::once())
            ->method('get')
            ->willReturn(new NotificationScopeCollection());

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('No notification scopes are configured.');

        $uut->target()->provide();
    }

    /**
     * Ensures configured scopes are compiled once and cached for later calls.
     */
    public function testProvideCallsCompilerWhenCacheIsEmpty(): void
    {
        $scope = new CompiledScope('~^/events/(\d+)$~', [], stdClass::class, '/events/{id:number}');
        $uut = new UnitUnderTest(NotificationScopeCollectionProvider::class);
        $compiler = $uut->mock(NotificationScopeCompilerInterface::class);
        $compiler
            ->expects(self::once())
            ->method('compile')
            ->with(
                self::callback(static fn (NotificationResource $resource): bool => '/events/{id:number}' === $resource->uri),
                stdClass::class,
            )
            ->willReturn($scope);
        $uut->configure('scopeResources', [['uri' => '/events/{id:number}', 'className' => stdClass::class]]);
        $uut->mock(CacheInterface::class)
            ->expects(self::once())
            ->method('get')
            ->willReturnCallback(function (string $key, callable $callback): NotificationScopeCollection {
                self::assertSame('notifications.scope.collection.v2', $key);
                $item = $this->createMock(ItemInterface::class);
                $item->expects(self::once())->method('expiresAfter')->with(86400);
                $collection = $callback($item);
                self::assertInstanceOf(NotificationScopeCollection::class, $collection);

                return $collection;
            });

        $collection = $uut->target()->provide();

        self::assertSame([$scope], $collection->all());
    }

    /**
     * Ensures a cached collection is returned without compiling the configured scopes.
     */
    public function testProvideDoesNotCallCompilerWhenCacheExists(): void
    {
        $cachedCollection = new NotificationScopeCollection();
        $cachedCollection->add(new CompiledScope('~^/events/(\d+)$~', [], stdClass::class, '/events/{id:number}'));

        $uut = new UnitUnderTest(NotificationScopeCollectionProvider::class);
        $compiler = $uut->mock(NotificationScopeCompilerInterface::class);
        $compiler->expects(self::never())->method('compile');
        $uut->configure('scopeResources', [['uri' => '/events/{id:number}', 'className' => stdClass::class]]);
        $uut->mock(CacheInterface::class)
            ->expects(self::once())
            ->method('get')
            ->with('notifications.scope.collection.v2')
            ->willReturn($cachedCollection);

        self::assertSame($cachedCollection, $uut->target()->provide());
    }
}
