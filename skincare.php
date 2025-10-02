<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabelos</title>
    <style>
        body {
            background-color: #e2cfe2;
        }

        .imagem-com-borda {
            border: 5px solid #FFFAFA;
            background-color: #FFFAFA;
            padding: 15px;
            width: 275px;
            display: inline-block;
        }

        p {
            background-color: #FFFAFA;
            margin-top: 0;
        }

        button {
            border: white;
            background-color: white;
            width: 200px;
            padding: 10px;
        }

        h4 {
            font-family: Arial, Helvetica, sans-serif;
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
            width: 290px;
            padding: 10px;
        }
    </style>
</head>
<div style="display: flex; justify-content: space-between; align-items: center; padding: 10px;">
    <a href="index.php">
        <img src="img/seta-removebg-preview.png" width="45px">
    </a>

    <a href="carrinho.php">
        <img src="img/sacola-removebg-preview.png" width="45px">
    </a>
</div>
<h2>Skincare</h2>
<h4>Ácidos e Sérum:</h4>

<body>
    <table>
        <tr>
            <td><img src="img/creamyazul-removebg-preview.png" width="220px" class="imagem-com-borda">
                <center>
                    <p>Creme Ácido Glicólico <br> Creamy - 30g <br>R$84,90</p>
                </center>
                <form action="adicionar_carrinho.php" method="post" class="quantidade">
                    <input type="hidden" name="produto_id" value="1">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">

                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form>

            </td>
            <td><img src="img/creamylaranja-removebg-preview.png" width="200px" class="imagem-com-borda">
                <center>
                    <p>Creamy Sérum Facial 30ml <br> Vitamina C<br>R$105,00</p>
                </center>
                <form action="adicionar_carrinho.php" method="post" class="quantidade">
                    <input type="hidden" name="produto_id" value="1">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">

                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form>

            </td>
            <td><img src="img/creamyrosa-removebg-preview.png" width="210px" class="imagem-com-borda">
                <center>
                    <p>Ácido Mandélico <br>Gel Creamy 30g <br>R$84,20</p>
                </center>
                <form action="adicionar_carrinho.php" method="post" class="quantidade">
                    <input type="hidden" name="produto_id" value="1">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">

                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form>


            </td>
            <td><img src="img/creamyroxo-removebg-preview.png" width="200px" class="imagem-com-borda">
                <center>
                    <p>Retinol: com ativos hidratantes <br>calmantes e antioxidantes <br>R$105,20</p>
                </center>
                <form action="adicionar_carrinho.php" method="post" class="quantidade">
                    <input type="hidden" name="produto_id" value="1">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">

                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form>


        </tr>

    </table>
    <h4>Creamy em geral:</h4>
    <table>
        <tr>
            <td><img src="img/bodycream-removebg-preview.png" width="200px" class="imagem-com-borda">
                <center>

                    <p>Creme Hidratante Facial Creamy <br>R$50,26</p>
                </center>
                <form action="adicionar_carrinho.php" method="post" class="quantidade">
                    <input type="hidden" name="produto_id" value="1">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">

                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form>


            </td>
            <td><img src="img/gel-removebg-preview.png" width="200px" class="imagem-com-borda">
                <center>
                    <p>Creamy Gel De Limpeza 200ml<br>R$63,15</p>
                </center>
                <form action="adicionar_carrinho.php" method="post" class="quantidade">
                    <input type="hidden" name="produto_id" value="1">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">

                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form>

            </td>
            <td><img src="img/hidratante-removebg-preview.png" width="200px" class="imagem-com-borda">
                <center>
                    <p>Loção Hidratante Corporal <br>R$63,15</p>
                </center>
                <form action="adicionar_carrinho.php" method="post" class="quantidade">
                    <input type="hidden" name="produto_id" value="1">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">

                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form>

            </td>
            <td><img src="img/lip-removebg-preview.png" width="200px" class="imagem-com-borda">
                <center>
                    <p>Lip Balm Incolor<br>R$40,00</p>
                </center>
                <form action="adicionar_carrinho.php" method="post" class="quantidade">
                    <input type="hidden" name="produto_id" value="1">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="1" min="1">

                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form

                    </td>
        </tr>
    </table>

</body>

</html>