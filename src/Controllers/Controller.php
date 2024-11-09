<?php

namespace App\Controllers;

class Controller
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);

        $viewPath = __DIR__ . "/../Views/{$view}.php";

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "View '{$view}' não encontrada!";
        }
    }

}