<?php
session_start();
require_once "conexao.php";

if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_after_login'] = 'carrinho.php';
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carrinho_id = $_POST['carrinho_id'];
    $quantidade = $_POST['quantidade'];

    if ($carrinho_id && $quantidade > 0) {
        $stmt = $conn->prepare("UPDATE carrinho SET quantidade = ? WHERE id = ?");
        $stmt->bind_param("ii", $quantidade, $carrinho_id);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: carrinho.php");
    exit();
}

$carrinho_id = $_GET['id'] ?? null;
$item = null;

if ($carrinho_id) {
    $stmt = $conn->prepare("SELECT c.id, c.quantidade, p.nome FROM carrinho c JOIN produtos p ON c.produto_id = p.id WHERE c.id = ?");
    $stmt->bind_param("i", $carrinho_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Carrinho</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #BA55D3;
            border: 3px solid #DDA0DD;
            background-color: #DDA0DD;
            text-align: center;
            padding: 10px;
            margin-bottom: 30px;
        }

        .form-container {
            background-color: #FFFAFA;
            border: 2px solid #DDA0DD;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
        }

        label {
            color: #BA55D3;
            font-weight: bold;
        }

        .btn-custom {
            background-color: #DDA0DD;
            color: #4B0082;
            border: none;
        }

        .btn-custom:hover {
            background-color: #BA55D3;
            color: white;
        }

        .btn-cancelar {
            background-color: white;
            border: 1px solid #BA55D3;
            color: #BA55D3;
        }

        .btn-cancelar:hover {
            background-color: #BA55D3;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Editar Quantidade do Produto</h2>

    <?php if ($item): ?>
        <div class="form-container">
            <form method="post" action="edit_carrinho.php">
                <input type="hidden" name="carrinho_id" value="<?= $item['id'] ?>">

                <div class="form-group">
                    <label>Produto:</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($item['nome']) ?>" disabled>
                </div>

                <div class="form-group">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" class="form-control" value="<?= $item['quantidade'] ?>" min="1" required>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-custom">Salvar</button>
                    <a href="carrinho.php" class="btn btn-cancelar ml-2">Cancelar</a>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="text-center">
            <p>Item não encontrado.</p>
            <a href="carrinho.php" class="btn btn-cancelar">Voltar ao Carrinho</a>
        </div>
    <?php endif; ?>

</body>
</html>
