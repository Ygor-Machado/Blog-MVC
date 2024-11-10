<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Posts</title>
</head>
<body>
<h1>Posts</h1>

<?php if (!empty($posts)): ?>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <h2><?= $post->title; ?></h2>
                <p><?= $post->content; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Nenhum post encontrado.</p>
<?php endif; ?>
</body>
</html>
