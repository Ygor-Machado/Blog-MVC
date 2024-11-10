<?php

namespace App\Core;

class Request
{
    private array $data;

    public function __construct()
    {
        $this->data = $_POST;
    }

    public function input(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function all(): array
    {
        return $this->data;
    }
}