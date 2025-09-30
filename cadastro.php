<?php
session_start();
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $confirmar = $_POST['confirmar'] ?? null;

    if ($email && $senha && $confirmar) {
        if ($senha !== $confirmar) {
            $_SESSION['message'] = "As senhas não coincidem!";
            $_SESSION['message_type'] = "danger";
            header("Location: cadastro.php");
            exit();
        }

        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $_SESSION['message'] = "Email já cadastrado!";
            $_SESSION['message_type'] = "warning";
            header("Location: cadastro.php");
            exit();
        }
        $stmt->close();
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hash);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['email'] = $email;
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['message'] = "Erro ao cadastrar: " . $stmt->error;
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
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                <?php unset($_SESSION['message'], $_SESSION['message_type']);
                endif; ?>

                <div class="card card-body">
                    <h3 class="text-center">Cadastro</h3>
                    <form method="POST">
                        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                        <input type="password" name="senha" class="form-control mb-2" placeholder="Senha" required>
                        <input type="password" name="confirmar" class="form-control mb-2" placeholder="Confirme a senha" required>
                        <button class="btn btn-success btn-block">Cadastrar</button>
                    </form>
                    <div class="text-center mt-2">
                        <a href="login.php">Já possui conta? Faça login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>