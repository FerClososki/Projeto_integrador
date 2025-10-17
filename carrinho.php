<?php
session_start();
include 'conexao.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['user_id'];
$stmt = $conn->prepare("
    SELECT c.id AS carrinho_id, c.quantidade, p.nome, p.preco, p.imagem
    FROM carrinho c
    JOIN produtos p ON c.produto_id = p.id
    WHERE c.usuario_id = ?
");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$total = 0;
$carrinho = [];
while ($row = $result->fetch_assoc()) {
    $row['subtotal'] = $row['preco'] * $row['quantidade'];
    $total += $row['subtotal'];
    $carrinho[] = $row;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Meu Carrinho</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <style>
        .edite {
            background-color: #DDA0DD;
            color: white;
            padding: 5px 10px;
        }

        a, a:link, a:visited, a:hover, a:active {
            text-decoration: none;
        }

        .tabela {
            color: #BA55D3;
            border: #BA55D3 solid 3px;
        }

        h2 {
            color: #BA55D3;
            border: 3px solid #DDA0DD;
            background-color: #DDA0DD;
            text-align: center;
            padding: 10px;
        }

        .excluir {
            padding: 5px 10px;
            background-color: red;
            color: white;
        }

        .finalizar {
            background-color: #BA55D3;
            color: white;
            padding: 5px 10px;
        }
    </style>
</head>

<body class="container mt-5">
    <h2>Meu Carrinho</h2>
    <hr>

    <?php if (count($carrinho) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="tabela">
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
                <?php foreach ($carrinho as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nome']) ?></td>
                        <td><img src="<?= htmlspecialchars($item['imagem']) ?>" width="80"></td>
                        <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                        <td><?= $item['quantidade'] ?></td>
                        <td>R$ <?= number_format($item['subtotal'], 2, ',', '.') ?></td>
                        <td>
                            <a href="edit_carrinho.php?id=<?= $item['carrinho_id'] ?>" class="edite">Editar</a>
                            <a href="delete_carrinho.php?id=<?= $item['carrinho_id'] ?>" class="excluir">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h4 class="text-right">Total: <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></h4>
        <div class="text-right mt-3">
            <a href="index.php" class="edite">Continuar Comprando</a>
            <a href="finalizar_compra.php" class="finalizar">Finalizar Compra</a>
        </div>

    <?php else: ?>
        <div class="alert alert-info">Seu carrinho está vazio.</div>
        <a href="index.php" class="btn btn-primary">Ir às compras</a>
    <?php endif; ?>
</body>

</html>