<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Router;

// Create a new router and controller
$router = new Router();
$homeController = new HomeController();

// Add routes to the router
$router->addRoute('GET', '', [$homeController, 'index']);
$router->addRoute('GET', 'product', [$homeController, 'productList']);
$router->addRoute('GET', 'product/:id', [$homeController, 'productDetail']);

// Run the router
$router->run();
