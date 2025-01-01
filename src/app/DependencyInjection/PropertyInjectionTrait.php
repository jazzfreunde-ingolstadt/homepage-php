<?php declare(strict_types = 1);

namespace Jazzfreunde\App\DependencyInjection;

use Jazzfreunde\App\Type\Primitive\PrimitiveTypeInterface;
use ReflectionProperty;

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

            try {
                $this->$name = $value;
            } catch (\TypeError $e) {
                $reflection = new ReflectionProperty(get_class($this), $name);
                $type = $reflection->getType();

                if (!$type instanceof \ReflectionNamedType
                || !is_subclass_of($type->getName(), PrimitiveTypeInterface::class, true)) {
                    throw $e;
                }

                $class = $type->getName();

                $this->$name = new $class($value);
            }
        });
    }
}
