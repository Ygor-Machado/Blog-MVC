<h1 class="h4 mb-4">Registrar</h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form action="/register" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Nome" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>
