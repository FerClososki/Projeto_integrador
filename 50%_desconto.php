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
                <a href="produto1.php"><img src="img/desconto9.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Taiff Style Pro 2000W 110V - Secador de Cabelo</h3>
            <p class="preco-antigo-produto">R$534,99</p>
            <p class="preco-atual-produto">R$264,99</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desonto10.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">GA.MA Italy iQ3 Perfetto Rose Gold 127V - Secador de Cabelo</h3>
            <p class="preco-antigo-produto">R$ 1.549,00</p>
            <p class="preco-atual-produto">R$ 1.502,53</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto11.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Curling Gold Titanium 32mm - Modelador de Cachos 280g</h3>
            <p class="preco-antigo-produto">R$682,54</p>
            <p class="preco-atual-produto">R$487,53</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto12.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Taiff Curves 1 1/2 - Modelador de Cachos</h3>
            <p class="preco-antigo-produto">R$558,31</p>
            <p class="preco-atual-produto">R$279,00</p>
        </div>
    </div>

    <div class="lista-produtos">
        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto13.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">MQ Professional - Escova Secadora de Cabelo</h3>
            <p class="preco-antigo-produto">R$399,90</p>
            <p class="preco-atual-produto">R$189,90</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto14.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Escova Modeladora Taiff Style Oval</h3>
            <p class="preco-antigo-produto">R$953,99</p>
            <p class="preco-atual-produto">R$415,90</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto15.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">GA.MA Keration Brush 3D Bivolt -  Escova Secadora</h3>
            <p class="preco-antigo-produto">R$383,88</p>
            <p class="preco-atual-produto">R$191,50</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto16.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-50%</span>
            </div>
            <h3 class="titulo-produto">Prancha MQ Professional Hair Pro Max 480 W T </h3>
            <p class="preco-antigo-produto">R$659,88</p>
            <p class="preco-atual-produto">R$329,50</p>
        </div>
    </div>

</body>

</html>