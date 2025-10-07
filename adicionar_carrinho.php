<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['produto_id'], $_POST['quantidade'])) {
        $_SESSION['pending_produto_id'] = intval($_POST['produto_id']);
        $_SESSION['pending_quantidade'] = intval($_POST['quantidade']);
    }
    $_SESSION['redirect_after_login'] = 'adicionar_carrinho.php';
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];

$produto_id = $_POST['produto_id'] ?? $_SESSION['pending_produto_id'] ?? null;
$quantidade = $_POST['quantidade'] ?? $_SESSION['pending_quantidade'] ?? 1;

unset($_SESSION['pending_produto_id'], $_SESSION['pending_quantidade']);

if ($produto_id) {
    $produto_id = intval($produto_id);
    $quantidade = intval($quantidade);
    if ($quantidade < 1) $quantidade = 1;

    $stmt = $conn->prepare("SELECT quantidade FROM carrinho WHERE produto_id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $produto_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nova_quantidade = $row['quantidade'] + $quantidade;
        $stmt = $conn->prepare("UPDATE carrinho SET quantidade = ? WHERE produto_id = ? AND usuario_id = ?");
        $stmt->bind_param("iii", $nova_quantidade, $produto_id, $usuario_id);
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("INSERT INTO carrinho (usuario_id, produto_id, quantidade) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $usuario_id, $produto_id, $quantidade);
        $stmt->execute();
    }
}

header("Location: carrinho.php");
exit();
