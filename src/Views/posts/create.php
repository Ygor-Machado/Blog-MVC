<h2 class="h4 mb-4">Criar Novo Post</h2>

<form action="/posts" method="POST" enctype="multipart/form-data" class="mb-5">
    <div class="form-group mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="content" class="form-label">Conteúdo</label>
        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
    </div>

    <div class="form-group mb-3">
        <label for="image" class="form-label">Imagem</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Salvar Post</button>
    <a href="/" class="btn btn-secondary ml-2">Cancelar</a>
</form>
