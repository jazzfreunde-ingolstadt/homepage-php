<?php

namespace Jazzfreunde\Database;

abstract class Model implements UpdateTaskCollection
{
    public function __construct(protected Connection $database)
    {
    }

    public static function toCommaSeparatedList(array $values, bool $use_quotes = false): string
    {
        if ($use_quotes)
            return '\'' . implode('\', \'', $values) . '\'';

        return implode(', ', $values);
    }
}
