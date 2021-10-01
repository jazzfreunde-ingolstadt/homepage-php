<?php

declare(strict_types=1);

namespace Components\Traits;

use Components\Props\Props as DefaultProps;

trait Props
{
    public function __construct(
        protected ?DefaultProps $props = null
    ) {
    }
}
