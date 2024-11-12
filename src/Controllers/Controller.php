<?php

namespace App\Controllers;

class Controller
{
    protected function render(string $view, array $data = [], string $layout = 'layout'): void
    {
        extract($data);

        $viewPath = __DIR__ . "/../Views/{$view}.php";
        $layoutPath = __DIR__ . "/../Views/{$layout}.php";

        if (file_exists($viewPath)) {
            ob_start();
            require $viewPath;
            $content = ob_get_clean();

            if (file_exists($layoutPath)) {
                require $layoutPath;
            } else {
                echo "Layout '{$layout}' não encontrado!";
            }
        } else {
            echo "View '{$view}' não encontrada!";
        }
    }

}