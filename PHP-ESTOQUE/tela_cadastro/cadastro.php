<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php
$erro    = isset($_GET['erro']);
$sucesso = isset($_GET['sucesso']);
$erro_senha = isset($_GET['erro']) && $_GET['erro'] === 'senha';
?>

<div class="home-wrapper">
    <div class="home-container">
        <h1>Cadastro</h1>

        <?php if ($erro): ?>
            <p class="mensagem-erro">
                ❌ Este email já está em uso.
            </p>
        <?php endif; ?>

        <?php if ($erro_senha): ?>
            <p class="mensagem-erro">
                ❌ Senha inválida! A senha deve ter no mínimo 8 caracteres, conter pelo menos uma letra maiúscula, um número e um caractere especial.
            </p>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <p class="mensagem-sucesso">
                ✅ Cadastro realizado com sucesso! Faça login.
            </p>
        <?php endif; ?>

        <form method="post" action="processa_cadastro.php">
            <input
                type="text"
                name="nome_completo"
                placeholder="Nome completo"
                required
            >

            <input
                type="email"
                name="email"
                placeholder="Email"
                required
            >

            <input
                type="password"
                name="senha"
                placeholder="Senha"
                required
            >

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>

<footer class="footer">
    <p>© 2026 – Sistema de Gestão de Estoque</p>
    <p>Criado e desenvolvido por Leticia Morais Ferreira</p>
    <p>Todos os direitos reservados</p>
</footer>

<?php if ($erro || $erro_senha): ?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector('input[name="email"]').value = "";
        document.querySelector('input[name="senha"]').value = "";
    });
</script>
<?php endif; ?>

</body>
</html>
