<?php

declare(strict_types=1);

namespace JazzfreundeTests\Api\Tests\Type\Primitive;

use Jazzfreunde\Api\Type\Primitive\Uri;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class UriTest extends TestCase
{
    public function testValidUriIsStoredInLowercase(): void
    {
        $uri = new Uri('/Events/JazzNight?Topic=Jazz#Band');

        self::assertSame('/events/jazznight?topic=jazz#band', $uri->value());
    }
}
