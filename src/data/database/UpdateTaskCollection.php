<?php

namespace Jazzfreunde\Database;

use Generator;

interface UpdateTaskCollection
{
    static function TasksToRun(): Generator;
}