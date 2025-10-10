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
        <h2 class="desconto">Produtos com 15% de desconto</h2>
        <a href="carrinho.php">
            <img src="img/sacola-removebg-preview.png" alt="Carrinho">
        </a>
    </div>

    <div class="lista-produtos">
        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto1.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Bio-Oil - Óleo de Tratamento 125ml</h3>
            <p class="preco-antigo-produto">R$102,00</p>
            <p class="preco-atual-produto">R$65,00</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/produto2.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Bioderma Hidratante Diária - Óleo de Banho 1L</h3>
            <p class="preco-antigo-produto">R$289,00</p>
            <p class="preco-atual-produto">R$228,00</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto3.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">NIVEA Suave - Sabonete Íntimo 250ml</h3>
            <p class="preco-antigo-produto">R$25,90</p>
            <p class="preco-atual-produto">R$19,00</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto4.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">NIVEA Banho - Esfoliante Corporal 204g</h3>
            <p class="preco-antigo-produto">R$37,90</p>
            <p class="preco-atual-produto">R$22,90</p>
        </div>
    </div>

    <div class="lista-produtos">
        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto5.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Kit Kérastase Elixir Rose Densifique</h3>
            <p class="preco-antigo-produto">R$,764,80</p>
            <p class="preco-atual-produto">R$698,800</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto6.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Kit TRUSS Uso Obrigatório & Frizz Zero</h3>
            <p class="preco-antigo-produto">R$367,80</p>
            <p class="preco-atual-produto">R$245,80</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto7.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Vult Volume Up! - Máscara de Cílios 10g</h3>
            <p class="preco-antigo-produto">R$37,90</p>
            <p class="preco-atual-produto">R$29,00</p>
        </div>

        <div class="card-produto">
            <div class="container-imagem">
                <a href="produto1.php"><img src="img/desconto8 1.png" alt="Produto 1"></a>
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Tangle Teezer The Original - Escova de Cabelo</h3>
            <p class="preco-antigo-produto">R$124,90</p>
            <p class="preco-atual-produto">R$93,90</p>
        </div>
    </div>

</body>

</html>