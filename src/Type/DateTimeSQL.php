<?php

namespace Jazzfreunde\Type;

use DateTime;

/**
 * Nativer __toString für DateTime-Objekte
 */
final class DateTimeSQL extends DateTime
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->format('Y-m-d H:i:s');
    }
}
