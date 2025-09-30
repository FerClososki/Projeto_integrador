<?php
session_start();
require_once "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Produto excluído com sucesso!";
        $_SESSION['message_type'] = "p-3 mb-2 bg-secondary text-danger";
    } else {
        $_SESSION['message'] = "Erro ao excluir o produto: " . $stmt->error;
        $_SESSION['message_type'] = "primary";
    }
    $stmt->close();
}

$conn->close();
header("Location: index.php");
exit();
