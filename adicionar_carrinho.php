<?php
session_start();
include "conexao.php";

$produto_id = $_GET['id'] ?? null;

if (!$produto_id) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_after_login'] = "add_carrinho.php?id=$produto_id";
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];

$sql = "INSERT INTO carrinho (usuario_id, produto_id, quantidade) 
        VALUES (?, ?, 1)
        ON DUPLICATE KEY UPDATE quantidade = quantidade + 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $usuario_id, $produto_id);
$stmt->execute();
$stmt->close();

header("Location: carrinho.php");
exit();
