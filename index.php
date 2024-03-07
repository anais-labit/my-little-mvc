<?php

require_once 'vendor/autoload.php';

use App\Controllers\Router;

$router = new Router('/plateforme/pwd');


$router->addRoute('GET', '/', function () {
    require './ressources/views/register.php';
});

$router->addRoute('GET', '/register', function () {
    require './ressources/views/register.php';
});
$router->addRoute('POST', '/register', function () {

    require './ressources/views/login.php';
});

$router->addRoute('POST', '/login', function () {
    require './ressources/views/login.php';
});

$router->addRoute('GET', '/shop', function () {
    require './ressources/views/shop.php';
});

$router->addRoute('GET', '/product/:product_type/:id_product', function () {
    require './ressources/views/product.php';
});

// $router->addRoute('GET', '/product/:id', function ($id) {
//     require './ressources/views/product.php';
// });

$router->addRoute('GET', '/profile', function () {
    require './ressources/views/profile.php';
});

$router->addRoute('POST', '/profile', function () {
    require './ressources/views/profile.php';
});

// var_dump($_SERVER);
// var_dump($_SERVER['REQUEST_URI'], $path);
// if ($_SERVER['REQUEST_URI'] !== '/plateforme/pwd/') {
//     // match et je vérifie le chemin apres /plateforme/pwd/ et ensuite je concatenne 
//     $_SERVER['REQUEST_URI'] = '/plateforme/pwd/';
// } else {
//     $router->run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
// }

$router->run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
