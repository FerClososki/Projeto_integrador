<?php
session_start();
include "conexao.php";

$sql = "SELECT * FROM produtos WHERE categoria = 'cabelos'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto Nutritive Lotion Thermique Sublimatrice</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFAFA;
            margin: 0;
            padding: 20px;
        }

        a,
        a:link,
        a:visited,
        a:hover,
        a:active {
            text-decoration: none;
        }

        .produto-container {
            display: flex;
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            gap: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .produto-imagem {
            position: relative;
            width: 400px;
        }

        .produto-imagem img {
            width: 100%;
            border-radius: 10px;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.3);
            border: none;
            color: #fff;
            font-size: 2rem;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }

        .prev {
            left: -20px;
        }

        .next {
            right: -20px;
        }

        .produto-info {
            flex: 1;
        }

        .avaliacao {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .estrelas {
            color: orange;
            font-size: 1.2rem;
        }

        .qtd {
            color: #888;
        }

        .produto-info h1 {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .marca {
            font-weight: bold;
            color: #555;
            margin-bottom: 20px;
        }

        .variacoes button {
            padding: 10px 15px;
            margin-right: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
            background: #fff;
            cursor: pointer;
        }

        .variacoes .ativo {
            border-color: #000;
            font-weight: bold;
        }

        .variacoes span {
            display: block;
            font-size: 0.8rem;
            color: #ff0000;
        }

        .frete label {
            font-weight: bold;
        }

        .frete input {
            padding: 5px;
            width: 150px;
            margin: 5px 10px 5px 0;
        }

        .frete button {
            padding: 5px 10px;
            cursor: pointer;
        }

        .frete .info {
            font-size: 0.85rem;
            color: #555;
        }

        .frete a {
            font-size: 0.85rem;
            color: #007bff;
            text-decoration: none;
        }

        .comprar {
            border: 2px solid black;
            background-color: white;
            width: 200px;
            padding: 10px;
            cursor: pointer;
            color: black;
            font-weight: bold;
            text-decoration: none;

        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;

        }

        .top-bar img {
            width: 45px;

        }

        .preco-antigo-produto {
            text-decoration: line-through;
            color: gray;
            font-size: 13px;
            margin: 2px 0;
        }

        .preco-atual-produto {
            font-weight: bold;
            font-size: 16px;
            color: black;
            margin: 2px 0;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <a href="index.php">
            <img src="img/seta-removebg-preview.png" alt="Voltar">
        </a>
    </div>

    <br>
    <br>
    <div class="produto-container">
        <div class="produto-imagem">
            <img src="img/kerastase3.png">
        </div>
    </div>
    <div class="produto-info">
        <div class="avaliacao">
            <span class="estrelas">★★★★☆</span>
            <span class="qtd">(6)</span>
        </div>
        <h1>Kérastase Densifique Densité - Máscara Capilar 200 ml</h1>
        <p class="preco-antigo-produto">R$ 437,90</p>
        <p class="preco-atual-produto">R$ 305,90</p>
        <p class="marca">Kerastase</p>

        <div class="variacoes">
            <button class="ativo">200ml <span>28% off</span></button>
            <br>
        </div>
        <div class="frete">
            <label>Digite o CEP:</label>
            <input type="text" name="endereco" required>
            <br>
        </div>
        <div>
            <label>Não sabe seu CEP?</label>
            <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Clique aqui</a>
            <br>
        </div>
        <p class="info">Informações de frete válidas apenas para este produto. Confira as condições definitivas na sacola.</p>
        <br>
        <div>
            <a href="cabelos.php" class="comprar">Ir a pagina de produtos de cabelo</a>
        </div>
        <br>
    </div>
    </div>
    </div>
</body>

</html>