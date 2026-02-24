<?php
session_start();
require_once '../database.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($senha, $usuario['senha'])) {

    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome_completo'];

    header('Location: ../index.php');
    exit;
}

// ERRO → VOLTA PARA LOGIN
header('Location: login.php?erro=1');
exit;
