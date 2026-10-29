<?php

declare(strict_types=1);

namespace Jazzfreunde\App\DependencyInjection;

use BackedEnum;
use Deprecated;
use InvalidArgumentException;
use Jazzfreunde\App\Type\Primitive\PrimitiveTypeInterface;
use Jazzfreunde\Util\ArrayUtil;
use LogicException;
use ReflectionClass;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionProperty;
use ReflectionType;
use ReflectionUnionType;

use function array_filter;
use function array_map;
use function array_reduce;
use function array_search;
use function array_walk;
use function call_user_func;
use function class_exists;
use function gettype;
use function implode;
use function is_a;
use function is_int;
use function is_null;
use function is_object;
use function is_string;
use function is_subclass_of;
use function key_exists;
use function property_exists;
use function str_contains;
use function str_starts_with;
use function strtolower;

/**
 * Trait to inject properties into an object.
 * As of the introduction of symfonies object mapper (https://symfony.com/doc/7.4/object_mapper.html) this trait is only used by Doctine ORM.
 */
trait PropertyInjectionTrait
{
    /**
     * @var array<string, ReflectionMethod> associative array of [property name => setter method]
     */
    private array $setterDictionary = [];

    /**
     * Property Injection.
     *
     * @param mixed ...$params
     *
     * @psalm-suppress UndefinedThisPropertyFetch
     *
     * @deprecated 2026-04-26 Use Symfony's Object Mapper instead
     */
    #[Deprecated(message: 'use symfony object mapper instead', since: '2026.04.26')]
    public function __construct(mixed ...$params)
    {
        if (!ArrayUtil::isAssociativeArray($params)) {
            throw new InvalidArgumentException('params must be an associative array');
        }

        $this->injectProperties($params);
    }

    /**
     * Serialize the object without any of the traits own technical properties.
     *
     * @return array<array-key, mixed>
     */
    public function __serialize(): array
    {
        return array_filter(
            get_object_vars($this),
            fn ($key) => 'setterDictionary' !== $key,
            ARRAY_FILTER_USE_KEY
        );
    }

    /**
     * Unserialize the object.
     *
     * @param array<array-key, mixed> $data
     */
    public function __unserialize(array $data): void
    {
        $this->injectProperties($data);
    }

    /**
     * Inject properties into the object.
     *
     * @param array<array-key, mixed> $kvp associative array of [property name => value]
     */
    protected function injectProperties(array $kvp): void
    {
        if (0 === count($kvp)) {
            return;
        }

        $this->createSetterDictionary();

        array_walk($kvp, function (mixed $value, int|string $name) {
            if (is_int($name)) {
                throw new LogicException('Cannot pass property without name.');
            }
            if (!property_exists($this, $name)) {
                $className = static::class;

                throw new LogicException("Property {$name} does not exist in class {$className}.");
            }

            $types = $this->getPropertyTypes($name);

            if ($this->trySetNull($name, $types, $value)
                || $this->trySetEnum($name, $types, $value)
                || $this->trySetPrimitiveType($name, $types, $value)
                || $this->trySetBuiltInType($name, $types, $value)
            ) {
                return;
            }

            $this->throwError($name, $types, $value);
        });
    }

    /**
     * Try setting null.
     *
     * @param string   $name
     * @param string[] $types
     * @param mixed    $value
     *
     * @return bool whether the value was accepted
     */
    private function trySetNull(
        string $name,
        array $types,
        mixed $value
    ): bool {
        if (is_null($value)
        && false !== array_search('null', $types)) {
            $this->setValue($name, $value);

            return true;
        }

        return false;
    }

    /**
     * Try setting a built in type.
     *
     * @param string   $name
     * @param string[] $types
     * @param mixed    $value
     *
     * @return bool whether the value was accepted
     */
    private function trySetBuiltInType(
        string $name,
        array $types,
        mixed $value
    ): bool {
        $shortType = gettype($value);
        $typeName = match ($shortType) {
            'integer' => 'int',
            'boolean' => 'bool',
            'double' => 'float',
            default => $shortType,
        };

        foreach ($types as $type) {
            if ($type === $typeName) {
                $this->setValue($name, $value);

                return true;
            }

            if (is_object($value)) {
                if (str_contains($type, '&')) {
                    /** @var class-string[] */
                    $intersectionTypes = explode('&', $type);
                    $fullfillsIntersection = array_reduce(
                        $intersectionTypes,
                        /**
                         * @param bool         $carry            do all types match
                         * @param class-string $intersectionType
                         *
                         * @return bool
                         */
                        function (bool $carry, string $intersectionType) use ($value): bool {
                            return $carry && is_a($value, $intersectionType, true);
                        },
                        true
                    );

                    if (!$fullfillsIntersection) {
                        continue;
                    }
                } elseif (!(class_exists($type, true) || interface_exists($type, true))
                    || !is_a($value, $type, true)) {
                    continue;
                }

                $this->setValue($name, $value);

                return true;
            }
        }

        return false;
    }

    /**
     * Try setting an enum type.
     *
     * @param string   $name
     * @param string[] $types
     * @param mixed    $value
     *
     * @return bool whether the value was accepted
     */
    private function trySetEnum(
        string $name,
        array $types,
        mixed $value
    ): bool {
        foreach ($types as $type) {
            if (is_subclass_of($type, BackedEnum::class, true)) {
                if ((is_object($value) || is_string($value)) && is_a($value, $type, true)) {
                    $this->setValue($name, $value);

                    return true;
                }

                if (!is_int($value) && !is_string($value)) {
                    continue;
                }

                /** @var null|BackedEnum */
                $enum = call_user_func([$type, 'tryFrom'], $value);

                if (is_null($enum)) {
                    continue;
                }

                $this->setValue($name, $enum);

                return true;
            }
        }

        return false;
    }

    /**
     * Try setting a primitive type.
     *
     * @param string   $name
     * @param string[] $types
     * @param mixed    $value
     *
     * @return bool whether the value was accepted
     */
    private function trySetPrimitiveType(
        string $name,
        array $types,
        mixed $value
    ): bool {
        foreach ($types as $type) {
            if (is_subclass_of($type, PrimitiveTypeInterface::class, true)) {
                /** @var null|PrimitiveTypeInterface */
                $primitive = call_user_func([$type, 'tryFrom'], $value);

                if (is_null($primitive)) {
                    continue;
                }

                $this->setValue($name, $primitive);

                return true;
            }
        }

        return false;
    }

    /**
     * Throw a value error.
     *
     * @param string   $name
     * @param string[] $types
     * @param mixed    $value
     *
     * @throws InvalidArgumentException if the value does not match the type
     */
    private function throwError(
        string $name,
        array $types,
        mixed $value,
    ): void {
        $valueType = gettype($value);
        $propertyTypeString = implode('|', $types);

        throw new InvalidArgumentException("Property '{$name}' must be of type '{$propertyTypeString}', '{$valueType}' given.");
    }

    /**
     * Get the types of a propertyas string representation.
     *
     * @param string $propertyName
     *
     * @return string[]
     */
    private function getPropertyTypes(string $propertyName): array
    {
        $types = [];

        $property = new ReflectionProperty(static::class, $propertyName);
        $propertyType = $property->getType();

        if ($propertyType instanceof ReflectionNamedType) {
            $types[] = $propertyType->getName();
        }

        if ($propertyType instanceof ReflectionUnionType) {
            foreach ($propertyType->getTypes() as $type) {
                if ($type instanceof ReflectionIntersectionType) {
                    $types[] = $this->getIntersectionType($type);

                    continue;
                }

                $types[] = $type->getName();
            }
        }

        if ($propertyType instanceof ReflectionIntersectionType) {
            $types[] = $this->getIntersectionType($propertyType);
        }

        if ($propertyType?->allowsNull()) {
            $types[] = 'null';
        }

        return $types;
    }

    /**
     * Get the type as string.
     *
     * @param ReflectionIntersectionType $type
     *
     * @return string
     */
    private function getIntersectionType(ReflectionIntersectionType $type): string
    {
        return implode('&', array_map(
            fn (ReflectionType $t) => (string) $t,
            $type->getTypes()
        ));
    }

    /**
     * Set a value to a property
     * Prefers setter method if available.
     *
     * @param string $propertyName
     * @param mixed  $value
     */
    private function setValue(string $propertyName, mixed $value): void
    {
        $key = strtolower($propertyName);
        if (key_exists($key, $this->setterDictionary)) {
            $setter = $this->setterDictionary[$key];
            $setter->invoke($this, $value);

            return;
        }

        if (property_exists($this, $propertyName)) {
            $this->{$propertyName} = $value;

            return;
        }

        throw new LogicException(
            sprintf("Property '%s' does not exist in class '%s'.", $propertyName, static::class)
        );
    }

    /**
     * Create a dictionary of setter methods.
     */
    private function createSetterDictionary(): void
    {
        $reflectionClass = new ReflectionClass(static::class);
        $setterMethods = array_filter(
            $reflectionClass->getMethods(),
            fn ($method) => str_starts_with(strtolower($method->getName()), 'set')
                && 'setValue' !== $method->getName()
        );

        array_walk($setterMethods, function (ReflectionMethod $method) {
            $name = strtolower(substr($method->getName(), 3));
            $this->setterDictionary[$name] = $method;
        });
    }
}
