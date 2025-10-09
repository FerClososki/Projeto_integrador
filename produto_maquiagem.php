<?php
session_start();
include "conexao.php";

if (!isset($_GET['id'])) {
    die("Produto não especificado.");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM produtos WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Produto não encontrado.");
}

$produto = $result->fetch_assoc();
function valorSeguro($campo, $padrao = '')
{
    return isset($campo) && $campo !== null ? htmlspecialchars($campo) : $padrao;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo valorSeguro($produto['nome'], 'Produto'); ?></title>
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
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

        .produto-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background-color: #fffafa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: 40px auto;
            gap: 40px;
        }

        .produto-imagem img {
            width: 340px;
            transition: transform 0.3s;
            padding-right: 100px;     
        }

        .produto-imagem img:hover {
            transform: scale(1.05);
        }

        .produto-info {
            max-width: 500px;
        }

        .avaliacao {
            color: gold;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .marca,
        .produto-info h1,
        .produto-info p {
            color: black;
            transition: color 0.3s ease;
        }

        .comprar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FF00FF;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        .comprar:hover {
            background-color: #d000d0;
        }
    </style>
</head>

<body>

    <div class="top-bar">
        <a href="maquiagem.php"><img src="img/seta-removebg-preview.png" alt="Voltar"></a>
        <a href="carrinho.php"><img src="img/sacola-removebg-preview.png" alt="Carrinho"></a>
    </div>

    <div class="produto-container">
        <div class="produto-imagem">
            <img src="<?php echo valorSeguro($produto['imagem']); ?>" alt="<?php echo valorSeguro($produto['nome']); ?>">
        </div>
        <div class="produto-info">
            <div class="avaliacao">★★★★☆ <span class="qtd">(6)</span></div>
            <h1><?php echo valorSeguro($produto['nome'], 'Produto sem nome'); ?></h1>
            <p><strong>R$<?php echo isset($produto['preco']) ? number_format($produto['preco'], 2, ',', '.') : '0,00'; ?></strong></p>

            <form method="POST" action="adicionar_carrinho.php">
                <input type="hidden" name="produto_id" value="<?php echo $produto['id']; ?>">
                <label>Quantidade:</label><br>
                <input type="number" name="quantidade" value="1" min="1" style="width:60px;"><br><br>
                <button type="submit" class="comprar">Comprar</button>
            </form>
        </div>
    </div>

</body>

</html>