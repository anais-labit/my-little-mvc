<?php

require_once 'vendor/autoload.php';

use AltoRouter;

$router = new AltoRouter();
$router->setBasePath('/plateforme/pwd');

$router->map('GET', '/', function () {
    echo "Hello homepage";
});

$router->map('GET', '/product', function () {
    echo "Hello products list";
});

$router->map('GET', '/product/[i:id]', function ($id) {
    echo "Hello product with id : $id";
});

$match = $router->match();

if ($match) {
    call_user_func_array($match['target'], $match['params']);
} else {
    echo "404 Not Found";
}
