<?php
session_start();
require_once "conexao.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$id) {
    $_SESSION['message'] = "ID do item não fornecido.";
    $_SESSION['message_type'] = "danger";
    header("Location: carrinho.php");
    exit();
}

try {
    $sql = "SELECT c.id, c.quantidade, p.nome 
            FROM carrinho c 
            JOIN produtos p ON c.produto_id = p.id 
            WHERE c.id = ? AND c.usuario_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $id, $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $item = $result->fetch_assoc();
        } else {
            $_SESSION['message'] = "Item não encontrado.";
            $_SESSION['message_type'] = "warning";
            header("Location: carrinho.php");
            exit();
        }
        $stmt->close();
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item do Carrinho</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
</head>
<body>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <h4>Editar quantidade de: <?= $item['nome'] ?></h4>
                    <form action="update_carrinho.php" method="POST">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" name="quantidade" class="form-control" 
                                   value="<?= $item['quantidade'] ?>" min="1" required>
                        </div>
                        <button class="btn btn-success btn-block" type="submit">Atualizar</button>
                        <a href="carrinho.php" class="btn btn-secondary btn-block">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

