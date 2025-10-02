<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    die("Erro: usuário não logado.");
}
if ($quantidade < 1) {
    $quantidade = 1;
}


$usuario_id = $_SESSION['usuario_id'];

if (isset($_POST['produto_id']) && isset($_POST['quantidade'])) {
    $produto_id = intval($_POST['produto_id']);
    $quantidade = intval($_POST['quantidade']);

    if ($quantidade < 1) {
        $quantidade = 1;
    }

    $sql_check = "SELECT * FROM carrinho WHERE produto_id = ? AND usuario_id = ?";
    $stmt = $conn->prepare($sql_check);
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

    header("Location: carrinho.php");
    exit;
} else {
    echo "Erro: Produto ou quantidade não informados.";
}
