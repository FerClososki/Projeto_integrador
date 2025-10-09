<?php
require_once 'conexao.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

        if ($email && $senha) {
            $sql = "SELECT id, email, senha FROM usuarios WHERE email = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 1) {
                    $user = $result->fetch_assoc();

                    if (password_verify($senha, $user['senha'])) {
                        session_start();
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['message'] = "Bem vindo, " . $user['email'];
                        $_SESSION['message_type'] = "success";
                        header("Location: index.php");
                        exit();
                    } else {
                        throw new Exception("Email ou senha inválido!");
                    }
                } else {
                    throw new Exception("Email ou senha inválido!");
                }
                $stmt->close();
            } else {
                throw new Exception("Erro na consulta: " . $conn->error);
            }
        } else {
            throw new Exception("Preencha email e senha!");
        }
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
} finally {
    $conn->close();
}
  
