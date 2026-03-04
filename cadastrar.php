<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// PROTEÇÃO DE ACESSO
if (!isset($_SESSION['usuario_id'])) {
    header('Location: tela_cadastro/login.php');
    exit;
}
?>
<form action="produtocontroller.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="acao" value="salvar">

    <label>Nome</label><br>
    <input type="text" name="nome" required><br><br>

     <label>Descrição</label><br>
<textarea name="descricao" rows="4" cols="40" required></textarea><br><br>


    <label>Preço</label><br>
    <input type="text" name="preco" required><br><br>

    <label>Quantidade</label><br>
    <input type="number" name="quantidade" required><br><br>


    <label>Imagem</label><br>
    <input type="file" name="imagem"><br><br>

    <button type="submit">Salvar</button>
</form>
