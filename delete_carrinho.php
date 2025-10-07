<?php
session_start();
require_once "conexao.php";

if (!isset($_SESSION['user_id'])) {
    echo "Usuário não autenticado!";
    exit();
}

$carrinho_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($carrinho_id > 0) {
    $stmt = $conn->prepare("DELETE FROM carrinho WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $carrinho_id, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->close();
}

header("Location: carrinho.php");
exit();