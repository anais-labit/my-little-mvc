<?php

namespace App;

/**
 * Class Router
 * Handles the routing logic for the application.
 */
class Router
{
    /**
     * @var array The routes of the application.
     */
    private array $routes = [];

    /**
     * Adds a route to the application.
     *
     * @param string $method The HTTP method of the route.
     * @param string $path The path of the route.
     * @param callable $callback The callback to execute when the route is matched.
     */
    public function addRoute(string $method, string $path, callable $callback): void
    {
        $this->routes[] = new Route($method, $path, $callback);
    }

    /**
     * Runs the application by matching and executing the appropriate route.
     */
    public function run(): void
    {
        $uri = $this->getUri();
        $method = $this->getMethod();

        foreach ($this->routes as $route) {
            if ($route->match($method, $uri)) {
                $route->run();
                return;
            }
        }

        $this->sendNotFoundResponse();
    }

    /**
     * Sends a 404 Not Found response.
     */
    private function sendNotFoundResponse(): void
    {
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }

    /**
     * Retrieves the URI of the current request.
     *
     * @return string The URI.
     */
    private function getUri(): string
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (str_contains($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        return trim($uri, '/');
    }

    /**
     * Retrieves the HTTP method of the current request.
     *
     * @return string The HTTP method.
     */
    private function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
