<?php
session_start();
require_once "conexao.php";


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beleza Web</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #BA55D3;
            border: 3px solid #DDA0DD;
            background-color: #DDA0DD;
            text-align: center;
            padding: 10px;
        }

        header th {
            padding: 10px;
        }

        a {
            text-decoration: none;
            color: #BA55D3;
        }

        a:hover {
            color: black;
        }

        .produtos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .produto {
            display: inline-block;
            margin: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            background: #fff;
            width: 220px;
            text-align: center;
        }

        .produto img {
            width: 200px;
        }

        .produto button {
            border: 2px solid #FF00FF;
            background: white;
            padding: 10px;
            width: 100%;
            margin-top: 5px;
            cursor: pointer;
        }

        .imagem-destaque {
            width: 100%;
            max-width: 1000px;
            margin: 20px 0;
            display: block;
        }

        .imagem-container {
            position: relative;
            width: 1000px;
            height: 350px;
            overflow: hidden;
        }

        .imagem-destaque {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s ease-in-out;
        }

        .hover {
            opacity: 0;
        }

        .imagem-container:hover .hover {
            opacity: 1;
        }

        .imagem-container:hover .principal {
            opacity: 0;
        }

        .lista-produtos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .card-produto {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            width: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s;
        }

        .card-produto:hover {
            transform: translateY(-5px);
        }

        .container-imagem {
            position: relative;
            width: 200px;
            height: 200px;
            margin-bottom: 10px;
        }

        .container-imagem img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .etiqueta-desconto {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: black;
            color: white;
            padding: 5px 8px;
            border-radius: 50%;
            font-size: 12px;
        }

        .titulo-produto {
            font-size: 14px;
            margin: 5px 0;
            height: 40px;
            overflow: hidden;
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

        .btn-desconto {
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            margin: 10px;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-desconto strong {
            font-weight: 700;
        }

        .btn-desconto:hover {
            background-color: #333;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <br>
    <br>
    <h1>Beleza Web</h1>
    <center>
        <header>
            <table>
                <tr>
                    <th><a href="Cabelos.php">Cabelos</a></th>
                    <th><a href="maquiagem.php">Maquiagens</a></th>
                    <th><a href="perfumaria.php">Perfumaria</a></th>
                    <th><a href="skincare.php">Skincare</a></th>
                    <th>
                        <a href="carrinho.php">
                            <img src="img/sacola-removebg-preview.png" width="45px">
                        </a>
                    </th>
                </tr>
            </table>
        </header>
        <div class="imagem-container">
            <img src="img/imagem_inicial.jpg" class="imagem-destaque principal">
            <img src="img/imagem_inicial2.jpg" class="imagem-destaque hover">
        </div>
        <br>
        <a href="15%_desconto.php" class="btn-desconto">MÍNIMO <strong>15%</strong>OFF</a> 
        <a href="50%_desconto.php" class="btn-desconto">MÍNIMO <strong>20%</strong>OFF</a> 
        <a href="%_desconto.php" class="btn-desconto">MÍNIMO <strong>30%</strong>OFF</a> 
        <br>
        <div class="lista-produtos">
            <div class="card-produto">
                <div class="container-imagem">
                    <a href="produto1.php"><img src="img/kerastase.png" alt="Produto 1"></a>
                    <span class="etiqueta-desconto">-14%</span>
                </div>
                <h3 class="titulo-produto">Kérastase Chronologiste Masque Intense - 200ml</h3>
                <p class="preco-antigo-produto">R$ 292,70</p>
                <p class="preco-atual-produto">R$ 104,90</p>
            </div>

            <div class="card-produto">
                <div class="container-imagem">
                    <a href="produto2.php"><img src="img/kerastase2.png" alt="Produto 2"></a>
                    <span class="etiqueta-desconto">-22%</span>
                </div>
                <h3 class="titulo-produto">Kérastase Nutritive 8h Magic Night - 90ml</h3>
                <p class="preco-antigo-produto">R$ 531,90</p>
                <p class="preco-atual-produto">R$ 413,90</p>
            </div>

            <div class="card-produto">
                <div class="container-imagem">
                    <a href="produto3.php"><img src="img/produto3_inicial.jpg" alt="Produto 2"></a>
                    <span class="etiqueta-desconto">-30%</span>
                </div>
                <h3 class="titulo-produto">Kérastase Densifique Densité - Máscara Capilar 200ml</h3>
                <p class="preco-antigo-produto">R$ 437,90</p>
                <p class="preco-atual-produto">R$ 305,90</p>
            </div>

        </div>
        <br>
        <div>
            <img src="img/imagem_inicial7.png" width="1050px" height="150px">
        </div>
        <br>
        <h5>Oportunidade única de renovar seu nécessaire</h5>
        <div class="lista-produtos">
            <div class="card-produto">
                <div class="container-imagem">
                    <a href="maquiagem.php"><img src="img/rimeldior-removebg-preview.png" alt="Produto 1"></a>
                    <span class="etiqueta-desconto">-50%</span>
                </div>
                <h3 class="titulo-produto">Mascara para Cilios Diorshow Iconic Overcurl Waterproof</h3>
                <p class="preco-antigo-produto">R$ 265,70</p>
                <p class="preco-atual-produto">R$ 165,70</p>
            </div>

            <div class="card-produto">
                <div class="container-imagem">
                    <a href="perfumaria.php"><img src="img/212.png" alt="Produto 2"></a>
                    <span class="etiqueta-desconto">-22%</span>
                </div>
                <h3 class="titulo-produto">212 Vip Rosé Eau De Parfum 125ml</h3>
                <p class="preco-antigo-produto">R$ 650,90</p>
                <p class="preco-atual-produto">R$ 413,90</p>
            </div>

            <div class="card-produto">
                <div class="container-imagem">
                    <a href="maquiagem.php"><img src="img/po1-removebg-preview (2).png" alt="Produto 2"></a>
                    <span class="etiqueta-desconto">-30%</span>
                </div>
                <h3 class="titulo-produto">Pó Fenty Beauty Pro Filtr Soft Matte</h3>
                <p class="preco-antigo-produto">R$ 437,90</p>
                <p class="preco-atual-produto">R$ 305,90</p>
            </div>

            <div class="card-produto">
                <div class="container-imagem">
                    <a href="cabelos.php"><img src="img/wella1.sem_fundo.jpg" alt="Produto 2"></a>
                    <span class="etiqueta-desconto">-10%</span>
                </div>
                <h3 class="titulo-produto">Kit Completo Ultimate Repair</h3>
                <p class="preco-antigo-produto">R$ 710,90</p>
                <p class="preco-atual-produto">R$ 610,90</p>
            </div>

            <div class="card-produto">
                <div class="container-imagem">
                    <a href="perfumaria.php"><img src="img/invictus-removebg-preview.png" alt="Produto 2"></a>
                    <span class="etiqueta-desconto">-10%</span>
                </div>
                <h3 class="titulo-produto">Perfume Invictus Paco Rabanne Masculino</h3>
                <p class="preco-antigo-produto">R$ 539,90</p>
                <p class="preco-atual-produto">R$ 439,90</p>
            </div>

        </div>
    </center>
</body>

</html>