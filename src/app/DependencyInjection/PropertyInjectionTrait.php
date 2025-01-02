<?php declare(strict_types = 1);

namespace Jazzfreunde\App\DependencyInjection;

use BackedEnum;
use InvalidArgumentException;
use Jazzfreunde\App\Type\Primitive\PrimitiveTypeInterface;
use Reflection;
use ReflectionIntersectionType;
use ReflectionNamedType;
use ReflectionProperty;
use ReflectionUnionType;

use function array_walk;
use function gettype;
use function is_int;
use function property_exists;
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
     * Property Injection
     *
     * @param mixed ...$params
     * @psalm-suppress UndefinedThisPropertyFetch
     */
    public function __construct(mixed ...$params)
    {
        array_walk($params, function (mixed $value, string|int $name) {
            if (is_int($name)) {
                throw new \LogicException("Cannot pass property without name.");
            }
            if (!property_exists($this, $name)) {
                throw new \LogicException("Property {$name} does not exist in class {$this->class}.");
            }

            $types = $this->getPropertyTypes($name);

            $this
            ->trySetNull($name, $types, $value)
            ?->trySetEnum($name, $types, $value)
            ?->trySetPrimitiveType($name, $types, $value)
            ?->trySetBuildInType($name, $types, $value)
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
            $this->$name = $value;
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
    private function trySetBuildInType(
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
                $this->$name = $value;
                return null;
            }

            if (is_object($value)) {
                if (str_contains($type, '&')) {
                    $intersectionTypes = explode('&', $type);
                    $fullfillsIntersection = array_reduce(
                        $intersectionTypes,
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

                $this->$name = $value;
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
                    $this->$name = $value;
                    return null;
                }

                /** @var BackedEnum|null */
                    $enum = call_user_func([$type, 'tryFrom'], $value);

                if (is_null($enum)) {
                    continue;
                }

                    $this->$name = $enum;
                    return null;
            }
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

                $this->$name = $primitive;
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
}
