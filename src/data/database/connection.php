<?php

namespace Jazzfreunde\Database;

use PDO;
use PDOException;

final class Connection
{
    private PDO $conn;

    public function __construct(private Credentials $credentials)
    {
    }

    public function GetConnection(): PDO
    {
        try {
            if (!$this->conn)
                $this->connect($this->credentials);
        } catch (\PDOException $e) {
            throw new ConnectionException($e->getMessage());
        }
        return $this->conn;
    }

    private function connect(Credentials $credentials): void
    {
        $this->conn = new PDO(
            "mysql:host={$credentials->host};dbname={$credentials->database}",
            $credentials->user,
            $credentials->password
        );
        $this->conn->exec("set names utf8");
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

final class ConnectionException extends \Exception
{
}
