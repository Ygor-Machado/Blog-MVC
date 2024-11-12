<h2 class="mb-4">Meus Posts</h2>

<?php if (!empty($posts)): ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($posts as $post): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <?php if (!empty($post->image)): ?>
                        <img src="/uploads/<?= $post->image ?>" alt="<?= $post->title ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->title ?></h5>
                        <p class="card-text text-muted small">
                            <i class="bi bi-clock"></i> Criado em: <?= date('d/m/Y', strtotime($post->created_at)) ?>
                        </p>
                        <p class="card-text"><?= $post->content ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p class="text-muted">Você ainda não tem posts.</p>
<?php endif; ?>
