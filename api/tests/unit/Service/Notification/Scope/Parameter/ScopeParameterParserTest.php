<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Notification\Scope\Parameter;

use InvalidArgumentException;
use Jazzfreunde\Api\Service\Notification\Scope\Parameter\Number;
use Jazzfreunde\Api\Service\Notification\Scope\Parameter\ScopeParameterParser;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for notification scope parameter parsing.
 *
 * @internal
 *
 * @covers \Jazzfreunde\Api\Service\Notification\Scope\Parameter\ScopeParameterParser
 */
final class ScopeParameterParserTest extends TestCase
{
    public function testParseCreatesNumberParameter(): void
    {
        $parameter = ScopeParameterParser::parse('{eventId:number}');

        self::assertInstanceOf(Number::class, $parameter);
        self::assertSame('eventId', $parameter->name);
        self::assertSame('\d+', $parameter->getRegex());
    }

    public function testIsParameterSegmentRecognizesTypedParameter(): void
    {
        self::assertTrue(ScopeParameterParser::isParameterSegment('{eventId:number}'));
        self::assertFalse(ScopeParameterParser::isParameterSegment('events'));
    }

    /**
     * @param string $segment
     */
    #[DataProvider('invalidParameterSegments')]
    public function testIsParameterSegmentRejectsPartialOrInvalidParameterSegments(string $segment): void
    {
        self::assertFalse(ScopeParameterParser::isParameterSegment($segment));
    }

    /**
     * @return iterable<string, array{string}>
     */
    public static function invalidParameterSegments(): iterable
    {
        yield 'prefix before parameter' => ['event-{eventId:number}'];

        yield 'suffix after parameter' => ['{eventId:number}-suffix'];

        yield 'numeric parameter name' => ['{1eventId:number}'];
    }

    public function testParseRejectsUnsupportedParameterType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Unsupported parameter type: slug');

        ScopeParameterParser::parse('{eventSlug:slug}');
    }
}
