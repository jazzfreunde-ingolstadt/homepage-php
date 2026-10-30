<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Notification\Scope;

use Jazzfreunde\Api\Exception\Notification\NotificationScopeMappingException;
use Jazzfreunde\Api\Service\Notification\Scope\CompiledScope;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCollection;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCollectionProviderInterface;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeMatcher;
use Jazzfreunde\Api\Service\Notification\Scope\Parameter\Number;
use Jazzfreunde\Api\Type\Primitive\Uri;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use stdClass;
use Symfony\Component\ObjectMapper\Exception\MappingException;
use Symfony\Component\ObjectMapper\Exception\MappingTransformException;
use Symfony\Component\ObjectMapper\Exception\NoSuchPropertyException;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;
use Throwable;

/**
 * Unit tests for notification scope matching and parsing.
 *
 * @internal
 *
 * @covers \Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeMatcher
 */
final class NotificationScopeMatcherTest extends TestCase
{
    /**
     * Ensures matching uses the compiled scope expressions.
     */
    public function testIsMatchReturnsWhetherAnyScopeMatches(): void
    {
        $collection = $this->createCollection();
        $uut = new UnitUnderTest(NotificationScopeMatcher::class);
        $provider = $uut->mock(NotificationScopeCollectionProviderInterface::class);
        $provider->expects(self::exactly(2))->method('provide')->willReturn($collection);
        $mapper = $uut->mock(ObjectMapperInterface::class);
        $mapper->expects(self::never())->method('map');
        $matcher = $uut->target();

        self::assertTrue($matcher->isMatch('/events/42'));
        self::assertFalse($matcher->isMatch('/events/not-a-number'));
    }

    /**
     * Ensures a matching URI is converted into an entity DTO with its parameters.
     */
    public function testParseMapsNamedScopeParameters(): void
    {
        $collection = $this->createCollection();
        $uut = new UnitUnderTest(NotificationScopeMatcher::class);
        $provider = $uut->mock(NotificationScopeCollectionProviderInterface::class);
        $provider->expects(self::once())->method('provide')->willReturn($collection);
        $dto = new stdClass();
        $mapper = $uut->mock(ObjectMapperInterface::class);
        $mapper
            ->expects(self::once())
            ->method('map')
            ->with(
                self::callback(static fn (object $data): bool => isset($data->eventId) && '42' === $data->eventId),
                stdClass::class,
            )
            ->willReturn($dto);
        $matcher = $uut->target();

        $parsed = $matcher->parse('/events/42');

        self::assertNotNull($parsed);
        self::assertSame('/events/42', (string) $parsed->matchedScope);
        self::assertSame($dto, $parsed->dto);
    }

    /**
     * Ensures parsing returns null and skips mapping when no scope matches.
     */
    public function testParseReturnsNullWhenNoScopeMatches(): void
    {
        $collection = $this->createCollection();
        $uut = new UnitUnderTest(NotificationScopeMatcher::class);
        $provider = $uut->mock(NotificationScopeCollectionProviderInterface::class);
        $provider->expects(self::once())->method('provide')->willReturn($collection);
        $mapper = $uut->mock(ObjectMapperInterface::class);
        $mapper->expects(self::never())->method('map');
        $matcher = $uut->target();

        self::assertNull($matcher->parse('/articles/42'));
    }

    /**
     * @param class-string<Throwable> $exceptionClass
     */
    #[DataProvider('mappingFailures')]
    public function testParseWrapsMappingFailures(string $exceptionClass, string $message, string $expectedMessage): void
    {
        $collection = $this->createCollection();
        $uut = new UnitUnderTest(NotificationScopeMatcher::class);
        $provider = $uut->mock(NotificationScopeCollectionProviderInterface::class);
        $provider->expects(self::once())->method('provide')->willReturn($collection);
        $mapper = $uut->mock(ObjectMapperInterface::class);
        $mapper->expects(self::once())->method('map')->willThrowException(new $exceptionClass($message));
        $matcher = $uut->target();

        $this->expectException(NotificationScopeMappingException::class);
        $this->expectExceptionMessage($expectedMessage);

        $matcher->parse('/events/42');
    }

    /**
     * @return iterable<string, array{class-string<Throwable>, string, string}>
     */
    public static function mappingFailures(): iterable
    {
        yield 'mapping error' => [
            MappingException::class,
            'mapper failed',
            'Error mapping notification scope parameters for entity class "stdClass": mapper failed',
        ];

        yield 'transform error' => [
            MappingTransformException::class,
            'transform failed',
            'Error transforming notification scope parameters for entity class "stdClass": transform failed',
        ];

        yield 'missing property' => [
            NoSuchPropertyException::class,
            'property missing',
            'No such property for entity class "stdClass": property missing',
        ];
    }

    private function createCollection(): NotificationScopeCollection
    {
        $collection = new NotificationScopeCollection();
        $collection->add(new CompiledScope('~^/events/(?P<eventId>\d+)$~', [new Number('eventId')], stdClass::class, Uri::from('/events/{eventId:number}')));

        return $collection;
    }
}
