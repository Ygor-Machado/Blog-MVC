<?php

namespace App\Controllers;

class Controller
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);

        $viewPath = __DIR__ . "/../Views/{$view}.php";

        if (file_exists($viewPath)) {

            ob_start();
            require $viewPath;
            $content = ob_get_clean();

            require __DIR__ . '/../Views/layout.php';
        } else {
            echo "View '{$view}' não encontrada!";
        }
    }


}