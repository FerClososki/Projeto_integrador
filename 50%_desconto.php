<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>15%</title>
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
        }

        a, a:link, a:visited, a:hover, a:active {
            text-decoration: none;
        }

        h2 {
            color: #BA55D3;
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

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;

        }

        .top-bar img {
            width: 45px;

        }

        .desconto {
            text-align: center;
            padding: 10px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <a href="index.php">
            <img src="img/seta-removebg-preview.png" alt="Voltar">
        </a>
        <br>
        <br>
        <h2 class="desconto">Produtos com 50% de desconto</h2>
        <a href="carrinho.php">
            <img src="img/sacola-removebg-preview.png" alt="Carrinho">
        </a>
    </div>

    <div class="lista-produtos">
        <div class="card-produto">
            <div class="container-imagem">
                <a href="maquiagem.php"><img src="img/desconto23.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">LipHoney - Gloss Labial</h3>
            <p class="preco-antigo-produto">R$69,90</p>
            <p class="preco-atual-produto">R$34,95</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="maquiagem.php"><img src="img/desconto24.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Océane Edition Cover Me Up - Pó Solto</h3>
            <p class="preco-antigo-produto">R$ 69,90</p>
            <p class="preco-atual-produto">R$ 34,95</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="maquiagem.php"><img src="img/desconto25.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Bruna Tavares BT Skinpowder Fair - Pó Solto</h3>
            <p class="preco-antigo-produto">R$81,70</p>
            <p class="preco-atual-produto">R$40,85</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="maquiagem.php"><img src="img/desconto22.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Océane 4 You Copper Shine - Paleta de Sombras</h3>
            <p class="preco-antigo-produto">R$80,00</p>
            <p class="preco-atual-produto">R$40,00</p>
        </div>
    </div>

    <div class="lista-produtos">
        <div class="card-produto">
            <div class="container-imagem">
                <a href="maquiagem.php"><img src="img/desconto20.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Kit CeraVe Hidrata Rosto & Corpo (2 Produtos)</h3>
            <p class="preco-antigo-produto">R$156,80</p>
            <p class="preco-atual-produto">R$156,80</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="maquiagem.php"><img src="img/desconto21.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Océane 3 To Go Blast - Paleta de Sombras</h3>
            <p class="preco-antigo-produto">R$79,90</p>
            <p class="preco-atual-produto">R$39,95</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="maquiagem.php"><img src="img/desconto19.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Océane 12 Shades - Paleta de Sombras</h3>
            <p class="preco-antigo-produto">R$138,90</p>
            <p class="preco-atual-produto">R$82,80</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="maquiagem.php"><img src="img/desconto18.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Stick Cover C02 - Corretivo em Bastão</h3>
            <p class="preco-antigo-produto">R$80,00</p>
            <p class="preco-atual-produto">R$48,00</p>
        </div>
    </div>

</body>

</html>