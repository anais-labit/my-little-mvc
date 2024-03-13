<?php

namespace App;

use Dotenv\Dotenv;
use PDO;
use PDOException;

/**
 * Class Database
 * Handles the database connection.
 */
class Database
{
    /**
     * @var string The host of the database.
     */
    private string $host;

    /**
     * @var string The name of the database.
     */
    private string $db_name;

    /**
     * @var string The username for the database.
     */
    private string $username;

    /**
     * @var string The password for the database.
     */
    private string $password;

    /**
     * Database constructor.
     * Loads the environment variables and initializes the database credentials.
     */
    public function __construct()
    {
        $this->loadEnvVariables();

        $this->host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
    }

    /**
     * Loads the environment variables from the .env file.
     */
    private function loadEnvVariables(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
    }

    /**
     * Connects to the database and returns the connection.
     *
     * @return PDO The database connection.
     * @throws PDOException If the connection fails.
     */
    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";

        try {
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            throw new PDOException("Connection error: " . $e->getMessage());
        }
    }
}
