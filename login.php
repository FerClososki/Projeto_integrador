<?php
session_start();
require_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    $senha = $_POST['senha'] ?? null;

    if ($email && $senha) {
        $stmt = $conn->prepare("SELECT id, email, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($senha, $user['senha'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['message'] = "Bem-vindo, " . $user['email'];
                $_SESSION['message_type'] = "secondary";

                if (isset($_SESSION['redirect_after_login'])) {
                    $redirect = $_SESSION['redirect_after_login'];
                    unset($_SESSION['redirect_after_login']);
                    header("Location: $redirect");
                    exit();
                }

                header("Location: index.php");
                exit();
            } else {
                $_SESSION['message'] = "Senha inválida!";
                $_SESSION['message_type'] = "danger";
            }
        } else {
            $_SESSION['message'] = "Email não encontrado!";
            $_SESSION['message_type'] = "danger";
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
        $_SESSION['message_type'] = "warning";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                <?php unset($_SESSION['message'], $_SESSION['message_type']); endif; ?>

                <div class="card card-body">
                    <h3 class="text-center">Login</h3>
                    <form method="POST">
                        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                        <input type="password" name="senha" class="form-control mb-2" placeholder="Senha" required>
                        <button class="btn btn-primary btn-block">Entrar</button>
                    </form>
                    <div class="text-center mt-2">
                        <a href="cadastro.php">Não possui conta? Cadastre-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
