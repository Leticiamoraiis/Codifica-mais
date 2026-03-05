<?php

require_once __DIR__ . '/../database.php';

$nome = trim($_POST['nome_completo'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'] ?? '';

// Função de validação de senha segura
function validarSenhaSegura($senha) {
    return preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_]).{8,}$/', $senha);
}

// Verifica senha
if (!validarSenhaSegura($senha)) {
    header("Location: cadastro.php?erro=senha");
    exit;
}

// Verifica email existente
$stmtCheck = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
$stmtCheck->execute([':email' => $email]);

if ($stmtCheck->fetch()) {
    header("Location: cadastro.php?erro=email");
    exit;
}

// Cria hash da senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Insere no banco
$stmt = $pdo->prepare("
    INSERT INTO usuarios (nome_completo, email, senha) 
    VALUES (:nome_completo, :email, :senha)
");

$stmt->execute([
    ':nome_completo' => $nome,
    ':email' => $email,
    ':senha' => $senhaHash
]);

header("Location: cadastro.php?sucesso=1");
exit;
