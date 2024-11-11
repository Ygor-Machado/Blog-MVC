<h2 class="h4 mb-4">Lista de Posts</h2>

<?php if (!empty($posts)): ?>
    <ul class="list-group">
        <?php foreach ($posts as $post): ?>
            <li class="list-group-item">
                <h3 class="h5">
                    <a href="/posts/<?= $post->id; ?>" class="text-decoration-none"><?= $post->title ?></a>
                </h3>
                <p><?= $post->content ?>...</p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-muted">Nenhum post encontrado.</p>
<?php endif; ?>
