<?php

declare(strict_types=1);

namespace Components\Props;

use Closure;
use Components\Component;

class PropsWithChildren extends Props
{
    public Component $children;

    public function __construct(
        Component|Closure $children
    ) {
        if ($children instanceof Closure) {
            $children = Component::FromClosure($children);
        }

        $this->children = $children;
    }
}
