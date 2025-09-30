<?php
session_start();
require_once "conexao.php";

$sql = "SELECT id, nome, preco, imagem FROM produtos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beleza Web</title>
    <style>
        .img-hover {
            width: 1450px;
            height: 450px;
            transition: 0.3s;
        }

        .img-hover:hover {
            content: url("img/imagem_inicial2.jpg");
        }

        body {
            background-color: #e2cfe2;
        }

        h1 {
            color: #BA55D3;
            border: 3px solid #DDA0DD;
            background-color: #DDA0DD;
        }

        a {
            text-decoration: none;
            color: #BA55D3;
        }

        a:hover {
            color: black;
        }

        header th {
            padding: 0 20px;
            font-weight: normal;
        }

        .espaço {
            padding: 0 35px;
        }

        .produto {
            display: inline-block;
            margin: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            background: #fff;
        }
    </style>
</head>

<body>
    <br>
    <center>
        <h1>Beleza Web</h1>
        <header>
            <table>
                <tr>
                    <th><a href="Cabelos.php">Cabelos</a></th>
                    <th><a href="maquiagem.php">Maquiagens</a></th>
                    <th><a href="perfumaria.php">Perfumaria</a></th>
                    <th><a href="skincare.php">Skincare</a></th>
                </tr>
            </table>
        </header>

        <br><br>
        <img src="img/imagem_inicial.jpg" class="img-hover">
        <br><br><br>
        <img src="img/imagem_inicial3.jpg" width="1000px">
        <br><br>

        <table class="espaço">
            <tr>
                <th><img src="img/imagem_inicial4.jpg" width="200px"></th>
                <th><img src="img/imagem_inicial5.jpg" width="200px"></th>
                <th><img src="img/imagem_inicial6.jpg" width="200px"></th>
            </tr>
            <tr>
                <th><img src="img/produto_inicial.jpg" width="250px"></th>
                <th><img src="img/produto2_inicial.jpg" width="250px"></th>
                <th><img src="img/produto3_inicial.jpg" width="250px"></th>
            </tr>
        </table>

    </center>

    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php" class="btn btn-danger">Sair</a>
    <?php else: ?>
        <a href="login.php" class="btn btn-primary">Login</a>
    <?php endif; ?>
</body>
</html>
