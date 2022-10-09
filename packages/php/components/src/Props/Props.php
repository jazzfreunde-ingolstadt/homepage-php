<?php

declare(strict_types=1);

namespace Components\Props;

/**
 * Generisches Klasse um Informationen an Komponenten weiterzugeben.
 */
class Props
{
    /**
     * Allgemeiner Getter für alle Props.
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        if (!property_exists($this, $name)) {
            throw new \LogicException("Prop mit dem Namen '$name' ist im aktuellen Kontext nicht vorhanden.");
        }

        return $this->$name;
    }
}
