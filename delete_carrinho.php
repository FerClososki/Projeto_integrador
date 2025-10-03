<?php
session_start();
require_once "conexao.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$carrinho_id = $_GET['id'] ?? null;

if ($carrinho_id) {
    $stmt = $conn->prepare("DELETE FROM carrinho WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $carrinho_id, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->close();
}

header("Location: carrinho.php");
exit();
