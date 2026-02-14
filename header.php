<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Estoque</title>
    <link rel="stylesheet" href="style.css?v=1">

</head>
<body>

<header>

 <p>Bem-vindo(a), <?= $_SESSION['usuario_nome'] ?></p>
    <a href="tela_cadastro/logout.php">Sair</a>

    <nav>
        <a href="index.php">Listar</a>
        <a href="index.php?rota=cadastrar">Cadastrar</a>
    </nav>
</header>

<main>

