<?php

namespace App\Controllers;

class Route
{
    public function __construct(private string $method = '', private string $path = '', private \Closure $callback, private array $params = [], private string $name = '')
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): void 
    {
        $this->name = $name;
    }

    public function matches(string $method, string $path): bool
    {
        if ($this->method !== $method) {
            return false;
        }

        $regex = '#^' . preg_replace('#:([\w]+)#', '([^/]+)', $this->path) . '$#';
        if (!preg_match($regex, $path, $matches)) {
            return false;
        }

        array_shift($matches);
        $this->params = $matches;
        return true;
    }

    public function call(): void
    {
        call_user_func_array($this->callback, $this->params);
    }
}
