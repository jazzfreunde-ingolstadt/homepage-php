<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Service\Notification\Scope;

use Jazzfreunde\App\Api\Notification\Resource\EventNotification;
use Jazzfreunde\App\Service\Notification\Scope\Attribute\NotificationResource as NotificationResourceAttribute;
use Jazzfreunde\App\Service\Notification\Scope\NotificationScopeCollection;
use Jazzfreunde\App\Service\Notification\Scope\NotificationScopeCollectionProviderInterface;
use Jazzfreunde\App\Service\Notification\Scope\NotificationScopeCompiler;
use Jazzfreunde\App\Service\Notification\Scope\NotificationUrlGenerator;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @internal
 *
 * @covers \Jazzfreunde\App\Service\Notification\Scope\NotificationUrlGenerator
 */
final class NotificationUrlGeneratorTest extends TestCase
{
    public function testGenerateUsesTheDecoratedScopeUriAndObjectParameter(): void
    {
        $notification = new EventNotification(42);
        $attributes = (new ReflectionClass(EventNotification::class))
            ->getAttributes(NotificationResourceAttribute::class);
        self::assertCount(1, $attributes);

        $resource = $attributes[0]->newInstance();
        $scope = (new NotificationScopeCompiler())->compile($resource, EventNotification::class);
        $scopes = new NotificationScopeCollection();
        $scopes->add($scope);

        $uut = new UnitUnderTest(NotificationUrlGenerator::class);
        $uut->mock(NotificationScopeCollectionProviderInterface::class)
            ->expects(self::once())
            ->method('provide')
            ->willReturn($scopes);

        $uut->mock(NormalizerInterface::class)
            ->expects(self::once())
            ->method('normalize')
            ->with($notification)
            ->willReturn(['id' => 42]);

        self::assertSame('/events/42', $uut->target()->generate($notification));
    }
}
