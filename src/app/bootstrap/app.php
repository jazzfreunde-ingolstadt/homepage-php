<?php

namespace Jazzfreunde\App\Bootstrap;

use Jazzfreunde\Database\Connection;

final class App
{
    private Connection $database_connection;

    function __construct()
    {
    }

    public  function UseDatabaseContext(Connection $database): void {
        $this->database_connection = $database;
    }

    public function DatabaseContext(): Connection {
        return $this->database_connection;
    }
}
