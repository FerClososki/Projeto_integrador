<?php
session_start();
include 'conexao.php';

// Definir usuário logado (exemplo: se tiver login implementado)
$usuario_id = $_SESSION['usuario_id'] ?? null;

// Inicializa total
$total = 0;

// Busca itens do carrinho
$sql = "SELECT c.id AS carrinho_id, c.quantidade, p.nome, p.preco 
        FROM carrinho c
        JOIN produtos p ON c.produto_id = p.id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Meu Carrinho</title>
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
        }

        .vazio {
            color: #BA55D3;
            border: 2px solid #DDA0DD;
            background-color: #ffdaffff;
            text-align: center;
            padding: 7px;
        }

        .finalizar {
            color: #BA55D3;
            border: 3px solid #ffdaffff;
            background-color: #ffdaffff;
            padding: 8px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Meu Carrinho</h2>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()):
                $subtotal = $row['preco'] * $row['quantidade'];
                $total += $subtotal;
            ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5><?= htmlspecialchars($row['nome']) ?></h5>
                        <small>R$ <?= number_format($row['preco'], 2, ',', '.') ?> x <?= $row['quantidade'] ?></small><br>
                        <strong>Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?></strong>
                    </div>
                    <div>
                        <a href="edit_carrinho.php?id=<?= $row['carrinho_id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="delete_carrinho.php?id=<?= $row['carrinho_id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="vazio">Seu carrinho está vazio.</div>
        <?php endif; ?>

        <div class="card mt-4">
            <div class="card-body text-right">
                <?php if ($usuario_id): ?>
                    <a href="finalizar_pedido.php" class="finalizar">Finalizar Compra</a>
                <?php else: ?>
                    <a href="login.php" class="finalizar">Fazer login para finalizar</a>
                <?php endif; ?>
                <br><br>
                <p>Total: <span class="text-success">R$ <?= number_format($total, 2, ',', '.') ?></span></p>
            </div>
        </div>

        <div class="mt-3 text-center">
            <a href="index.php" class="finalizar">Continuar comprando</a>
        </div>
    </div>
</body>

</html>