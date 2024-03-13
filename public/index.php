<?php

// Include the Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Import the necessary classes
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Router;

/**
 * Initialize the routes for the application.
 *
 * @param Router $router The router instance.
 * @param HomeController $homeController The home controller instance.
 * @param AuthController $authController The authentication controller instance.
 */
function initializeRoutes(Router $router, HomeController $homeController, AuthController $authController): void
{
    // Home page route
    $router->addRoute('GET', '', [$homeController, 'index']);
    // Product list page route
    $router->addRoute('GET', 'product', [$homeController, 'productList']);
    // Product detail page route
    $router->addRoute('GET', 'product/:id', [$homeController, 'productDetail']);
    // Registration page route (GET request)
    $router->addRoute('GET', 'register', [$authController, 'register']);
    // Registration action route (POST request)
    $router->addRoute('POST', 'register', [$authController, 'register']);
    // Login page route (GET request)
    $router->addRoute('GET', 'login', [$authController, 'login']);
    // Login action route (POST request)
    $router->addRoute('POST', 'login', [$authController, 'login']);
    // Logout action route
    $router->addRoute('GET', 'logout', [$authController, 'logout']);
}

// Create instances of the router and controllers
$router = new Router();
$homeController = new HomeController();
$authController = new AuthController();

// Initialize the routes
initializeRoutes($router, $homeController, $authController);

// Run the router
$router->run();
