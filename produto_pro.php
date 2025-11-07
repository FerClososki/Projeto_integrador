<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beleza na Web PRO</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        /* Faixa preta superior */
        .top-bar {
            background-color: #000;
            color: #fff;
            text-align: center;
            font-size: 13px;
            padding: 6px 0;
        }

        /* Faixa roxa com promoção */
        .promo-bar {
            background-color: #7251a3;
            color: #fff;
            text-align: center;
            padding: 8px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .promo-bar .promo-button {
            background-color: #1e0b36;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 13px;
            cursor: pointer;
        }

        /* Header principal */
        .header {
            background-color: #260f36;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 50px;
            flex-wrap: wrap;
        }

        .logo h1 {
            font-size: 26px;
            font-weight: 700;
        }

        .logo span {
            font-size: 12px;
            display: block;
        }

        .logo strong {
            margin-left: 8px;
            font-size: 20px;
            font-weight: 600;
        }

        /* Caixa de busca */
        .search-box {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            width: 400px;
            max-width: 100%;
        }

        .search-box input {
            border: none;
            padding: 10px;
            flex: 1;
            font-size: 14px;
        }

        .search-box button {
            background-color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 10px;
        }

        /* Ícones e ações do header */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 13px;
        }

        .header-actions div span {
            text-align: right;
            line-height: 1.2;
            display: inline-block;
        }

        .header-actions strong {
            display: block;
            font-size: 14px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
                padding: 20px;
            }

            .header-actions {
                justify-content: space-around;
                width: 100%;
            }

            .search-box {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <p>Site exclusivo para profissionais de beleza com CNPJ/MEI</p>
    </div>
    
    <div class="promo-bar">
        <span class="promo-text"><strong>10% OFF</strong> na primeira compra acima de <strong>R$ 199</strong></span>
        <button class="promo-button">CUPOM: SOUPRO</button>
    </div>
    <header class="header">
        <div class="logo">
            <h1>beleza <span>NA WEB</span> <strong>PRO</strong></h1>
        </div>

        <div class="search-box">
            <input type="text" placeholder="Buscar produtos, marcas e muito mais...">
            <button class="search-btn">🔍</button>
        </div>

        <div class="header-actions">
            <div class="location">
                <span>📍 Informe sua<br><strong>Localização</strong></span>
            </div>
            <div class="account">
                <span>👤 Olá! Entrar na<br><strong>Minha Conta</strong></span>
            </div>
            <div class="bag">
                <span>🛍️ Sua<br><strong>Sacola</strong></span>
            </div>
        </div>
    </header>
</body>

</html>