<?php
session_start();
require_once "conexao.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];

$sql = "SELECT c.id, p.nome, p.preco, c.quantidade
        FROM carrinho c
        JOIN produtos p ON c.produto_id = p.id
        WHERE c.usuario_id = ?";
$result = $conn->query($sql);

echo "<h2>Meu Carrinho</h2>";

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "{$row['nome']} - R$ {$row['preco']} x {$row['quantidade']} ";
    echo "<a href='edit_carrinho.php?id={$row['carrinho_id']}'>Editar</a> | ";
    echo "<a href='delete_carrinho.php?id={$row['carrinho_id']}'>Excluir</a>";
    echo "</div>";
}

echo "<br><a href='index.php'>Voltar para a loja</a>";
