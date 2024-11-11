<div class="post-details card shadow-sm p-4 mb-4">
    <?php if (!empty($post->image)): ?>
        <img src="/uploads/<?= $post->image ?>" alt="<?= $post->title ?>" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover; width: 100%;">
    <?php endif; ?>

    <h2 class="h4 mb-3"><?= $post->title ?></h2>

    <p class="text-muted mb-4">
        Publicado em <?= date('d/m/Y', strtotime($post->created_at)) ?>
    </p>

    <p class="post-content">
        <?= $post->content ?>
    </p>

    <a href="/" class="btn btn-secondary mt-4">Voltar para a lista de posts</a>
</div>
