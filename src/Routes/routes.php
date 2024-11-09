<?php

use App\Controllers\PostController;

// Roteamento Provisório apenas para testar
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/posts':
        $controller = new PostController();
        $controller->index();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}
