<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_after_login'] = 'finalizar_compra.php';
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];

$stmt = $conn->prepare("
    SELECT c.quantidade, p.preco
    FROM carrinho c
    JOIN produtos p ON c.produto_id = p.id
    WHERE c.usuario_id = ?
");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
while ($row = $result->fetch_assoc()) {
    $total += $row['preco'] * $row['quantidade'];
}

if ($total == 0) {
    header("Location:index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $endereco = $_POST['endereco'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $pagamento = $_POST['pagamento'] ?? '';

    if ($endereco && $telefone && $pagamento) {
        $stmt = $conn->prepare("INSERT INTO pedidos(usuario_id,endereco,telefone,pagamento,total,data) VALUES(?,?,?,?,?,NOW())");
        $stmt->bind_param("isssd", $usuario_id, $endereco, $telefone, $pagamento, $total);
        $stmt->execute();

        // Limpa carrinho
        $stmt = $conn->prepare("DELETE FROM carrinho WHERE usuario_id=?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();

        $_SESSION['message'] = "Pedido realizado com sucesso!";
        $_SESSION['message_type'] = "success";
        header("Location:index.php");
        exit();
    } else {
        $_SESSION['message'] = "Preencha todos os campos!";
        $_SESSION['message_type'] = "danger";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <style>
        .confirmar {
           background-color: #BA55D3;
            color: white;
            padding: 5px 10px;
        }
    </style>
</head>

<body class="container mt-5">
    <h2>Finalizar Compra</h2>
    <hr>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?>">
            <?= $_SESSION['message'] ?>
        </div>
        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <h4>Total da compra: <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></h4>
    <br>

    <form method="post">
        <div class="form-group">
            <label>Digite o CEP:</label>
            <input type="text" name="endereco" required>
        </div>
        <div>
            <label>Não sabe seu CEP?</label>
            <a href="https://buscacepinter.correios.com.br/app/endereco/index.php">Clique aqui</a>
        </div>

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="(xx) xxxxx-xxxx" required>
        </div>

        <div class="form-group">
            <label>Forma de Pagamento:</label><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pagamento" value="pix" required>
                <label class="form-check-label">Pix</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pagamento" value="credito" required>
                <label class="form-check-label">Cartão de Crédito</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pagamento" value="debito" required>
                <label class="form-check-label">Cartão de Débito</label>
            </div>
        </div>

        <button type="submit" class="confirmar">Confirmar Pedido</button>
        <a href="carrinho.php" class="btn btn-secondary">Voltar ao Carrinho</a>
    </form>
</body>

</html>