<?php

namespace App\Models;

use App\Database;
use PDO;

/**
 * Class Product
 * @package App\Models
 *
 * This class is responsible for fetching product data from the database.
 */
class Product
{
    /**
     * Fetch all products from the database.
     *
     * @return bool|array The fetched products as an associative array, or false on failure.
     */
    public function getAll(): bool|array
    {
        // Create a new Database instance
        $db = new Database();

        // Connect to the database
        $db->connect();
        $conn = $db->connect();

        // Prepare a SQL statement to fetch all products
        $stmt = $conn->prepare('SELECT * FROM products');

        // Execute the SQL statement
        $stmt->execute();

        // Fetch all products and return them as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fetch a product by its ID from the database.
     *
     * @param int $id The ID of the product to fetch.
     * @return bool|array The fetched product as an associative array, or false on failure.
     */
    public function getById(int $id): bool|array
    {
        // Create a new Database instance
        $db = new Database();

        // Connect to the database
        $db->connect();
        $conn = $db->connect();

        // Prepare a SQL statement to fetch the product by its ID
        $stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');

        // Bind the ID parameter to the SQL statement
        $stmt->bindParam(':id', $id);

        // Execute the SQL statement
        $stmt->execute();

        // Fetch the product and return it as an associative array
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}