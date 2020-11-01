<?php

include_once dirname(__DIR__, 2) . '/env.php';

class Database {
    // DB Params
    protected $conn;

    // DB Connect
    public function connect()
    {
        $this->conn = null;
        $host = getenv("DB_HOST");
        $username = getenv("DB_USERNAME");
        $password = getenv("DB_PASSWORD");
        $db_name = getenv("DB_NAME");

        try {
            $this->conn = new PDO('mysql:host=' . $host . ';dbname=' . $db_name, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}