<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// PROTEÇÃO DE ACESSO
if (!isset($_SESSION['usuario_id'])) {
    header('Location: tela_cadastro/login.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id=?");
$stmt->execute([$_GET['id']]);
$p = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h2>Editar Produto</h2>

<form method="post" action="index.php?rota=atualizar" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $p['id'] ?>">
    <input type="hidden" name="acao" value="atualizar">

    <label>Nome</label>
    <input type="text" name="nome" value="<?= $p['nome'] ?>" required><br><br>

    <label>Descrição</label>
    <textarea name="descricao"><?= htmlspecialchars($p['descricao']) ?></textarea><br><br>

    <label>Preço</label>
    <input type="number" step="0.01" name="preco" value="<?= $p['preco'] ?>" required><br><br>

    <label>Quantidade</label>
    <input type="number" name="quantidade" value="<?= $p['quantidade'] ?>" required><br><br>

    <button>Atualizar</button>
</form>
