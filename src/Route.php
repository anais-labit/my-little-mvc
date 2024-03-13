<?php

namespace App;

/**
 * Class Route
 * Handles the routing logic for the application.
 */
class Route
{
    /**
     * @var string The path of the route.
     */
    private string $path;

    /**
     * @var callable The callback to execute when the route is matched.
     */
    private $callback;

    /**
     * @var string The HTTP method of the route.
     */
    private string $method;

    /**
     * @var array The parameters for the route.
     */
    private array $params = [];

    /**
     * Route constructor.
     * Initializes the route with the given method, path, and callback.
     *
     * @param string $method The HTTP method of the route.
     * @param string $path The path of the route.
     * @param callable $callback The callback to execute when the route is matched.
     */
    public function __construct(string $method, string $path, callable $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }

    /**
     * Checks if the route matches the given method and URI.
     *
     * @param string $method The HTTP method to match.
     * @param string $uri The URI to match.
     * @return bool True if the route matches, false otherwise.
     */
    public function match(string $method, string $uri): bool
    {
        if ($this->method !== $method) {
            return false;
        }

        $pathRegex = $this->createPathRegex();

        if (!preg_match('/^' . $pathRegex . '$/', $uri, $matches)) {
            return false;
        }

        $this->params = $matches[1] ?? [];

        return true;
    }

    /**
     * Executes the callback of the route with the matched parameters.
     */
    public function run(): void
    {
        call_user_func_array($this->callback, $this->params);
    }

    /**
     * Creates a regular expression from the path of the route.
     *
     * @return string The regular expression.
     */
    private function createPathRegex(): string
    {
        $pathRegex = preg_replace('/:\w+/', '(\w+)', $this->path);
        return str_replace('/', '\/', $pathRegex);
    }
}
