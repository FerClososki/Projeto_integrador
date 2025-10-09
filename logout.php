<?php
session_start();
include 'conexao.php';

// Se o usuário estiver logado
if (isset($_SESSION['user_id'])) {
    $usuario_id = $_SESSION['user_id'];

    // 🔥 Remove os produtos do carrinho desse usuário no banco de dados
    
    $stmt->execute();
    $stmt->close();
}

// 🧹 Limpa toda a sessão (incluindo user_id, pending_produto_id, etc.)
session_unset();
session_destroy();

// 🔁 Redireciona para a página de login
header("Location: login.php");
exit();
