<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Beleza Web</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css" />
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
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
    </style>
</head>

<body>
    <br /><br />
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
        <div class="imagem-container">
            <img src="img/quem_somos.png" class="imagem-destaque principal" />
            <img src="img/imagem_inicial2.jpg" class="imagem-destaque hover" />
        </div>
        <br>
        <br>
        <h2>ACREDITAMOS QUE A BELEZA ESTÁ EM CONSTANTE DESCOBERTA <br>
            E QUE ELA SEMPRE PODE NOS SURPREENDER.</h2>
        <p>A beleza é um convite para o novo. Ela nos inspira a experimentar, a ousar e a nos deixar encantar pelo inesperado.
            Cada descoberta revela novas formas de sentir, de se expressar e de ser. <br>
            Assim como a beleza, também somos movidos pela surpresa. <br>
            Nosso propósito é usar todo o nosso conhecimento e
            experiência para criar curadorias que despertem descobertas e tornem cada experiência única e transformadora</p>
</body>

</html>