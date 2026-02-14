<?php
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/produto.php';

// =============================
// SALVAR NOVO PRODUTO
// =============================
function salvarProduto($pdo) {

    if (
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        isset($_POST['acao']) &&
        $_POST['acao'] === 'salvar'
    ) {

        $nome = trim($_POST['nome'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');
        $preco = $_POST['preco'] ?? 0;
        $quantidade = $_POST['quantidade'] ?? 0;

        // Processa a imagem (se enviada)
        $nomeImagem = null;

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {

            // Validação de tipo de arquivo (segurança sem alterar estrutura)
            $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];
            $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

            if (in_array($ext, $extensoesPermitidas)) {
                $nomeImagem = Produto::processarImagem($_FILES['imagem']);
            }
        }

        // Inserção no banco
        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, imagem)
                VALUES (:nome, :descricao, :preco, :quantidade, :imagem)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':quantidade' => $quantidade,
            ':imagem' => $nomeImagem
        ]);

        header("Location: index.php");
        exit;
    }
}


// =============================
// ATUALIZAR PRODUTO
// =============================
function atualizarProduto($pdo) {

    if (isset($_POST['id'])) {

        $id = (int) $_POST['id'];
        $nome = trim($_POST['nome'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');
        $preco = $_POST['preco'] ?? 0;
        $quantidade = $_POST['quantidade'] ?? 0;

        $sql = "UPDATE produtos 
                SET nome = :nome,
                    descricao = :descricao,
                    preco = :preco, 
                    quantidade = :quantidade 
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':quantidade' => $quantidade,
            ':id' => $id
        ]);

        header("Location: index.php");
        exit;
    }
}


// =============================
// EXCLUIR PRODUTO (COM HISTÓRICO)
// =============================
function excluirProduto($pdo) {

    if (isset($_GET['id'])) {

        $id = (int) $_GET['id'];

        // Busca o produto
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produto) {

            // Remove imagem do servidor (se existir)
            if (!empty($produto['imagem']) && file_exists('uploads/' . $produto['imagem'])) {
                unlink('uploads/' . $produto['imagem']);
            }

            // Salva no histórico de exclusão
            $stmt = $pdo->prepare("
                INSERT INTO exclusao_produtos (nome, descricao, data_exclusao) 
                VALUES (:nome, :descricao, NOW())
            ");
            $stmt->execute([
                ':nome' => $produto['nome'],
                ':descricao' => $produto['descricao']
            ]);

            // Exclui da tabela principal
            $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
            $stmt->execute([':id' => $id]);
        }

        header("Location: index.php");
        exit;
    }
}
