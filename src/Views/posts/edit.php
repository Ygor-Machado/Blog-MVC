<h2 class="mb-4">Editar Post</h2>

<form action="/posts/update/<?= $post->id ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= $post->title ?>" required>
    </div>

    <div class="form-group mt-3">
        <label for="content">Conteúdo</label>
        <textarea name="content" id="content" class="form-control" required><?= $post->content ?></textarea>
    </div>

    <div class="form-group mt-3">
        <label for="image">Imagem (opcional)</label>
        <input type="file" name="image" id="image" class="form-control">
        <?php if (!empty($post->image)): ?>
            <img src="/uploads/<?= $post->image ?>" alt="<?= $post->title ?>" class="img-thumbnail mt-2" style="height: 150px;">
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Atualizar</button>
</form>
