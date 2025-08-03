<?php declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Service\Security\VerificationCode;

use Jazzfreunde\App\Service\Security\VerificationCode\VerificationCodeStorage;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Tests for the VerificationCodeStorage
 */
final class VerificationCodeStorageTest extends TestCase
{
    use MockingTrait;

    /**
     * Tests that store method saves a new verification code.
     */
    #[Test]
    public function storeNewItem(): void
    {
        $item = $this->mockCacheItem(isHit: false);
        $item->expects($this->once())
            ->method('set')
            ->with('123456');
        $item->expects($this->once())
            ->method('expiresAfter')
            ->with(300);

        $uut = new UnitUnderTest(VerificationCodeStorage::class);
        $uut->configure('lifetime', 300);
        $uut->mock(CacheItemPoolInterface::class)
            ->expects($this->once())
            ->method('getItem')
            ->with('test_hash')
            ->willReturn($item);
        $uut->mock(CacheItemPoolInterface::class)
            ->expects($this->once())
            ->method('save')
            ->with($item);

        $uut->target()->store('test_hash', '123456');
    }

    /**
     * Tests that store method  saves a verification code and overwrites an existing item.
     */
    #[Test]
    public function storeOverwriteItem(): void
    {
        $item = $this->mockCacheItem(isHit: true);
        $item->expects($this->once())
            ->method('set')
            ->with('654321');
        $item->expects($this->never())
            ->method('expiresAfter')
            ->with(300);

        $uut = new UnitUnderTest(VerificationCodeStorage::class);
        $uut->configure('lifetime', 300);
        $uut->mock(CacheItemPoolInterface::class)
            ->expects($this->once())
            ->method('getItem')
            ->with('test_hash')
            ->willReturn($item);
        $uut->mock(CacheItemPoolInterface::class)
            ->expects($this->once())
            ->method('save')
            ->with($item);

        $uut->target()->store('test_hash', '654321');
    }

    /**
     * Tests that retrieve method returns return null if item is not found.
     */
    #[Test]
    public function retrieveNonExistentItem(): void
    {
        $item = $this->mockCacheItem(isHit: false);
        $uut = new UnitUnderTest(VerificationCodeStorage::class);
        $uut->mock(CacheItemPoolInterface::class)
            ->expects($this->once())
            ->method('getItem')
            ->with('test_hash')
            ->willReturn($item);

        $result = $uut->target()->retrieve('test_hash');
        $this->assertNull($result, 'Expected null for non-existent item');
    }

    /**
     * Tests that retrieve method returns the stored code and deletes the item.
     */
    #[Test]
    public function retrieveExistingItem(): void
    {
        $item = $this->mockCacheItem(isHit: true);
        $item->method('get')
            ->willReturn('123456');
        $item->method('isHit')
            ->willReturn(true);

        $uut = new UnitUnderTest(VerificationCodeStorage::class);
        $uut->mock(CacheItemPoolInterface::class)
            ->expects($this->once())
            ->method('getItem')
            ->with('test_hash')
            ->willReturn($item);
        $uut->mock(CacheItemPoolInterface::class)
            ->expects($this->once())
            ->method('deleteItem')
            ->with('test_hash');

        $result = $uut->target()->retrieve('test_hash');
        $this->assertSame('123456', $result, 'Expected to retrieve the stored verification code');
    }

    /**
     * Mock a cache item
     *
     * @param bool $isHit
     * @return CacheItemInterface&MockObject
     */
    private function mockCacheItem(bool $isHit): CacheItemInterface&MockObject
    {
        $item = $this->mock(CacheItemInterface::class);
        $item->method('isHit')->willReturn($isHit);

        return $item;
    }
}
