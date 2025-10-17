<?php
session_start();
$total = $_SESSION['total_pedido'] ?? 0;

unset($_SESSION['total_pedido']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pedido Concluído</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        a,
        a:link,
        a:visited,
        a:hover,
        a:active {
            text-decoration: none;
        }

        .container-pedido {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #BA55D3;
        }

        .valor-total-pedido {
            font-size: 16px;
            margin-top: 15px;
        }

        .rastreio-container {
            margin-top: 30px;
        }

        .botao-rastreio {
            display: inline-block;
            background-color: #BA55D3;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .botao-rastreio:hover {
            background-color: #9932CC;
        }

        .btn-voltar {
            display: inline-block;
            margin-top: 15px;
            background-color: #888;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-voltar:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="container-pedido">
        <h1>Pedido Concluído!</h1>
        <p>Obrigado pela sua compra. Seus produtos estão sendo preparados para envio.</p>

        <div class="valor-total-pedido">
            <strong>Total do Pedido:</strong> R$ <?= number_format($total, 2, ',', '.') ?>
        </div>

        <div class="rastreio-container">
            <p>Deseja rastrear seu pedido pelos Correios?</p>
            <a href="https://www2.correios.com.br/sistemas/rastreamento/" target="_blank" class="botao-rastreio">Rastrear Pedido</a>
        </div>

        <a href="index.php" class="btn-voltar">Voltar à Página Inicial</a>
    </div>
</body>

</html>