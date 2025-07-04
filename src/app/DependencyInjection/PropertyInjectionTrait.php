<?php declare(strict_types = 1);

namespace Jazzfreunde\App\DependencyInjection;

use BackedEnum;
use InvalidArgumentException;
use Jazzfreunde\App\Type\Primitive\PrimitiveTypeInterface;
use Jazzfreunde\Util\ArrayUtil;
use LogicException;
use ReflectionClass;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionProperty;
use ReflectionUnionType;

use function array_walk;
use function gettype;
use function is_int;
use function is_string;
use function str_contains;
use function str_starts_with;
use function class_exists;
use function strtolower;
use function array_reduce;
use function key_exists;
use function array_filter;
use function implode;
use function array_map;
use function array_search;
use function property_exists;
use function is_object;
use function is_null;
use function is_subclass_of;
use function call_user_func;
use function is_a;

/**
 * Trait zum schnellen Initialisieren von Objekten.
 */
trait PropertyInjectionTrait
{
    /**
     * @var array<string, ReflectionMethod> associative array of [property name => setter method]
     */
    private array $setterDictionary = [];

    /**
     * Property Injection
     *
     * @param mixed ...$params
     * @psalm-suppress UndefinedThisPropertyFetch
     */
    public function __construct(mixed ...$params)
    {
        if (!ArrayUtil::isAssociativeArray($params)) {
            throw new InvalidArgumentException('params must be an associative array');
        }

        $this->injectProperties($params);
    }

    /**
     * Serialize the object without any of the traits own technical properties
     *
     * @return array
     */
    public function __serialize(): array
    {
        $properties = array_filter(
            get_object_vars($this),
            fn($key) => 'setterDictionary' !== $key,
            ARRAY_FILTER_USE_KEY
        );

        return $properties;
    }

    /**
     * Unserialize the object
     *
     * @param array $data
     * @return void
     */
    public function __unserialize(array $data): void
    {
        $this->injectProperties($data);
    }

    /**
     * Inject properties into the object
     *
     * @param array $kvp associative array of [property name => value]
     * @return void
     */
    protected function injectProperties(array $kvp): void
    {
        if (count($kvp) === 0) {
            return;
        }

        $this->createSetterDictionary();
        
        array_walk($kvp, function (mixed $value, string|int $name) {
            if (is_int($name)) {
                throw new \LogicException("Cannot pass property without name.");
            }
            if (!property_exists($this, $name)) {
                $className = static::class;
                throw new \LogicException("Property {$name} does not exist in class {$className}.");
            }

            $types = $this->getPropertyTypes($name);

            $this
                ->trySetNull($name, $types, $value)
                ?->trySetEnum($name, $types, $value)
                ?->trySetPrimitiveType($name, $types, $value)
                ?->trySetBuiltInType($name, $types, $value)
                ?->tryObject($name, $types, $value)
                ?->throwError($name, $types, $value);
        });
    }

    /**
     * Try setting null
     *
     * @param string $name
     * @param string[] $types
     * @param mixed $value
     * @return self|null return self to continue chaining, return null to stop chaining
     */
    private function trySetNull(
        string $name,
        array $types,
        mixed $value
    ): self|null {
        if (is_null($value)
        && array_search('null', $types) !== false) {
            $this->setValue($name, $value);
            return null;
        }

        return $this;
    }

    /**
     * Try setting a built in type
     *
     * @param string $name
     * @param string[] $types
     * @param mixed $value
     * @return self|null return self to continue chaining, return null to stop chaining
     */
    private function trySetBuiltInType(
        string $name,
        array $types,
        mixed $value
    ): self|null {
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
                return null;
            }

            if (is_object($value)) {
                if (str_contains($type, '&')) {
                    /** @var class-string[] */
                    $intersectionTypes = explode('&', $type);
                    $fullfillsIntersection = array_reduce(
                        $intersectionTypes,
                        /**
                         * @param bool $carry do all types match
                         * @param class-string $intersectionType
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
                } elseif (!class_exists($type, true)
                    || !is_a($value, $type, true)) {
                    continue;
                }

                $this->setValue($name, $value);
                return null;
            }
        }

        return $this;
    }

    /**
     * Try setting an enum type
     *
     * @param string $name
     * @param string[] $types
     * @param mixed $value
     * @return self|null return self to continue chaining, return null to stop chaining
     */
    private function trySetEnum(
        string $name,
        array $types,
        mixed $value
    ): self|null {
        foreach ($types as $type) {
            if (is_subclass_of($type, BackedEnum::class, true)) {
                if (is_a($value, $type, true)) {
                    $this->setValue($name, $value);
                    return null;
                }

                if (!is_int($value) && !is_string($value)) {
                    continue;
                }

                /** @var BackedEnum|null */
                $enum = call_user_func([$type, 'tryFrom'], $value);

                if (is_null($enum)) {
                    continue;
                }

                $this->setValue($name, $enum);
                return null;
            }
        }

        return $this;
    }

    /**
     * Try setting an object type
     *
     * @param string $name
     * @param string[] $types
     * @param mixed $value
     * @return self|null return self to continue chaining, return null to stop chaining
     */
    private function tryObject(
        string $name,
        array $types,
        mixed $value
    ): self|null {
        foreach ($types as $type) {
            if (class_exists($type, true) && is_a($value, $type, true)) {
                $this->setValue($name, $value);
                return null;
            }

               continue;
        }

        return $this;
    }

    /**
     * Try setting a primitive type
     *
     * @param string $name
     * @param string[] $types
     * @param mixed $value
     * @return self|null return self to continue chaining, return null to stop chaining
     */
    private function trySetPrimitiveType(
        string $name,
        array $types,
        mixed $value
    ): self|null {
        foreach ($types as $type) {
            if (is_subclass_of($type, PrimitiveTypeInterface::class, true)) {
                /** @var PrimitiveTypeInterface|null */
                $primitive = call_user_func([$type, 'tryFrom'], $value);

                if (is_null($primitive)) {
                    continue;
                }

                $this->setValue($name, $primitive);
                return null;
            }
        }

        return $this;
    }

    /**
     * Throw a value error
     *
     * @param string $name
     * @param string[] $types
     * @param mixed $value
     * @return void Throws a ValueError if no type matched
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
     * Get the types of a propertyas string representation
     *
     * @param string $propertyName
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
     * Get the type as string
     *
     * @param ReflectionIntersectionType $type
     * @return string
     */
    private function getIntersectionType(ReflectionIntersectionType $type): string
    {
        return implode('&', array_map(
            fn(ReflectionNamedType $t) => $t->getName(),
            $type->getTypes()
        ));
    }

    /**
     * Set a value to a property
     * Prefers setter method if available
     *
     * @param string $propertyName
     * @param mixed $value
     * @return void
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
            $this->$propertyName = $value;
            return;
        }
        
        throw new \LogicException(
            sprintf("Property '%s' does not exist in class '%s'.", $propertyName, static::class)
        );
    }

    /**
     * Create a dictionary of setter methods
     *
     * @return void
     */
    private function createSetterDictionary(): void
    {
        $reflectionClass = new ReflectionClass(static::class);
        $setterMethods = array_filter(
            $reflectionClass->getMethods(),
            fn($method) => str_starts_with(strtolower($method->getName()), 'set')
                && $method->getName() !== 'setValue'
        );

        array_walk($setterMethods, function (ReflectionMethod $method) {
            $name = strtolower(substr($method->getName(), 3));
            $this->setterDictionary[$name] = $method;
        });
    }
}
