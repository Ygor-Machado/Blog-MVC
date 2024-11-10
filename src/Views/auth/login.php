<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <form action="/login" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Login</button>
        </form>
    </body>
</html>
