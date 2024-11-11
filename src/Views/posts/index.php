<h2 class="h4 mb-4">Lista de Posts</h2>

<?php if (!empty($posts)): ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($posts as $post): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <?php if (!empty($post->image)): ?>
                        <img src="/uploads/<?= $post->image ?>" alt="<?= $post->title ?>" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                    <?php endif; ?>

                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="/posts/<?= $post->id; ?>" class="text-decoration-none text-dark"><?= $post->title ?></a>
                        </h3>
                        <p class="card-text text-muted"><?= substr($post->content, 0, 100) ?>...</p>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">Publicado em <?= date('d/m/Y', strtotime($post->created_at)) ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p class="text-muted">Nenhum post encontrado.</p>
<?php endif; ?>
