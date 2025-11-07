<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem Somos</title>
    <title>Beleza Web</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css" />
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css" />
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
        }

        .seta {
            width: 40px;
            height: 40px;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        a,
        a:link,
        a:visited,
        a:hover,
        a:active {
            text-decoration: none;
        }

        h1 {
            color: #BA55D3;
            border: 3px solid #DDA0DD;
            background-color: #DDA0DD;
            text-align: center;
            padding: 10px;
        }

        .cor {
            color: #b238d1ff;
        }

        .tamanho {
            font-family: 'Times New Roman', Times, serif;
            color: black;
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

        p {
            font-family: Arial, Helvetica, sans-serif;
        }

        h5 {
            font-family: Arial, Helvetica, sans-serif;
        }

        .section-valores {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 1550px;
            height: 500px;
            background-color: #f1dbf1ff;
        }

        .conteudo-valores {
            flex: 1;
        }

        .titulo-valores {
            font-size: 32px;
            letter-spacing: 1px;
            margin-bottom: 40px;
            color: black;
            font-family: 'Times New Roman', Times, serif;
        }

        .grid-valores {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px 60px;
        }

        .grid-valores .item-valor:nth-child(1),
        .grid-valores .item-valor:nth-child(3) {
            padding-left: 40px;
        }

        .item-valor {
            max-width: 300px;
        }

        .item-valor h3 {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
            font-family: 'Times New Roman', Times, serif;
        }

        .item-valor p {
            font-size: 15px;
            line-height: 1.6;
            color: black;
        }

        .imagem-valores {
            flex: 1;
            text-align: center;
        }

        .imagem-valores img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .blz-botoes {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            padding: 60px 40px;
            flex-wrap: wrap;
        }

        .blz-botao {
            background-color: white;
            color: #DDA0DD;
            width: 180px;
            height: 180px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            text-decoration: none;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .blz-botao:hover {
            background-color: #BA55D3;
            transform: translateY(-5px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .blz-botao svg {
            width: 40px;
            height: 40px;
            margin-bottom: 15px;
            stroke: #DDA0DD;
            stroke-width: 1.8;
            fill: none;
        }

        .blz-botao p {
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
        }

        .imagem-container-5 {
            width: 50px;
            height: 25px;
            text-align: center;
        }

        .social-icons a {
            display: inline-block;
            background-color: #f0ecf8;
            color: #5a2ea6;
            padding: 10px;
            border-radius: 10px;
            margin-right: 8px;
            font-size: 18px;
            transition: 0.2s ease;
        }

        .social-icons a:hover {
            background-color: #5a2ea6;
            color: white;
        }

        /* === 🔹 RESPONSIVIDADE ADICIONADA 🔹 === */
        @media (max-width: 1024px) {
            .section-valores {
                width: 100%;
                flex-direction: column;
                height: auto;
                padding: 20px;
            }

            .imagem-container {
                width: 100%;
                height: auto;
            }

            .imagem-destaque {
                position: relative;
                height: auto;
            }

            header table {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
                padding: 8px;
            }

            h2,
            h3,
            h5,
            p {
                padding: 0 15px;
                text-align: center;
            }

            .imagem-container {
                width: 100%;
                height: auto;
            }

            .section-valores {
                flex-direction: column;
                width: 100%;
                height: auto;
            }

            .grid-valores {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .blz-botoes {
                flex-direction: column;
                gap: 25px;
                padding: 20px;
            }

            .blz-botao {
                width: 150px;
                height: 150px;
            }

            header table th {
                display: block;
                padding: 5px;
            }

            header img {
                width: 35px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 20px;
            }

            h2 {
                font-size: 18px;
            }

            p,
            h5 {
                font-size: 14px;
                line-height: 1.4;
            }

            .blz-botao {
                width: 130px;
                height: 130px;
                font-size: 12px;
            }

            .imagem-valores img {
                width: 90%;
            }
        }

        /* --- Correção da segunda imagem (quem_somos2.png) --- */
        .imagem-container img {
            width: 100%;
            height: auto;
            max-width: 1000px;
            border-radius: 8px;
            display: block;
            margin: 0 auto;
            object-fit: cover;
        }

        /* --- Ajuste dos quadrados brancos (blz-botões) --- */
        .blz-botoes {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            padding: 50px 30px;
            flex-wrap: wrap;
        }

        .blz-botao {
            background-color: white;
            color: #DDA0DD;
            width: 200px;
            height: 200px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            text-decoration: none;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .blz-botao:hover {
            background-color: #BA55D3;
            transform: translateY(-5px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
            color: white;
        }

        .blz-botao svg {
            width: 40px;
            height: 40px;
            margin-bottom: 12px;
            stroke: #DDA0DD;
            stroke-width: 1.8;
            fill: none;
        }

        .blz-botao p {
            font-size: 15px;
            line-height: 1.3;
            margin: 0;
            word-wrap: break-word;
        }

        /* --- Responsividade --- */
        @media (max-width: 1024px) {
            .blz-botoes {
                gap: 25px;
            }

            .blz-botao {
                width: 170px;
                height: 170px;
            }
        }

        @media (max-width: 768px) {
            .blz-botoes {
                justify-content: center;
                padding: 30px 10px;
            }

            .blz-botao {
                width: 150px;
                height: 150px;
                padding: 15px;
            }

            .blz-botao p {
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .blz-botoes {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .blz-botao {
                width: 100%;
                height: 140px;
            }
        }
    </style>
</head>

<body>
    <br/><br />
    <a href="index.php">
        <img src="img/seta-removebg-preview.png" alt="Voltar" class="seta">
    </a>
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
                    <th><a href="corpo.php">Corpo</a></th>
                    <th>
                        <a href="carrinho.php">
                            <img src="img/sacola-removebg-preview.png" width="45px" />
                        </a>
                    </th>
                </tr>
            </table>

        </header>
        <br>
        <h2 class="cor">Quem Somos</h2>
        <div class="imagem-container">
            <img src="img/quem_somos.png" class="imagem-destaque principal" />
        </div>
        <br>
        <br>
        <h2>ACREDITAMOS QUE A BELEZA ESTÁ EM CONSTANTE DESCOBERTA <br>
            E QUE ELA SEMPRE PODE NOS SURPREENDER.</h2>
        <br>
        <p>A beleza é um convite para o novo. Ela nos inspira a experimentar, a ousar e a nos deixar
            <br>encantar pelo inesperado.
            Cada descoberta revela novas formas de sentir, de se expressar e de ser.
            <br>
            <br>
            Assim como a beleza, também somos movidos pela surpresa.
            <br>
            <br>
            Nosso propósito é usar todo o nosso conhecimento e
            experiência para criar curadorias que despertem descobertas
            <br>e tornem cada experiência única e transformadora
        </p>
        <br>
        <br>
        <div class="imagem-container">
            <img src="img/quem_somos2.png">
        </div>
        <br>
        <br>
        <h5>Fundada em 2007, a Beleza na Web é líder no mercado de beleza online na América Latina.
            <br>Integrante do Grupo Boticário, a empresa atua com um modelo de
            <br> venda multicanal e oferece um portfólio completo,
            <br>reunindo mais de 10.000 marcas e 80.000 produtos voltados para
            <br> cabelos, maquiagem, perfumaria, cuidados com o corpo, banho e muito mais.
        </h5>
        <br>
        <br>
        <section class="section-valores">
            <div class="conteudo-valores">
                <h2 class="titulo-valores">NOSSOS VALORES</h2>

                <div class="grid-valores">
                    <div class="item-valor">
                        <h3>Ser e Fazer Melhor</h3>
                        <p>Sabemos que você quer e merece: o melhor! Por isso, colocamos a qualidade em primeiro lugar.</p>
                    </div>

                    <div class="item-valor">
                        <h3>Conectamos com o Futuro</h3>
                        <p>Queremos transformar o presente para desenhar o amanhã e conectar as pessoas com o futuro da beleza.</p>
                    </div>

                    <div class="item-valor">
                        <h3>Parcerias que Valem Ouro</h3>
                        <p>Sabemos da importância das relações e das trocas tão preciosas.</p>
                    </div>

                    <div class="item-valor">
                        <h3>Ensinar para Empoderar</h3>
                        <p>Valorizamos o conhecimento e entendemos que ele fica ainda mais potente quando é compartilhado.</p>
                    </div>
                </div>
            </div>

            <div class="imagem-valores">
                <img src="img/quem_somos4.png" alt="Produtos de beleza representando nossos valores">
            </div>
        </section>
        <br>
        <h3 class="tamanho">Explore nosso site e encontre tudo o que precisa:</h3>
        <div class="blz-botoes">
            <a href="localização.php" class="blz-botao">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                    <circle cx="12" cy="9" r="2.5" />
                </svg>
                <p>Encontre<br>a loja mais<br>próxima</p>
            </a>
            <a href="#" class="blz-botao">
                <p style="font-size:22px; font-weight:bold; margin-bottom:10px;">Minha<br>blz</p>
                <p>Seja um afiliado<br>em Minha BLZ</p>
            </a>

            <a href="#" class="blz-botao">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <rect x="5" y="3" width="14" height="18" rx="2" />
                    <line x1="9" y1="7" x2="15" y2="7" />
                    <line x1="9" y1="11" x2="15" y2="11" />
                    <line x1="9" y1="15" x2="13" y2="15" />
                </svg>
                <p>Navegue no<br>nosso blog<br>Loucas por Beleza</p>
            </a>

            <a href="produto_pro.php" class="blz-botao">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M7 3L17 21" />
                    <path d="M17 3L7 21" />
                    <circle cx="7" cy="3" r="1" />
                    <circle cx="17" cy="3" r="1" />
                </svg>
                <p>Tudo para<br>profissionais<br>em BLZ PRO</p>
            </a>

            <a href="https://www.belezanaweb.com.br/marketplace/" target="_blank" class="blz-botao">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M6 7h12l1 14H5L6 7z" />
                    <path d="M9 7a3 3 0 0 1 6 0" />
                </svg>
                <p>Venda na<br>BLZ pelo<br>marketplace</p>
            </a>
</body>

</html>