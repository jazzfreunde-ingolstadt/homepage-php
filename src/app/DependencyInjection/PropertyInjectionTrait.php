<?php declare(strict_types = 1);

namespace Jazzfreunde\App\DependencyInjection;

/**
 * Trait zum schnellen Initialisieren von Objekten.
 */
trait PropertyInjectionTrait
{
    /**
     * Property Injection
     *
     * @param mixed ...$params
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

            $this->$name = $value;
        });
    }
}
