<?php
session_start();
include 'conexao.php';

$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($email && $senha) {
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email=?");
        $stmt->bind_param("s", $email); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $erro = "Email já cadastrado. Faça login!";
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email=?");
            $stmt->bind_param("s", $email); 

            if ($stmt->execute()) {
                $user_id = $stmt->insert_id;
                $_SESSION['user_id'] = $user_id;

                if (!empty($_SESSION['redirect_after_login'])) {
                    $redirect = $_SESSION['redirect_after_login'];
                    unset($_SESSION['redirect_after_login']);
                    header("Location:$redirect");
                    exit();
                } else {
                    header("Location:index.php");
                    exit();
                }
            } else {
                $erro = "Erro ao cadastrar. Tente novamente!";
            }
        }
    } else {
        $erro = "Preencha todos os campos para cadastro!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
        }

         h2 {
            color: #BA55D3 ;
        }

        .entrar {
            background-color: #DA70D6;
            color: white;
            padding: 4px 10px;
            border: 2px solid #DA70D6;
        }

        input {
            width: 350px;
            height: 45px;
            box-sizing: border-box;
        }

        a.cadastre {
            color: #DA70D6;
        }
    </style>
</head>

<body class="container mt-5">
    <h2>Cadastro</h2>
    <hr>

    <?php if ($erro): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>
    <?php if ($sucesso): ?>
        <div class="alert alert-success"><?= $sucesso ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" required>
        </div>
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </div>
        <button type="submit" class="entrar">Cadastrar</button>
    </form>

    <hr>
    <p>Já tem uma conta? <a href="login.php" class="cadastre">Faça login aqui</a></p>
</body>

</html>