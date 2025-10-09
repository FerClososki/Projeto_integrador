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
    <title>Cabelos</title>
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
        }

        .imagem-com-borda {
            border: 5px solid #FFFAFA;
            background-color: #FFFAFA;
            padding: 15px;
            width: 220px;
            display: block;
            margin: 0 auto;
        }

        p {
            background-color: #FFFAFA;
            margin-top: 0;
            padding: 5px;
        }

        h2 {

            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        button {
            border: none;
            background-color: white;
            width: 200px;
            padding: 10px;
            cursor: pointer;
            color: #FF00FF;
            font-weight: bold;
        }

        button:hover {
            background-color: #FF00FF;
            color: white;
        }

        a {
            text-decoration: none;
            color: #FF00FF;
        }

        a:hover {
            color: black;
        }

        .quantidade {
            border: 2px solid #FF00FF;
            background-color: white;
            width: 220px;
            padding: 10px;
            margin: 0 auto;
            text-align: center;
        }

        .produtos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            padding: 20px;
        }

        .produto {
            width: 250px;
            background-color: #fffafa;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
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

        .cabelo {
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
        <h2 class="cabelo">Produtos para Cabelos</h2>
        <a href="carrinho.php">
            <img src="img/sacola-removebg-preview.png" alt="Carrinho">
        </a>
    </div>

    <div class="produtos-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="produto">';
                echo '<a href="produto_cabelo.php?id=' . $row['id'] . '">';
                echo '<img src="' . $row['imagem'] . '" alt="' . $row['nome'] . '" class="imagem-com-borda">';
                echo '<p><strong>' . $row['nome'] . '</strong><br>R$' . number_format($row['preco'], 2, ',', '.') . '</p>';
                echo '</a>';
                echo '<form method="POST" action="adicionar_carrinho.php" class="quantidade">';
                echo '<input type="hidden" name="produto_id" value="' . $row['id'] . '">';
                echo '<label>Quantidade:</label><br>';
                echo '<input type="number" name="quantidade" value="1" min="1" style="width:60px; margin:5px 0;"><br>';
                echo '<button type="submit">Comprar</button>';
                echo '</form>';

                echo '</div>';
            }
        } else {
            echo "<p>Nenhum produto disponível no momento.</p>";
        }
        ?>
    </div>


</body>

</html>