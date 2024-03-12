<?php

namespace App;

class Route
{
    // The path of the route
    private string $path;
    // The function to execute when the route is matched
    private $callback;
    // The HTTP method (GET, POST, etc.)
    private string $method;
    // An array to store the parameters from the path
    private array $params = [];

    /**
     * Create a new Route.
     *
     * @param string $method The HTTP method (GET, POST, etc.)
     * @param string $path The path of the route
     * @param callable $callback The function to execute when the route is matched
     */
    public function __construct(string $method, string $path, callable $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }

    /**
     * Check if the route matches the given method and URI.
     *
     * @param string $method The HTTP method (GET, POST, etc.)
     * @param string $uri The requested URI
     * @return bool True if the route matches, false otherwise
     */
    public function match(string $method, string $uri): bool
    {
        if ($this->method !== $method) {
            return false;
        }

        // Replace :params in the path with regex to capture the values
        $pathRegex = preg_replace('/:\w+/', '(\w+)', $this->path);
        $pathRegex = str_replace('/', '\/', $pathRegex);

        if (!preg_match('/^' . $pathRegex . '$/', $uri, $matches)) {
            return false;
        }

        // Remove the first match (which is the whole string)
        array_shift($matches);

        // Store the captured values in the params property
        $this->params = $matches;

        return true;
    }

    /**
     * Run the route's callback.
     */
    public function run(): void
    {
        // Pass the parameters to the callback function
        call_user_func_array($this->callback, $this->params);
    }
}