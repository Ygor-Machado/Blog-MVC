<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Meu Blog' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php require_once __DIR__ . '/header.php'; ?>

    <main class="container my-5">
        <?= $content ?? '' ?>
    </main>

    <footer class="bg-light text-center py-3 mt-5">
        <p>&copy; <?= date('Y') ?> Meu Blog. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
