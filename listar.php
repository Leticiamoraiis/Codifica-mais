<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// PROTEÇÃO DE ACESSO (SEM LOGIN NÃO ENTRA)
if (!isset($_SESSION['usuario_id'])) {
    header('Location: tela_cadastro/login.php');
    exit;
}
// LISTA PRODUTOS ATIVOS
$produtos = $pdo->query("SELECT * FROM produtos ORDER BY id DESC")
               ->fetchAll(PDO::FETCH_ASSOC);

// LISTA PRODUTOS EXCLUÍDOS
$produtos_excluidos = $pdo->query("SELECT * FROM exclusao_produtos ORDER BY data_exclusao DESC")
                          ->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Produtos</h2>

<!-- Tabela de produtos -->
<table>
    <tr>
        <!-- Cabeçalho da tabela -->
        <th class="nome-produto">Nome</th>
        <th class="descricao-coluna">Descrição</th> <!-- classe para CSS -->
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>

<?php foreach ($produtos as $p): ?>

<?php
// Define imagem padrão caso não exista
$imagem = 'sem-imagem.png';
if (!empty($p['imagem']) && file_exists('uploads/' . $p['imagem'])) {
    $imagem = $p['imagem'];
}
?>

<tr>
    <!-- Coluna Nome com imagem -->
    <td class="nome-produto">
        <img src="uploads/<?= $imagem ?>" alt="<?= htmlspecialchars($p['nome']) ?>" width="120">
        <?= htmlspecialchars($p['nome']) ?>
    </td>

    <!-- Coluna Descrição -->
    <td class="descricao-coluna">
        <?= htmlspecialchars($p['descricao']) ?>
    </td>

    <!-- Colunas restantes -->
    <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
    <td><?= (int)$p['quantidade'] ?></td>

    <td>
        <a href="index.php?rota=editar&id=<?= $p['id'] ?>">Editar</a> |
        <a href="index.php?rota=excluir&id=<?= $p['id'] ?>" onclick="return confirm('Deseja realmente excluir este produto?')">Excluir</a>
    </td>
</tr>

<?php endforeach; ?>
</table>

