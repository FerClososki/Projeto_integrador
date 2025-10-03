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
        body { background-color: #e2cfe2; font-family: Arial, sans-serif; }
        h1 { color: #BA55D3; border: 3px solid #DDA0DD; background-color: #DDA0DD; text-align:center; padding:10px; }
        header th { padding: 0 20px; font-weight: normal; }
        a { text-decoration: none; color: #BA55D3; }
        a:hover { color: black; }
        .produtos-container { display:flex; flex-wrap:wrap; justify-content:center; }
        .produto { display:inline-block; margin:15px; border:1px solid #ccc; padding:10px; background:#fff; width:220px; text-align:center; }
        .produto img { width:200px; }
        .produto button { border:2px solid #FF00FF; background:white; padding:10px; width:100%; margin-top:5px; cursor:pointer; }
        .imagem-destaque { width:100%; max-width:1000px; margin:20px 0; display:block; }
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
        <img src="img/imagem_inicial.jpg" class="imagem-destaque">
        <img src="img/imagem_inicial3.jpg" class="imagem-destaque">


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
</body>
</html>
