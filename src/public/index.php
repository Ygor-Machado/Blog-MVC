<?php

session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

require_once __DIR__ . '/../Routes/routes.php';

\App\Core\Route::dispatch();