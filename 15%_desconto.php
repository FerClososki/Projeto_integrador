<?php
session_start();
include "conexao.php";

$sql = "SELECT * FROM produtos WHERE categoria IN ('cabelos', 'corpo')";
$result = $conn->query($sql);

?>
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
            cursor: pointer;
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

        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            inset: 0;
            justify-content: center;
            align-items: center;
        }

        .modal-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .modal-content {
            position: relative;
            background: white;
            border-radius: 20px;
            padding: 30px;
            width: 420px;
            max-width: 90%;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
            animation: showModal 0.4s ease;
            z-index: 2;
        }

        @keyframes showModal {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .close {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 28px;
            color: #999;
            cursor: pointer;
            transition: 0.2s;
        }

        .close:hover {
            color: #000;
            transform: scale(1.1);
        }

        .modal-content img {
            width: 200px;
            margin: 15px auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .modal-content img:hover {
            transform: scale(1.05);
        }

        #modalTitulo {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        #modalDescricao {
            font-size: 14px;
            color: #555;
            margin: 10px 0 20px 0;
            line-height: 1.4;
        }

        #modalPrecoAntigo {
            text-decoration: line-through;
            color: #888;
            margin-bottom: 5px;
        }

        #modalPrecoAtual {
            font-weight: bold;
            color: #BA55D3;
            font-size: 18px;
        }

        .btn-comprar {
            background: linear-gradient(135deg, #BA55D3, #9932CC);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            margin-top: 15px;
            font-size: 15px;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-comprar:hover {
            background: linear-gradient(135deg, #9932CC, #8A2BE2);
            transform: scale(1.05);
        }

        #modalQuantidade {
            width: 60px;
            margin-top: 10px;
            font-size: 16px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <a href="index.php">
            <img src="img/seta-removebg-preview.png" alt="Voltar" />
        </a>
        <br /><br />
        <h2 class="desconto">Produtos com 15% de desconto</h2>
        <a href="carrinho.php">
            <img src="img/sacola-removebg-preview.png" alt="Carrinho" />
        </a>
    </div>

    <div class="lista-produtos">
        <div class="card-produto" data-id="0">
            <div class="container-imagem">
                <img src="img/desconto1.png" alt="Produto 1" />
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Bio-Oil - Óleo de Tratamento 125ml</h3>
            <p class="preco-antigo-produto">R$102,00</p>
            <p class="preco-atual-produto">R$65,00</p>
        </div>

        <div class="card-produto" data-id="1">
            <div class="container-imagem">
                <img src="img/produto2.png" alt="Produto 2" />
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Bioderma Hidratante Diária - Óleo de Banho 1L</h3>
            <p class="preco-antigo-produto">R$289,00</p>
            <p class="preco-atual-produto">R$228,00</p>
        </div>

        <div class="card-produto" data-id="2">
            <div class="container-imagem">
                <img src="img/desconto3.png" alt="Produto 3" />
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">NIVEA Suave - Sabonete Íntimo 250ml</h3>
            <p class="preco-antigo-produto">R$25,90</p>
            <p class="preco-atual-produto">R$19,00</p>
        </div>

        <div class="card-produto" data-id="3">
            <div class="container-imagem">
                <img src="img/desconto4.png" alt="Produto 4" />
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">NIVEA Banho - Esfoliante Corporal 204g</h3>
            <p class="preco-antigo-produto">R$37,90</p>
            <p class="preco-atual-produto">R$22,90</p>
        </div>
    </div>

    <div class="lista-produtos">
        <div class="card-produto" data-id="4">
            <div class="container-imagem">
                <img src="img/desconto5.png" alt="Produto 5" />
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Kit Kérastase Elixir Rose Densifique</h3>
            <p class="preco-antigo-produto">R$764,80</p>
            <p class="preco-atual-produto">R$698,80</p>
        </div>

        <div class="card-produto" data-id="5">
            <div class="container-imagem">
                <img src="img/desconto6.png" alt="Produto 6" />
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Kit TRUSS Uso Obrigatório & Frizz Zero</h3>
            <p class="preco-antigo-produto">R$367,80</p>
            <p class="preco-atual-produto">R$245,80</p>
        </div>

        <div class="card-produto" data-id="6">
            <div class="container-imagem">
                <img src="img/desconto7.png" alt="Produto 7" />
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Vult Volume Up! - Máscara de Cílios 10g</h3>
            <p class="preco-antigo-produto">R$37,90</p>
            <p class="preco-atual-produto">R$29,00</p>
        </div>

        <div class="card-produto" data-id="7">
            <div class="container-imagem">
                <img src="img/desconto8 1.png" alt="Produto 8" />
                <span class="etiqueta-desconto">-15%</span>
            </div>
            <h3 class="titulo-produto">Tangle Teezer The Original - Escova de Cabelo</h3>
            <p class="preco-antigo-produto">R$124,90</p>
            <p class="preco-atual-produto">R$93,90</p>
        </div>
    </div>

    <div id="produtoModal" class="modal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImagem" src="" alt="Produto" />
            <h3 id="modalTitulo"></h3>
            <p id="modalDescricao"></p>
            <p id="modalPrecoAntigo"></p>
            <p id="modalPrecoAtual"></p>

            <form id="formAdicionarCarrinho" method="post" action="adicionar_carrinho.php">
                <input type="hidden" name="produto_id" id="produtoId" value="" />
                <label for="modalQuantidade">Quantidade:</label><br />
                <input type="number" name="quantidade" id="modalQuantidade" value="1" min="1" required />
                <br />
                <button type="submit" class="btn-comprar">Adicionar ao Carrinho</button>
            </form>
        </div>
    </div>

    <script>
        const produtos = {
            0: {
                imagem: "img/desconto1.png",
                titulo: "Bio-Oil - Óleo de Tratamento 125ml",
                descricao: "Óleo para tratamento de pele, indicado para cicatrizes, estrias e manchas.",
                precoAntigo: "R$102,00",
                precoAtual: "R$65,00"
            },
            1: {
                imagem: "img/produto2.png",
                titulo: "Bioderma Hidratante Diária - Óleo de Banho 1L",
                descricao: "Óleo de banho hidratante para peles sensíveis.",
                precoAntigo: "R$289,00",
                precoAtual: "R$228,00"
            },
            2: {
                imagem: "img/desconto3.png",
                titulo: "NIVEA Suave - Sabonete Íntimo 250ml",
                descricao: "Sabonete íntimo suave para uso diário.",
                precoAntigo: "R$25,90",
                precoAtual: "R$19,00"
            },
            3: {
                imagem: "img/desconto4.png",
                titulo: "NIVEA Banho - Esfoliante Corporal 204g",
                descricao: "Esfoliante corporal para renovar a pele.",
                precoAntigo: "R$37,90",
                precoAtual: "R$22,90"
            },
            4: {
                imagem: "img/desconto5.png",
                titulo: "Kit Kérastase Elixir Rose Densifique",
                descricao: "Kit completo para densidade e brilho dos cabelos.",
                precoAntigo: "R$764,80",
                precoAtual: "R$698,80"
            },
            5: {
                imagem: "img/desconto6.png",
                titulo: "Kit TRUSS Uso Obrigatório & Frizz Zero",
                descricao: "Kit para controle de frizz e tratamento capilar.",
                precoAntigo: "R$367,80",
                precoAtual: "R$245,80"
            },
            6: {
                imagem: "img/desconto7.png",
                titulo: "Vult Volume Up! - Máscara de Cílios 10g",
                descricao: "Máscara de cílios para volume extra.",
                precoAntigo: "R$37,90",
                precoAtual: "R$29,00"
            },
            7: {
                imagem: "img/desconto8 1.png",
                titulo: "Tangle Teezer The Original - Escova de Cabelo",
                descricao: "Escova para desembaraçar cabelos sem dor.",
                precoAntigo: "R$124,90",
                precoAtual: "R$93,90"
            }
        };

        const modal = document.getElementById("produtoModal");
        const modalOverlay = modal.querySelector(".modal-overlay");
        const closeBtn = modal.querySelector(".close");
        const modalImagem = document.getElementById("modalImagem");
        const modalTitulo = document.getElementById("modalTitulo");
        const modalDescricao = document.getElementById("modalDescricao");
        const modalPrecoAntigo = document.getElementById("modalPrecoAntigo");
        const modalPrecoAtual = document.getElementBy
    </script>
</body>

</html>