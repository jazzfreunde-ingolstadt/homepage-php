<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Notification\Scope;

use InvalidArgumentException;
use Jazzfreunde\Api\Service\Notification\Scope\Attribute\NotificationResource;
use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCompiler;
use Jazzfreunde\Api\Service\Notification\Scope\Parameter\Number;
use Jazzfreunde\Api\Type\Primitive\Uri;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Unit tests for notification scope compilation.
 *
 * @internal
 *
 * @covers \Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeCompiler
 */
final class NotificationScopeCompilerTest extends TestCase
{
    /**
     * Ensures literal URI segments are escaped in the compiled regex.
     */
    public function testCompileEscapesLiteralSegments(): void
    {
        $compiled = (new NotificationScopeCompiler())->compile(
            new NotificationResource('/events/archive.v1'),
            stdClass::class,
        );

        self::assertSame('~^/events/archive\.v1$~', $compiled->getRegex());
        self::assertSame([], $compiled->getParameters());
        self::assertSame(stdClass::class, $compiled->getEntityClassName());
        self::assertSame('/events/archive.v1', $compiled->getUri()->value());
    }

    /**
     * Ensures typed URI parameters become capture groups with parameter metadata.
     */
    public function testCompileCreatesTypedParameterCaptureGroups(): void
    {
        $compiled = (new NotificationScopeCompiler())->compile(
            new NotificationResource('/events/{eventId:number}/items'),
            stdClass::class,
        );

        self::assertSame('~^/events/(?P<eventId>\d+)/items$~', $compiled->getRegex());
        self::assertSame(1, preg_match($compiled->getRegex(), '/events/123/items'));
        self::assertSame(0, preg_match($compiled->getRegex(), '/events/123/items/extra'));
        self::assertCount(1, $compiled->getParameters());
        self::assertInstanceOf(Number::class, $compiled->getParameters()[0]);
        self::assertSame('eventId', $compiled->getParameters()[0]->getName());
        self::assertSame(stdClass::class, $compiled->getEntityClassName());
        self::assertSame('/events/{eventId:number}/items', $compiled->getUri()->value());
    }

    /**
     * @param string $uri
     */
    #[DataProvider('invalidScopeUris')]
    public function testCompileRejectsInvalidScopeUris(string $uri): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new NotificationScopeCompiler())->compile(new NotificationResource($uri), stdClass::class);
    }

    /**
     * @return iterable<string, array{string}>
     */
    public static function invalidScopeUris(): iterable
    {
        yield 'empty URI' => [''];

        yield 'URI without leading slash' => ['events/123'];

        yield 'URI containing spaces' => ['/events/my event'];
    }
}
