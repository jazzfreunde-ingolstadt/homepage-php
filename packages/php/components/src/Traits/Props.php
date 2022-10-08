<?php

declare(strict_types=1);

namespace Components\Traits;

use Components\Props\Props as DefaultProps;

trait Props
{
    /**
     * @param DefaultProps $props
     */
    public function __construct(
        protected ?DefaultProps $props = null
    ) {
    }
}
