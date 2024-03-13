<?php

namespace App\Controllers;

use App\Models\Product;

/**
 * Class HomeController
 * @package App\Controllers
 *
 * This class is responsible for handling requests related to the home page and product pages.
 */
class HomeController
{
    /**
     * Method to handle requests to the home page.
     *
     * This method includes the home page template which is responsible for rendering the home page.
     *
     * @return void
     */
    public function index(): void
    {
        // Include the home page template
        include __DIR__ . '/../../templates/homepage.php';
    }

    /**
     * Method to handle requests to the product list page.
     *
     * This method fetches a list of products from the database and includes a template to display them.
     *
     * @return void
     */
    public function productList(): void
    {
        $productModel = new Product();

        $products = $productModel->getAll();

        include __DIR__ . '/../../templates/product-list.php';
    }

    /**
     * Method to handle requests to individual product detail pages.
     *
     * This method fetches the details of the specified product from the database and includes a template to display them.
     *
     * @param mixed $id The ID of the product
     * @return void
     */
    public function productDetail(mixed $id): void
    {
        $productModel = new Product();

        $product = $productModel->getById($id);

        include __DIR__ . '/../../templates/product-detail.php';
    }
}