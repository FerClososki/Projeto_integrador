<?php
session_start();
require_once "conexao.php";

// Redireciona se não estiver logado
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_after_login'] = 'carrinho.php';
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];

// Buscar todos os itens do carrinho do usuário
$sql = "SELECT c.id AS carrinho_id, c.quantidade, 
               p.nome, p.preco, p.imagem
        FROM carrinho c
        JOIN produtos p ON c.produto_id = p.id
        WHERE c.usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Meu Carrinho</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h2>Meu Carrinho</h2>
    <hr>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Produto</th>
                    <th>Imagem</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                while ($row = $result->fetch_assoc()):
                    $subtotal = $row['preco'] * $row['quantidade'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nome']) ?></td>
                        <td><img src="<?= $row['imagem'] ?>" width="80"></td>
                        <td>R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
                        <td><?= $row['quantidade'] ?></td>
                        <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                        <td>
                            <a href="edit_carrinho.php?id=<?= $row['carrinho_id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="remover_carrinho.php?id=<?= $row['carrinho_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja remover este item?')">Remover</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h4 class="text-right">Total: <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></h4>
        <div class="text-right mt-3">
            <a href="index.php" class="btn btn-secondary">Continuar Comprando</a>
            <a href="finalizar_compra.php" class="btn btn-success">Finalizar Compra</a>
        </div>

    <?php else: ?>
        <div class="alert alert-info">
            Seu carrinho está vazio.
        </div>
        <a href="index.php" class="btn btn-primary">Ir às compras</a>
    <?php endif; ?>

</body>

</html>