<?php

namespace App\Controllers;

use App\Controllers\Route;

class Router
{
    public function __construct(private string $basePath = '', private array $routes = [], private ?string $page = null)
    {
        $this->basePath = $basePath;
    }

    public function addRoute(string $method, string $path, \Closure $callback): Route
    {
        $route = new Route($method, $path, $callback);
        $this->routes[] = $route;
        return $route;
    }

    public function createUrl(string $routeName, array $params = [], string $path = ''): string|null
    {

        var_dump($this->routes);


        foreach ($this->routes as $route) {
            if ($route->getName() === $routeName) {
                // var_dump($this->basePath . $route->getUrl($params));
                return $this->basePath . $route->getUrl($params);
            } elseif ($route->getPath() === $path) {
                var_dump($route->getUrl());
                return $this->basePath . $route->getUrl($params);
            }
        }
        return null;
    }

    public function run(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $path = str_replace($this->basePath, '', $uri);

        foreach ($this->routes as $route) {
            if ($route->matches($method, $path)) {
                $route->call();
                return;
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
