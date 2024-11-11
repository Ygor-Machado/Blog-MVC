<?php
    use App\Services\AuthService;

    $authService = new AuthService();
?>

<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3">Meu Blog</h1>

            <nav class="d-flex gap-3">
                <a href="/" class="text-white">Posts</a>
                <?php if ($authService->checked()): ?>
                    <a href="/dashboard" class="text-white">Dashboard</a>
                <?php endif; ?>
            </nav>

            <div>
                <?php if ($authService->checked()): ?>
                    <span class="me-3">Bem-vindo, <?= $authService->user()->name ?></span>
                    <form action="/logout" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-link text-white p-0" style="text-decoration: none;">Sair</button>
                    </form>
                <?php else: ?>
                    <a href="/login" class="text-white me-3">Login</a>
                    <a href="/register" class="text-white">Registrar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
