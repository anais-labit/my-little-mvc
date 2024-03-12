<?php

namespace App\Controllers;

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
        include __DIR__ . '/../../templates/homepage.php';
    }

    /**
     * Method to handle requests to the product list page.
     *
     * This method currently just echoes a string, but in a real application, it would likely fetch a list of products
     * from a database and include a template to display them.
     *
     * @return void
     */
    public function productList(): void
    {
        echo "Hello product list";
    }

    /**
     * Method to handle requests to individual product detail pages.
     *
     * This method currently just echoes a string with the product ID, but in a real application, it would likely fetch
     * the details of the specified product from a database and include a template to display them.
     *
     * @param mixed $id The ID of the product
     * @return void
     */
    public function productDetail(mixed $id): void
    {
        echo "Hello product with id: $id";
    }
}