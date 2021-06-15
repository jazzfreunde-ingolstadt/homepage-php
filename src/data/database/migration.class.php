<?php

namespace Jazzfreunde\Database;

use Exception;
use Generator;

interface UpdateTaskCollection
{
    static function TasksToRun(): Generator;
}

final class Migration
{
    public function __construct(private Generator $registered_models)
    {
    }

    public function Update(Connection $database): void
    {
        try {   
            foreach ($this->registered_models as $task_version => $task) {
                if ($task_version >= '0.0.1')
                    if (!$task($database))
                        throw new Exception();
            }
            // Wenn erfolgreich setzte Versionsnummer hoch
        } catch (Exception $e) {
            // log
        }
    }
}