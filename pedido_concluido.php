<?php
session_start();
$total = $_SESSION['total_pedido'] ?? 0;

// Remove o total da sessão após exibir
unset($_SESSION['total_pedido']);

// Gera um código de rastreamento falso (simulado no padrão dos Correios)
function gerarCodigoRastreamento()
{
    $letrasInicio = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
    $numeros = str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
    $letrasFim = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
    return $letrasInicio . $numeros . $letrasFim;
}

// Função para adicionar dias úteis (ignorando sábados e domingos)
function adicionarDiasUteis($data, $dias)
{
    $dataFinal = clone $data;
    while ($dias > 0) {
        $dataFinal->modify('+1 day');
        if ($dataFinal->format('N') < 6) { // 1=Segunda ... 7=Domingo
            $dias--;
        }
    }
    return $dataFinal;
}

// Data do pedido e previsão de entrega
$dataPedido = new DateTime();
$dataMinEntrega = adicionarDiasUteis($dataPedido, 5);
$dataMaxEntrega = adicionarDiasUteis($dataPedido, 10);

$codigoRastreamento = gerarCodigoRastreamento();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pedido Concluído</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
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

        .codigo-rastreamento {
            margin-top: 10px;
            font-size: 18px;
            color: #333;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 8px 12px;
            border-radius: 6px;
            display: inline-block;
        }

        .info-entrega {
            margin-top: 15px;
            font-size: 15px;
            color: #444;
            background-color: #fafafa;
            border: 1px solid #ddd;
            padding: 10px 15px;
            border-radius: 6px;
            display: inline-block;
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
        <br>
        <!-- CÓDIGO DE RASTREAMENTO -->
        <div class="codigo-rastreamento">
            Código de Rastreamento: <strong><?= $codigoRastreamento ?></strong>
        </div>
        <br>
        <!-- DATA DO PEDIDO E PREVISÃO DE ENTREGA -->
        <div class="info-entrega">
            <p><strong>Data do Pedido:</strong> <?= $dataPedido->format('d/m/Y') ?></p>
            <p><strong>Previsão de Entrega:</strong> <?= $dataMinEntrega->format('d/m/Y') ?> a <?= $dataMaxEntrega->format('d/m/Y') ?></p>
        </div>

        <div class="rastreio-container">
            <p>Deseja rastrear seu pedido pelos Correios?</p>
            <a href="https://www2.correios.com.br/sistemas/rastreamento/" target="_blank" class="botao-rastreio">Rastrear Pedido</a>
        </div>

        <a href="index.php" class="btn-voltar">Voltar à Página Inicial</a>
    </div>
</body>

</html>