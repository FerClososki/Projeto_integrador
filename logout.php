<?php
session_start();
include 'conexao.php';
if (isset($_SESSION['user_id'])) {
    $usuario_id = $_SESSION['user_id'];
    
    $stmt->execute();
    $stmt->close();
}
session_unset();
session_destroy();
header("Location: login.php");
exit();
