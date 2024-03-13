<?php

namespace App\Controllers;

use App\Database;
use App\Models\Product;

/**
 * Class HomeController
 * Handles the display of the home page and product pages.
 */
class HomeController
{
    /**
     * @var Product The product model instance.
     */
    private Product $productModel;

    /**
     * HomeController constructor.
     * Initializes the product model.
     */
    public function __construct()
    {
        $db = new Database();
        $this->productModel = new Product($db);
    }

    /**
     * Displays the home page.
     */
    public function index(): void
    {
        $this->renderTemplate('homepage.php');
    }

    /**
     * Displays the product list page.
     */
    public function productList(): void
    {
        $products = $this->productModel->getAll();
        $this->renderTemplate('product-list.php', ['products' => $products]);
    }

    /**
     * Displays the product detail page.
     *
     * @param mixed $id The ID of the product.
     */
    public function productDetail(mixed $id): void
    {
        $product = $this->productModel->getById($id);
        $this->renderTemplate('product-detail.php', ['product' => $product]);
    }

    /**
     * Renders a template with the given data.
     *
     * @param string $template The template file name.
     * @param array $data The data to pass to the template.
     */
    private function renderTemplate(string $template, array $data = []): void
    {
        extract($data);

        include __DIR__ . '/../../templates/' . $template;
    }
}
