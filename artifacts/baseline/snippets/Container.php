<?php

declare(strict_types=1);

final class Container
{
    private array $bindings = [];

    public function set(string $id, callable|object|string $concrete): void
    {
        $this->bindings[$id] = $concrete;
    }

    public function get(string $id)
    {
        if (!isset($this->bindings[$id])) {
            return new $id();
        }

        $entry = $this->bindings[$id];

        if (is_callable($entry)) {
            $this->bindings[$id] = $entry($this);
        }

        return $this->bindings[$id];
    }
}

