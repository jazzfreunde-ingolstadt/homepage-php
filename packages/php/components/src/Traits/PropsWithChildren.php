<?php declare(strict_types=1);

namespace Components\Traits;

use Components\Component;
use Components\Props\PropsWithChildren as Props;

/**
 * Verwendet Props mit Kindekomponenten
 */
trait PropsWithChildren
{
    public Component $children;

    /**
     * @param DefaultProps $props
     */
    public function __construct(
        protected ?Props $props = null
    ) {
    }
}
