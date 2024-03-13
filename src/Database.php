<?php

namespace App;

use Dotenv\Dotenv;
use PDO;
use PDOException;

/**
 * Class Database
 * @package App
 */
class Database
{
    private string $host;
    private string $db_name;
    private string $username;
    private string $password;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
    }

    /**
     * Connect to the database.
     *
     * @return PDO
     */
    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";

        try {
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            exit("Connection error: " . $e->getMessage());
        }
    }
}