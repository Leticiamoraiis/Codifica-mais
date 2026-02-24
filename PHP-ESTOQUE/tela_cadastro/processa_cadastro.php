<?php
require '../database.php';

$nome = $_POST['nome_completo'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Função de validação de senha segura
function validarSenhaSegura($senha) {
    return preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_]).{8,}$/', $senha);
}

// Verifica se a senha atende aos requisitos
if (!validarSenhaSegura($senha)) {
    header("Location: cadastro.php?erro=senha");
    exit;
}

// Verifica se o email já existe
$stmtCheck = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
$stmtCheck->execute([':email' => $email]);
if ($stmtCheck->fetch()) {
    header("Location: cadastro.php?erro=email");
    exit;
}

// Gera hash seguro
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Insere o usuário no banco
$stmt = $pdo->prepare("INSERT INTO usuarios (nome_completo, email, senha) VALUES (:nome_completo, :email, :senha)");
$stmt->execute([
    ':nome_completo' => $nome,
    ':email' => $email,
    ':senha' => $senhaHash
]);

header("Location: cadastro.php?sucesso=1");
exit;
