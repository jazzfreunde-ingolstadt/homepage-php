<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Notification\Provider;

use Jazzfreunde\Api\Exception\Notification\NotificationScopeNotFoundException;
use Jazzfreunde\Api\Platform\Notification\Resource\EventNotification;
use Jazzfreunde\Api\Service\Notification\Provider\Model\NotificationResource;
use Jazzfreunde\Api\Service\Notification\Provider\NotificationProvider;
use Jazzfreunde\Api\Service\Notification\Provider\NotificationSourceInterface;
use Jazzfreunde\Api\Service\Notification\Scope\CompiledScope;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCollection;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCollectionProviderInterface;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeMatcher;
use Jazzfreunde\Api\Service\Notification\Scope\Parameter\Number;
use Jazzfreunde\Api\Service\Notification\Scope\ParsedScope;
use Jazzfreunde\Api\Type\Primitive\Uri;
use Jazzfreunde\UnitTest\UnitUnderTest;
use Jazzfreunde\Util\HashUtil;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

/**
 * @internal
 *
 * @covers \Jazzfreunde\Api\Service\Notification\Provider\NotificationProvider
 */
final class NotificationProviderTest extends TestCase
{
    public function testGetByScopeThrowsWhenTheScopeCannotBeParsed(): void
    {
        $uut = new UnitUnderTest(NotificationProvider::class);
        $this->configureScopeMatcher($uut);
        $uut->configure('notificationSources', []);
        $provider = $uut->target();

        $this->expectException(NotificationScopeNotFoundException::class);
        $this->expectExceptionMessage('Notification scope not found: /unknown/42');

        $provider->getByScope('/unknown/42');
    }

    public function testGetByScopeReturnsTheResourceFromASourceThatCanHandleTheScope(): void
    {
        $uut = new UnitUnderTest(NotificationProvider::class);
        $notification = new EventNotification(42);
        $resource = new NotificationResource(
            uri: new Uri('/events/42'),
            identityHash: HashUtil::sha256(EventNotification::class, '42'),
            email_template: 'event-template.html.twig',
            title: 'Jazz concert',
        );
        $parsedScope = null;

        $source = $uut->mock(NotificationSourceInterface::class);
        $source->expects(self::once())
            ->method('canHandle')
            ->with(self::callback(
                static fn (ParsedScope $scope): bool => $scope->dto instanceof EventNotification
                    && 42 === $scope->dto->id
                    && '/events/42' === $scope->matchedScope->value(),
            ))
            ->willReturnCallback(static function (ParsedScope $scope) use (&$parsedScope): bool {
                $parsedScope = $scope;

                return true;
            });
        $source->expects(self::once())
            ->method('get')
            ->with(self::callback(
                static function (ParsedScope $scope) use (&$parsedScope): bool {
                    return $scope === $parsedScope;
                },
            ))
            ->willReturn($resource);

        $this->configureScopeMatcher($uut, $notification);
        $uut->configure('notificationSources', [$source]);
        $provider = $uut->target();

        self::assertSame($resource, $provider->getByScope('/events/42'));
    }

    public function testGetByScopeThrowsWhenNoSourceCanHandleAMatchedScope(): void
    {
        $uut = new UnitUnderTest(NotificationProvider::class);
        $notification = new EventNotification(42);

        $source = $uut->mock(NotificationSourceInterface::class);
        $source->expects(self::once())
            ->method('canHandle')
            ->with(self::callback(
                static fn (ParsedScope $scope): bool => $scope->dto instanceof EventNotification
                    && 42 === $scope->dto->id
                    && '/events/42' === $scope->matchedScope->value(),
            ))
            ->willReturn(false);
        $source->expects(self::never())->method('get');

        $this->configureScopeMatcher($uut, $notification);
        $uut->configure('notificationSources', [$source]);
        $provider = $uut->target();

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage(
            "No suitable notification source found for resource scope: '/events/42'",
        );

        $provider->getByScope('/events/42');
    }

    /**
     * @param UnitUnderTest<NotificationProvider> $uut
     */
    private function configureScopeMatcher(
        UnitUnderTest $uut,
        ?EventNotification $notification = null,
    ): void {
        $scopes = new NotificationScopeCollection();
        if (null !== $notification) {
            $scopes->add(new CompiledScope(
                '~^/events/(?P<id>\d+)$~',
                [new Number('id')],
                EventNotification::class,
                '/events/{id:number}',
            ));
        }

        $scopeProvider = $uut->mock(NotificationScopeCollectionProviderInterface::class);
        $scopeProvider->expects(self::once())->method('provide')->willReturn($scopes);

        $mapper = $uut->mock(ObjectMapperInterface::class);
        if (null === $notification) {
            $mapper->expects(self::never())->method('map');
        } else {
            $mapper->expects(self::once())
                ->method('map')
                ->with(
                    self::callback(static fn (stdClass $data): bool => '42' === $data->id),
                    EventNotification::class,
                )
                ->willReturn($notification);
        }

        $uut->configure('scopeMatcher', new NotificationScopeMatcher($scopeProvider, $mapper));
    }
}
