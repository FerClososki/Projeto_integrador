<?php
session_start();
require_once "conexao.php";

$usuario_id = $_SESSION['user_id'];

// Buscar itens do carrinho
$sql = "SELECT c.id AS carrinho_id, c.quantidade, 
               p.nome, p.preco
        FROM carrinho c
        JOIN produtos p ON c.produto_id = p.id
        WHERE c.usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
while ($row = $result->fetch_assoc()) {
    $total += $row['preco'] * $row['quantidade'];
}

// Se o carrinho estiver vazio, redireciona
if ($total == 0) {
    header("Location: index.php");
    exit();
}

// Se enviou o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $endereco = $_POST['endereco'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $pagamento = $_POST['pagamento'] ?? '';

    if ($endereco && $telefone && $pagamento) {
        // Aqui você poderia salvar em uma tabela "pedidos"
        $stmt = $conn->prepare("INSERT INTO pedidos (usuario_id, endereco, telefone, pagamento, total, data) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("isssd", $usuario_id, $endereco, $telefone, $pagamento, $total);
        $stmt->execute();

        // Limpa o carrinho
        $stmt = $conn->prepare("DELETE FROM carrinho WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();

        $_SESSION['message'] = "Pedido realizado com sucesso!";
        $_SESSION['message_type'] = "success";
        header("Location: index.php");
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
            <label>Endereço de Entrega:</label>
            <input type="text" name="endereco" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" class="form-control" placeholder="(xx) xxxxx-xxxx" required>
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

        <button type="submit" class="btn btn-success">Confirmar Pedido</button>
        <a href="carrinho.php" class="btn btn-secondary">Voltar ao Carrinho</a>
    </form>
</body>
</html>
