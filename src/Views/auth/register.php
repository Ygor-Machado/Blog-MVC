<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>

    <body>
        <h1>Registrar</h1>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <form action="/register" method="POST">
            <input type="text" name="name" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Registrar</button>
        </form>

    </body>
</html>
