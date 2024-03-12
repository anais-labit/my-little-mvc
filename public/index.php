<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Router;

// Create a new router
$router = new Router();

// Add routes to the router
$router->addRoute('GET', '', function() {
    echo "Hello homepage";
});
$router->addRoute('GET', 'product', function() {
    echo "Hello product list";
});
$router->addRoute('GET', 'product/:id', function($id) {
    echo "Hello product with id: " . $id;
});

// Run the router
$router->run();