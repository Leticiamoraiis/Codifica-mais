<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php $erro = isset($_GET['erro']); ?>

<div class="home-wrapper">
    <div class="home-container">
        <h1>Login</h1>

        <?php if ($erro): ?>
            <p class="mensagem-erro">
                ❌ Email ou senha inválidos.
            </p>
        <?php endif; ?>

        <form method="post" action="processa_login.php" autocomplete="off">
            <input type="email" name="email" placeholder="Email" required autofocus>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</div>

<footer class="footer">
    <p>© 2026 – Sistema de Gestão de Estoque</p>
    <p>Criado e desenvolvido por Leticia Morais Ferreira</p>
    <p>Todos os direitos reservados.</p>
</footer>

<?php if ($erro): ?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector('input[name="email"]').value = "";
        document.querySelector('input[name="senha"]').value = "";
    });
</script>
<?php endif; ?>

</body>
</html>
