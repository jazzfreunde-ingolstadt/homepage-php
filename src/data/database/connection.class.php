<?php

namespace Jazzfreunde\Database;

use PDO;
use PDOException;
use PDOStatement;

final class Connection
{
    private ?PDO $conn = null;

    public function __construct(private Credentials $credentials)
    {
    }

    private function connect(Credentials $credentials): void
    {
        $this->conn = new PDO(
            "mysql:host={$credentials->host};dbname={$credentials->database}",
            $credentials->user,
            $credentials->password
        );
        $this->conn->exec("set names utf8");
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function GetConnection(): PDO
    {
        try {
            if (!$this->conn)
                $this->connect($this->credentials);
        } catch (\PDOException $e) {
            throw new ConnectionException($e->getMessage(), 0, $e);
        }
        return $this->conn;
    }

    public function fetch(string $class, string $query, ?array $parameters = null): array
    {
        try {
            $stmt = $this->GetConnection()->prepare($query);
            $stmt->execute($parameters);
        } catch (\PDOException $e) {
            throw new ConnectionException("Execution did not succeed. ${query}", 0, $e);
        }

        return $stmt->fetchall(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $query, ?array $parameters = null): void
    {
        try {
            $stmt = $this->GetConnection()->prepare($query);
            $stmt->execute($parameters);
        } catch (\PDOException $e) {
            throw new ConnectionException("Execution did not succeed. ${query}", 0, $e);
        }
    }
}

final class ConnectionException extends \Exception
{
}
