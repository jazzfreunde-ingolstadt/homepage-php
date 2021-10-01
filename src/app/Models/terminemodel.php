<?php

namespace Jazzfreunde\App\Models;

use Jazzfreunde\Database;
use Jazzfreunde\Database\ConnectionException;
use Jazzfreunde\App\DTOs\Termin;

final class TermineModel extends Database\Model
{
    const table_name = 'termine';

    public function fetch(Database\Filter $filter): array
    {
        $table = self::table_name;

        try {
            $termine = $this->database->fetch(
                'Jazzfreunde\App\DTOs\Termin',
                "SELECT * FROM {$table}",
                null
            );
        } catch (ConnectionException $e) {
            // log
            return null;
        }

        return $termine;
    }

    public function new(Termin $termin): void
    {
        $table = self::table_name;
        $fieldnames = Database\Model::toCommaSeparatedList($termin->Fieldnames());
        $bind_param_names = Database\Model::toCommaSeparatedList($termin->BindParamNames());

        try {
            $this->database->execute(
                "INSERT INTO {$table} ({$fieldnames})
                    VALUES ({$bind_param_names})",
                $termin->Values()
            );
        } catch (ConnectionException $e) {
            var_dump($e);
            // log
        }
    }

    static function TasksToRun(): \Generator
    {
        yield '0.0.1' => function (Database\Connection $db): bool {
            $table = TermineModel::table_name;
            $db->execute("
                CREATE TABLE IF NOT EXISTS ${table} (
                    id INT NOT NULL AUTO_INCREMENT,
                    titel VARCHAR(255) NOT NULL,
                    subtitel VARCHAR(255),
                    start DATETIME NOT NULL,
                    end DATETIME NOT NULL,
                    ort VARCHAR(255),
                    link VARCHAR(255),
                    PRIMARY KEY(id)
                );
            ");

            return true;
        };
    }
}
