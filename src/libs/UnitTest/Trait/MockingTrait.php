<?php declare(strict_types=1);

namespace Jazzfreunde\UnitTest\Trait;

use PHPUnit\Framework\MockObject\MockObject;

/**
 * Trait for mocking objects in tests.
 */
trait MockingTrait
{
    /**
     * @template T of object
     * @param class-string<T> $class
     * @return T&MockObject
     */
    protected function mock(string $class): MockObject
    {
        return $this->createMock($class);
    }
}
