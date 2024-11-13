<?php
    use App\Services\AuthService;

    $authService = new AuthService();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Dashboard - Meu Blog' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding-top: 80px;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 15px 20px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #495057;
            color: #ffffff;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            padding-top: 80px;
        }
        header {
            width: calc(100% - 250px);
            position: fixed;
            top: 0;
            left: 250px;
            z-index: 1000;
            background-color: #343a40;
            color: #ffffff;
            padding: 15px 20px;
        }
        .logout-form {
            margin-top: auto;
            padding: 0 15px;
        }
        .logout-form button {
            margin-bottom: 15px;
            padding: 8px 0;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 class="text-center py-3">Dashboard</h2>
        <ul class="nav flex-column w-100">
            <li class="nav-item">
                <a class="nav-link" href="/posts/create">
                    <i class="fas fa-pencil-alt"></i> Criar Post
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/posts/user">
                    <i class="fas fa-list"></i> Mostrar Todos os Posts
                </a>
            </li>
        </ul>
        <form action="/logout" method="POST" class="text-center w-100 logout-form">
            <button type="submit" class="btn btn-outline-danger mt-auto w-100">Sair</button>
        </form>
    </div>

    <?= require_once 'header.php' ?>

    <main class="main-content">
        <?= $content ?? '' ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
