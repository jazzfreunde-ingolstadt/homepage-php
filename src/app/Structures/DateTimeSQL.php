<?php

namespace Jazzfreunde\App\Structures;

use DateTime;

final class DateTimeSQL extends DateTime {
    function __toString()
    {
        return $this->format('Y-m-d H:i:s');
    }
}