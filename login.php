<?php
session_start();
include 'conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($email && $senha) {
        $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($senha, $user['senha'])) {
                $_SESSION['user_id'] = $user['id'];

                if (!empty($_SESSION['redirect_after_login'])) {
                    $redirect = $_SESSION['redirect_after_login'];
                    unset($_SESSION['redirect_after_login']);
                    header("Location: $redirect");
                    exit();
                } else {
                    header("Location: index.php");
                    exit();
                }
            } else {
                $erro = "Senha incorreta!";
            }
        } else {
            $erro = "Usuário não encontrado. Você pode se cadastrar abaixo!";
        }
    } else {
        $erro = "Preencha email e senha!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
            text-align: center;
            justify-content: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

        }

        a,
        a:link,
        a:visited,
        a:hover,
        a:active {
            text-decoration: none;
        }

        .entrar {
            background-color: #DA70D6;
            color: white;
            padding: 4px 10px;
            border: 2px solid #DA70D6;
            border-radius: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 20px;
        }

        input {
            width: 250px;
            height: 25px;
            box-sizing: border-box;
            border-radius: 10px;
        }

        a.cadastre {
            color: #DA70D6;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 15px;
            font-weight: bold;
        }

        h2 {
            color: #BA55D3;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 50px;
        }

        label {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 20px;
        }
        p{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 15px;
        }
    </style>
</head>

<body class="container mt-5">
    <h2>Login</h2>
    <hr>

    <?php if ($erro): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
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
        <button type="submit" class="entrar">Entrar</button>
    </form>

    <hr>
    <p>Não tem uma conta? <a href="cadastro.php" class="cadastre">Cadastre-se aqui</a></p>
</body>

</html>