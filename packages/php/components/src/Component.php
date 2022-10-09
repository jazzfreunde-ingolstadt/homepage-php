<?php

declare(strict_types=1);

namespace Components;

use Closure;

abstract class Component
{
    /**
     * Erzeugt aus der übergebenen Closure eine Komponente
     *
     * @param Closure|null $closure_component
     * @return Component
     */
    public static function FromClosure(?Closure $closure_component): Component
    {
        return new class($closure_component) extends Component
        {
            public function __construct(private Closure $closure_component)
            {
            }

            public function Render(): void
            {
                $exec = $this->closure_component;
                $exec();
            }
        };
    }

    /**
     * Hauptmethode, die den Inhalt der Komponente erzeugt
     * 
     * @return void
     */
    public abstract function Render(): void;

    /**
     * Die Komponente rendert auch als String
     *
     * @return string
     */
    public function __toString(): string
    {
        ob_start();
        $this(null);
        $buffer = ob_get_contents();
        ob_end_clean();

        return $buffer;
    }

    /**
     * Rendert die Komponente
     *
     * @param mixed $args Kann in Komponenten verwendet werden, um vor dem Rendern Argumente zu übergeben.
     * @return void
     */
    public function __invoke(mixed $args)
    {
        $this->Render();
    }
}
