<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Event\MetaData\Workflow\ConfirmationContract;

use InvalidArgumentException;
use Jazzfreunde\Api\Event\MetaData\Workflow\ConfirmationContract\PendingMetaData;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Tests parsing pending workflow metadata.
 *
 * @internal
 *
 * @coversNothing
 */
final class PendingMetaDataTest extends TestCase
{
    public function testTokenLifeTimePropertyParsesConfiguredInterval(): void
    {
        $metadata = self::createMetadata();
        $metadata->token_lifetime = '10 minutes';

        self::assertSame(10, $metadata->tokenLifeTime->i);
    }

    public function testTokenLifeTimePropertyRejectsMalformedInterval(): void
    {
        $metadata = self::createMetadata();
        $metadata->token_lifetime = 'not a valid interval';

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid token lifetime format');

        self::assertSame(0, $metadata->tokenLifeTime->y);
    }

    private static function createMetadata(): PendingMetaData
    {
        return (new ReflectionClass(PendingMetaData::class))->newInstanceWithoutConstructor();
    }
}
