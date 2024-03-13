<?php

namespace App\Models;

use App\Database;
use PDO;
use PDOStatement;

/**
 * Class User
 * Handles the data access logic for users.
 */
class User
{
    /**
     * @var PDO The database connection instance.
     */
    private PDO $db;

    /**
     * User constructor.
     * Initializes the database connection.
     *
     * @param Database $db The database instance.
     */
    public function __construct(Database $db)
    {
        $this->db = $db->connect();
    }

    /**
     * Retrieves a user by its username from the database.
     *
     * @param string $username The username of the user.
     * @return bool|array The user, or false if not found.
     */
    public function findByUsername(string $username): bool|array
    {
        $stmt = $this->executeStatement('SELECT * FROM users WHERE username = :username', ['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        return $user;
    }

    /**
     * Creates a new user in the database.
     *
     * @param string $username The username of the new user.
     * @param string $password The password of the new user.
     * @return int The ID of the newly created user.
     */
    public function create(string $username, string $password): int
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->executeStatement('INSERT INTO users (username, password) VALUES (:username, :password)', ['username' => $username, 'password' => $passwordHash]);

        return $this->db->lastInsertId();
    }

    /**
     * Executes a SQL statement with the given parameters.
     *
     * @param string $sql The SQL statement.
     * @param array $params The parameters for the SQL statement.
     * @return bool|PDOStatement The statement, or false on failure.
     */
    private function executeStatement(string $sql, array $params = []): bool|PDOStatement
    {
        $stmt = $this->db->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmt->execute();

        return $stmt;
    }
}
