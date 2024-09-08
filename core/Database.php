<?php

declare(strict_types=1);

namespace Core;

use mysqli;
use mysqli_sql_exception;

class Database
{
    private string $host = 'localhost';
    private string $username = 'root';
    private string $password = '';
    private string $database = 'task';
    protected mysqli $connection;

    public function __construct()
    {
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        } catch (mysqli_sql_exception $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}
