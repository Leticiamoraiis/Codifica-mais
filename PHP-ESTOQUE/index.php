<?php

session_start();
require_once 'database.php';

if (!isset($_SESSION['usuario_id'])) {
?>
 <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Gestão de Estoque</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

<div class="home-wrapper">
   <div class="home-container">
        <h1>Gestão de Estoque</h1>

        <div class="home-actions">
            <a href="tela_cadastro/login.php" class="login">Login</a>
            <a href="tela_cadastro/cadastro.php" class="cadastro">Cadastrar</a>
        </div>
    </div>
</div>

 </body> 
 </html>
 <?php 
exit;
 }

$rota = $_GET['rota'] ?? 'listar';

include 'header.php';

switch ($rota) {

    case 'cadastrar':
        include 'cadastrar.php';
        break;

    case 'editar':
        include 'editar.php';
        break;

    case 'salvar':
        require 'produtocontroller.php';
        salvarProduto($pdo);
        break;

    case 'atualizar':
        require 'produtocontroller.php';
        atualizarProduto($pdo);
        break;

    case 'excluir':
        require 'produtocontroller.php';
        excluirProduto($pdo);
        break;

    default:
        include 'listar.php';
}

include 'footer.php';