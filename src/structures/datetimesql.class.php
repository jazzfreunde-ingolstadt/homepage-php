<?php

namespace Jazzfreunde\Structures;

final class DateTimeSQL extends \DateTime {
    function __toString()
    {
        return $this->format('Y-m-d H:i:s');
    }
}