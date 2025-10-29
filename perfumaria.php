<?php
session_start();
include "conexao.php";

$sql = "SELECT * FROM produtos WHERE categoria = 'perfumaria'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfumes</title>
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
            color: #BA55D3;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        button {
            border: none;
            background-color: white;
            width: 200px;
            padding: 10px;
            cursor: pointer;
            color: #ec76ecff;
            font-weight: bold;
        }

        button:hover {
            background-color: #ec76ecff;
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
            border: 2px solid #ec76ecff;
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

        .produto p {
            color: black;
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

        .perfume {
            text-align: center;
            padding: 10px;
            margin: 0 auto;
        }

        /*parte do carrinho*/
        .meu-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Caixa do modal */
        .meu-modal-conteudo {
            background: #fff;
            width: 400px;
            max-width: 90%;
            height: 700px;
            max-height: 95%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: meu-aparecer 0.3s ease;
        }

        /* Iframe ocupando todo o conteúdo */
        .meu-modal-conteudo iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Botão de fechar */
        .meu-fechar {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            font-weight: bold;
            color: #555;
            cursor: pointer;
            z-index: 1000;
        }

        /* Animação do modal */
        @keyframes meu-aparecer {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
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
        <h2 class="perfume">Perfumes</h2>
        <!-- Ícone do carrinho -->
        <a href="#" id="abrirMeuCarrinho">
            <img src="img/sacola-removebg-preview.png" width="45px" alt="Carrinho" />
        </a>

        <!-- Modal do carrinho -->
        <div id="meuModalCarrinho" class="meu-modal">
            <div class="meu-modal-conteudo">
                <span id="fecharMeuCarrinho" class="meu-fechar">&times;</span>
                <iframe src="carrinho.php" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <div class="produtos-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="produto">';
                echo '<a href="produto_perfumaria.php?id=' . $row['id'] . '">';
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
    <script>
        const abrirMeuCarrinho = document.getElementById('abrirMeuCarrinho');
        const meuModalCarrinho = document.getElementById('meuModalCarrinho');
        const fecharMeuCarrinho = document.getElementById('fecharMeuCarrinho');

        abrirMeuCarrinho.addEventListener('click', (e) => {
            e.preventDefault();
            meuModalCarrinho.style.display = 'flex';
        });

        fecharMeuCarrinho.addEventListener('click', () => {
            meuModalCarrinho.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === meuModalCarrinho) {
                meuModalCarrinho.style.display = 'none';
            }
        });
    </script>

</body>

</html>