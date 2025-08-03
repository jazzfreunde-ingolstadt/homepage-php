<?php declare(strict_types=1);

namespace Jazzfreunde\UnitTest;

use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Generator\Generator as MockGenerator;
use ReflectionClass;
use ReflectionNamedType;

use function assert;
use function is_null;
use function array_key_exists;
use function array_map;

/**
 * @template T of object
 * Unit under test to speed up mocking.
 * @psalm-suppress UnusedClass
 */
final class UnitUnderTest
{
    /**
     * @var array<class-string, MockObject>
     */
    private array $mocks = [];

    /**
     * @var array<string, mixed> $constants
     */
    private array $constants = [];

    /**
     * @var class-string<T of object>
     */
    private string $class;

    /**
     * @var T|null
     */
    private object|null $unitUnderTest = null;

    /**
     * Create a new unit under test.
     *
     * @param class-string<T> $class
     */
    public function __construct(
        string $class,
    ) {
        $this->class = $class;
    }

    /**
     * Get the unit under test.
     *
     * @return T
     */
    public function target(): object
    {
        if (is_null($this->unitUnderTest)) {
            $this->constructTarget();
        }

        if (is_null($this->unitUnderTest)) {
            throw new LogicException("Unit under test for class '{$this->class}' is not initialized.");
        }

        return $this->unitUnderTest;
    }

    /**
     * Configure a mocked dependency.
     *
     * @template TMock
     * @param class-string<TMock> $class
     * @return TMock&MockObject
     * @psalm-suppress InternalClass, InternalMethod
     */
    public function mock(string $class): object
    {
        if (array_key_exists($class, $this->mocks)) {
            /**
             * @var TMock&MockObject $mock
             */
            $mock = $this->mocks[$class];
            return $mock;
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

    /**
     * Configure a constant for the unit under test.
     *
     * @param string $name
     * @param mixed $value
     */
    public function configure(string $name, mixed $value): void
    {
        if (array_key_exists($name, $this->constants)) {
            throw new LogicException("Constant '{$name}' is already configured.");
        }

        $this->constants[$name] = $value;
    }

    /**
     * Initialize the unit under test.
     *
     * @throws InvalidArgumentException If the constructor parameters are not type-hinted.
     */
    private function constructTarget(): void
    {
        $class = $this->class;
        $reflectionClass = new ReflectionClass($class);
        $constructor = $reflectionClass->getConstructor();

        $mocks = [];

        if (!is_null($constructor)) {
            $args = $constructor->getParameters();
            $mocks = array_map(
                function ($arg) use ($class) {
                    $type = $arg->getType();
                    if (is_null($type)) {
                        throw new InvalidArgumentException(
                            "Constructor parameter '{$arg->getName()}' of class '{$class}' has no type hint."
                        );
                    }

                    if (!$type instanceof ReflectionNamedType) {
                        if ($arg->isDefaultValueAvailable()) {
                            return $arg->getDefaultValue();
                        }

                        throw new InvalidArgumentException(
                            "Constructor parameter '{$arg->getName()}' of class '{$class}' cannot be automatically."
                        );
                    }

                    if ($type->isBuiltin()) {
                        if (!is_null($value = $this->getConfiguredConstant($arg->name))) {
                            return $value;
                        }

                        if ($arg->isDefaultValueAvailable()) {
                            return $arg->getDefaultValue();
                        }

                        return $this->mockBuiltInType($type);
                    }

                    $className = $type->getName();
                    return $this->mock($className);
                },
                $args
            );
        }
        
        /**
         * @psalm-suppress MixedMethodCall
         */
        $this->unitUnderTest = new $class(...$mocks);
    }

    /**
     * Get a configured constant or a mock of a built-in type.
     *
     * @param string $name
     * @return mixed
     */
    private function getConfiguredConstant(string $name): mixed
    {
        if (!array_key_exists($name, $this->constants)) {
            return null;
        }

        return $this->constants[$name];
    }

    /**
     * Mock a built-in type.
     *
     * @param ReflectionNamedType $type
     * @return mixed
     * @throws InvalidArgumentException
     */
    private function mockBuiltInType(ReflectionNamedType $type): mixed
    {
        if ($type->allowsNull()) {
            return null;
        }

        return match ($type->getName()) {
            'int' => 0,
            'string' => '',
            'bool' => false,
            'float' => 0.0,
            'array' => [],
            'object' => new \stdClass(),
            'callable' => static fn() => null,
            default => throw new InvalidArgumentException("Unsupported built-in type: '{$type}'"),
        };
    }
}
