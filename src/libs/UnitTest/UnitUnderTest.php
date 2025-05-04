<?php declare(strict_types=1);

namespace Jazzfreunde\UnitTest;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Generator\Generator as MockGenerator;
use ReflectionClass;

/**
 * @template T
 * Unit under test to speed up mocking.
 */
final class UnitUnderTest
{
    /**
     * @var array<string, MockObject>
     */
    private array $mocks = [];

    /**
     * @var T
     */
    private object $unitUnderTest;

    /**
     * Create a new unit under test.
     *
     * @param class-string<T> $class
     */
    public function __construct(string $class)
    {
        $reflectionClass = new ReflectionClass($class);
        $constructor = $reflectionClass->getConstructor();
        $args = $constructor->getParameters();
        $mocks = array_map(
            function ($arg) {
                $type = $arg->getType();
                if ($type === null) {
                    return null;
                }
                
                return $this->mock($type->getName());
            },
            $args
        );
        
        $this->unitUnderTest = new $class(...$mocks);
    }

    /**
     * Get the unit under test.
     *
     * @return T
     */
    public function target(): object
    {
        return $this->unitUnderTest;
    }

    /**
     * Configure a mocked dependency.
     *
     * @template TMock
     * @param class-string<TMock> $class
     * @return TMock&MockObject
     * @throws InvalidArgumentException
     * @throws MockObjectException
     * @throws NoPreviousThrowableException
     */
    public function mock(string $class): object
    {
        if (array_key_exists($class, $this->mocks)) {
            return $this->mocks[$class];
        }

        $mock = (new MockGenerator)->testDouble(
            $class,
            true,
            callOriginalConstructor: false,
            callOriginalClone: false,
            cloneArguments: false,
            allowMockingUnknownTypes: false,
        );

        assert($mock instanceof $class);
        assert($mock instanceof MockObject);

        $this->mocks[$class] = $mock;

        return $mock;
    }
}
