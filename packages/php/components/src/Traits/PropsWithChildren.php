<?php declare(strict_types=1);

namespace Components\Traits;

use Components\Component;
use Components\Props\PropsWithChildren as Props;

trait PropsWithChildren {
    public Component $children;

    public function __construct(
        protected ?Props $props = null
    ) {
    }
}