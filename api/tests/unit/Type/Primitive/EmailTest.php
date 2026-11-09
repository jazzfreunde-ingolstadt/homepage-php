<?php

declare(strict_types=1);

namespace JazzfreundeTests\Api\Tests\Type\Primitive;

use Jazzfreunde\Api\Type\Primitive\Email;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class EmailTest extends TestCase
{
    public function testValidEmailIsStoredInLowercase(): void
    {
        $email = new Email('Jazz.Friend@Example.COM');

        self::assertSame('jazz.friend@example.com', $email->value());
    }
}
