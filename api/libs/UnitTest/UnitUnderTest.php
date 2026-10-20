<?php

declare(strict_types=1);

namespace Jazzfreunde\UnitTest;

use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\MockObject\Generator\Generator as MockGenerator;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionClass;
use ReflectionNamedType;
use stdClass;

use function array_key_exists;
use function array_map;
use function assert;
use function is_null;

/**
 * @template T of object
 * Unit under test to speed up mocking.
 *
 * @psalm-suppress UnusedClass
 */
final class UnitUnderTest
{
    /**
     * @var array<class-string, MockObject>
     */
    private array $mocks = [];

    /**
     * @var array<class-string, object>
     */
    private array $usedInstances = [];

    /**
     * @var array<string, mixed>
     */
    private array $configuredArguments = [];

    /**
     * @var class-string<T of object>
     */
    private string $class;

    /**
     * @var null|T
     */
    private ?object $unitUnderTest = null;

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
     * @template TMock of object
     *
     * @param class-string<TMock> $class
     *
     * @return MockObject&TMock
     *
     * @psalm-suppress InternalClass, InternalMethod, InvalidReturnType, InvalidReturnStatement
     */
    public function mock(string $class): object
    {
        if (array_key_exists($class, $this->mocks)) {
            // @var MockObject&TMock $mock
            return $this->mocks[$class];
        }

        /** @var MockObject&TMock $mock */
        $mock = (new MockGenerator())->testDouble(
            $class,
            mockObject: true,
            callOriginalConstructor: false,
            callOriginalClone: false,
        );

        assert($mock instanceof $class);
        assert($mock instanceof MockObject);

        $this->mocks[$class] = $mock;

        return $mock;
    }

    /**
     * Use a specific instance for a mocked dependency.
     *
     * @param class-string $class
     * @param object       $instance
     *
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function use(string $class, object $instance): void
    {
        $this->usedInstances[$class] = $instance;
    }

    /**
     * Configure a constructor argument for the unit under test.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function configure(string $name, mixed $value): void
    {
        if (array_key_exists($name, $this->configuredArguments)) {
            throw new LogicException("Constructor argument '{$name}' is already configured.");
        }

        $this->configuredArguments[$name] = $value;
    }

    /**
     * Initialize the unit under test.
     *
     * @throws InvalidArgumentException if the constructor parameters are not type-hinted
     *
     * @psalm-suppress MixedMethodCall
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
                    if (array_key_exists($arg->name, $this->configuredArguments)) {
                        return $this->configuredArguments[$arg->name];
                    }

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
                            "Constructor parameter '{$arg->getName()}' of class '{$class}' cannot be automatically mocked."
                        );
                    }

                    if ($type->isBuiltin()) {
                        if ($arg->isDefaultValueAvailable()) {
                            return $arg->getDefaultValue();
                        }

                        return $this->mockBuiltInType($type);
                    }

                    $className = $type->getName();

                    if (array_key_exists($className, $this->usedInstances)) {
                        return $this->usedInstances[$className];
                    }

                    return $this->mock($className);
                },
                $args
            );
        }

        $this->unitUnderTest = new $class(...$mocks);
    }

    /**
     * Mock a built-in type.
     *
     * @param ReflectionNamedType $type
     *
     * @return mixed
     *
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
            'object' => new stdClass(),
            'callable' => static fn () => null,
            default => throw new InvalidArgumentException("Unsupported built-in type: '{$type}'"),
        };
    }
}
