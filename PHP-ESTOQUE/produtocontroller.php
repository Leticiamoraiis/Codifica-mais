<?php
require 'database.php';
require 'produto.php';

// Função para validar senha segura
function validarSenhaSegura($senha) {    
    return preg_match('/^(?=.[A-Z])(?=.[0-9])(?=.[\W_]).{8,}$/', $senha);
}

// SALVAR NOVO PRODUTO
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['acao']) &&
    $_POST['acao'] === 'salvar'
) {

    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $quantidade = $_POST['quantidade'] ?? 0;

    $nomeImagem = Produto::processarImagem($_FILES['imagem']);

    $produto = new Produto(
        $nome,
        $descricao,
        $preco,
        $quantidade,
        $nomeImagem
    );

    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, imagem)
            VALUES (:nome, :descricao, :preco, :quantidade, :imagem)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $produto->nome,
        ':descricao' => $produto->descricao,
        ':preco' => $produto->preco,
        ':quantidade' => $produto->quantidade,
        ':imagem' => $produto->imagem
    ]);

    header("Location: index.php");
    exit;
}

// ATUALIZAR PRODUTO
function atualizarProduto($pdo) {
    if (isset($_POST['id'])) {
        $id = (int) $_POST['id'];
        $nome = $_POST['nome'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $preco = $_POST['preco'] ?? 0;
        $quantidade = $_POST['quantidade'] ?? 0;

        // Atualiza apenas os dados, sem mexer na imagem
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

// EXCLUIR PRODUTO (agora move para a tabela de exclusão)
function excluirProduto($pdo) {
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];

        // Pega os dados do produto
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produto) {
            // Remove a imagem se existir
            if (!empty($produto['imagem']) && file_exists('uploads/' . $produto['imagem'])) {
                unlink('uploads/' . $produto['imagem']);
            }

            // Insere na tabela de produtos excluídos com a data de exclusão
            $stmt = $pdo->prepare("INSERT INTO exclusao_produtos (nome, descricao, data_exclusao) VALUES (:nome, :descricao, NOW())");
            $stmt->execute([
                ':nome' => $produto['nome'],
                ':descricao' => $produto['descricao']
            ]);

            // Remove o produto da tabela principal
            $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
            $stmt->execute([':id' => $id]);
        }

        header("Location: index.php");
        exit;
    }
}
