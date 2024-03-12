<?php

namespace App;

class Router
{
    // An array to store all the routes
    private array $routes = [];

    /**
     * Add a new route to the router.
     *
     * @param string $method The HTTP method (GET, POST, etc.)
     * @param string $path The path of the route
     * @param callable $callback The function to execute when the route is matched
     */
    public function addRoute(string $method, string $path, callable $callback): void
    {
        $this->routes[] = new Route($method, $path, $callback);
    }

    /**
     * Run the router, matching the current request to the routes and executing the corresponding callback.
     */
    public function run(): void
    {
        // Get the base path and the requested URI
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (str_contains($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = trim($uri, '/');

        // Get the request method
        $method = $_SERVER['REQUEST_METHOD'];

        // Loop through the routes and check if any match the current request
        foreach ($this->routes as $route) {
            if ($route->match($method, $uri)) {
                // If a match is found, run the callback and return
                $route->run();
                return;
            }
        }

        // If no match is found, send a 404 response
        $this->sendNotFoundResponse();
    }

    /**
     * Send a 404 Not Found response.
     */
    private function sendNotFoundResponse(): void
    {
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}