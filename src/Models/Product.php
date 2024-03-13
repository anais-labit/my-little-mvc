<?php

namespace App\Models;

use App\Database;
use PDO;
use PDOStatement;

/**
 * Class Product
 * Handles the data access logic for products.
 */
class Product
{
    /**
     * @var PDO The database connection instance.
     */
    private PDO $db;

    /**
     * Product constructor.
     * Initializes the database connection.
     *
     * @param Database $db The database instance.
     */
    public function __construct(Database $db)
    {
        $this->db = $db->connect();
    }

    /**
     * Retrieves all products from the database.
     *
     * @return bool|array The products, or false on failure.
     */
    public function getAll(): bool|array
    {
        return $this->executeStatement('SELECT * FROM products')->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a product by its ID from the database.
     *
     * @param int $id The ID of the product.
     * @return bool|array The product, or false if not found.
     */
    public function getById(int $id): bool|array
    {
        $stmt = $this->executeStatement('SELECT * FROM products WHERE id = :id', ['id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            return false;
        }

        return $product;
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
