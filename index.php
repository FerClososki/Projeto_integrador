<?php
session_start();
require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Beleza Web</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css" />
  <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  
  <link rel="icon" type="image/png" href="favicon.ico/logo_2x.png">

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

    .produtos-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .produto {
      display: inline-block;
      margin: 15px;
      border: 1px solid #ccc;
      padding: 10px;
      background: #fff;
      width: 220px;
      text-align: center;
    }

    .produto img {
      width: 200px;
    }

    .produto button {
      border: 2px solid #FF00FF;
      background: white;
      padding: 10px;
      width: 100%;
      margin-top: 5px;
      cursor: pointer;
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

    .hover {
      opacity: 0;
    }

    .imagem-container:hover .hover {
      opacity: 1;
    }

    .imagem-container:hover .principal {
      opacity: 0;
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
      pointer-events: none;
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

    .btn-desconto {
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 50px;
      padding: 12px 25px;
      margin: 10px;
      font-size: 14px;
      font-weight: 500;
      letter-spacing: 1px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-desconto strong {
      font-weight: 700;
    }

    .btn-desconto:hover {
      background-color: #333;
      transform: scale(1.05);
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
      color: #ec76ecff;
      font-size: 18px;
    }

    .btn-comprar {
      background: linear-gradient(135deg, #ec76ecff, #ec76ecff);
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
      background: linear-gradient(135deg, #ec76ecff, #ec76ecff);
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

    /* ======== RESPONSIVIDADE GERAL ======== */
    @media (max-width: 1200px) {
      .imagem-container {
        width: 90%;
        height: auto;
      }

      .imagem-container img {
        width: 100%;
        height: auto;
        position: relative;
      }

      .lista-produtos {
        gap: 15px;
        padding: 10px;
      }

      .card-produto {
        width: 45%;
      }
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 22px;
        padding: 8px;
      }

      header table {
        width: 100%;
      }

      header th {
        display: inline-block;
        margin: 5px;
      }

      .imagem-container {
        width: 100%;
        height: auto;
      }

      .imagem-container img {
        width: 100%;
        height: auto;
      }

      .btn-desconto {
        padding: 10px 20px;
        font-size: 13px;
      }

      .card-produto {
        width: 80%;
      }

      .container-imagem {
        width: 100%;
        height: auto;
      }

      .container-imagem img {
        width: 100%;
        height: auto;
      }

      .modal-content {
        width: 90%;
        padding: 20px;
      }
    }

    @media (max-width: 480px) {
      .btn-desconto {
        display: block;
        width: 90%;
        margin: 8px auto;
      }

      .card-produto {
        width: 95%;
      }

      .titulo-produto {
        font-size: 13px;
      }

      .preco-atual-produto {
        font-size: 15px;
      }

      h5 {
        font-size: 14px;
        padding: 0 10px;
      }

      img[width="1050px"],
      img[width="1200px"] {
        width: 100% !important;
        height: auto !important;
      }

      .imagem-container {
        width: 100%;
        height: auto;
      }
    }

    /*footer*/

    .footer {
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
      padding: 40px 20px;
      background-color: #efefef;
      color: #333;
      border-top: 1px solid #ddd;
      margin-top: 50px;
    }

    .footer-section {
      text-align: center;
      margin: 20px;
    }

    .footer-section h3 {
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 10px;
      color: #555;
    }

    .app-buttons img {
      width: 140px;
      margin: 5px;
      transition: transform 0.2s ease;
    }

    .app-buttons img:hover {
      transform: scale(1.05);
    }

    .logos {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .logos img {
      filter: grayscale(100%);
      opacity: 0.6;
      transition: opacity 0.3s ease;
    }

    .logos img:hover {
      opacity: 1;
      filter: none;
    }

    .premio img {
      width: 180px;
      opacity: 0.9;
    }

    /* footer 2 */
    .footer {
      background-color: #f8f6fc;
      color: #3a226b;
      font-family: Arial, sans-serif;
      padding: 40px 60px;
    }

    .footer-top {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 30px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 30px;
    }

    .footer-column {
      flex: 1;
      min-width: 180px;
    }

    .footer-column h3 {
      font-size: 15px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .footer-column ul {
      list-style: none;
      padding: 0;
    }

    .footer-column ul li {
      margin-bottom: 6px;
    }

    .footer-column a {
      color: #5a2ea6;
      text-decoration: none;
      font-size: 14px;
    }

    .footer-column a:hover {
      text-decoration: underline;
    }

    .footer-bottom {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
      margin-top: 20px;
      font-size: 14px;
    }

    .payment,
    .security,
    .social {
      flex: 1;
      min-width: 250px;
      margin: 15px 0;
    }

    .payment-icons img {
      height: 25px;
      margin-right: 8px;
      vertical-align: middle;
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
      background-color: #cf87f0ff;
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
      background-color: #55357cff;
      color: white;
      border: none;
      border-radius: 20px;
      padding: 6px 14px;
      font-size: 13px;
      cursor: pointer;
    }
  </style>
</head>

<body>
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
    <div class="imagem-container">
      <img src="img/imagem_inicial.jpg" class="imagem-destaque principal" />
      <img src="img/imagem_inicial2.jpg" class="imagem-destaque hover" />
    </div>
    <br />
    <a href="15%_desconto.php" class="btn-desconto">MÍNIMO <strong>15%</strong>OFF</a>
    <a href="50%_desconto.php" class="btn-desconto">MÍNIMO <strong>50%</strong>OFF</a>
    <a href="60%_desconto.php" class="btn-desconto">MÍNIMO <strong>60%</strong>OFF</a>
    <br />
    <div class="lista-produtos">
      <div class="card-produto" data-id="1" data-descricao="Máscara intensa para cabelos revitalizados e nutridos.">
        <div class="container-imagem">
          <img src="img/kerastase.png" alt="Kérastase Chronologiste Masque Intense" />
          <span class="etiqueta-desconto">-14%</span>
        </div>
        <h3 class="titulo-produto">Kérastase Chronologiste Masque Intense - 200ml</h3>
        <p class="preco-antigo-produto">R$ 292,70</p>
        <p class="preco-atual-produto">R$ 104,90</p>
      </div>

      <div class="card-produto" data-id="2" data-descricao="Tratamento nutritivo noturno para cabelos saudáveis.">
        <div class="container-imagem">
          <img src="img/kerastase2.png" alt="Kérastase Nutritive 8h Magic Night" />
          <span class="etiqueta-desconto">-22%</span>
        </div>
        <h3 class="titulo-produto">Kérastase Nutritive 8h Magic Night - 90ml</h3>
        <p class="preco-antigo-produto">R$ 531,90</p>
        <p class="preco-atual-produto">R$ 413,90</p>
      </div>

      <div class="card-produto" data-id="3" data-descricao="Máscara capilar que densifica e fortalece os fios.">
        <div class="container-imagem">
          <img src="img/produto3_inicial.jpg" alt="Kérastase Densifique Densité" />
          <span class="etiqueta-desconto">-30%</span>
        </div>
        <h3 class="titulo-produto">Kérastase Densifique Densité - Máscara Capilar 200ml</h3>
        <p class="preco-antigo-produto">R$ 437,90</p>
        <p class="preco-atual-produto">R$ 305,90</p>
      </div>
    </div>

    <br />
    <div>
      <img src="img/imagem_inicial7.png" width="1050px" height="150px" />
    </div>
    <br />
    <h5>Oportunidade única de renovar sua nécessaire</h5>
    <div class="lista-produtos">
      <div class="card-produto" data-id="4" data-descricao="Máscara para cílios Diorshow Iconic Overcurl à prova d'água.">
        <div class="container-imagem">
          <img src="img/rimeldior-removebg-preview.png" alt="Mascara para Cílios Diorshow" />
          <span class="etiqueta-desconto">-50%</span>
        </div>
        <h3 class="titulo-produto">Mascara para Cilios Diorshow Iconic Overcurl Waterproof</h3>
        <p class="preco-antigo-produto">R$ 265,70</p>
        <p class="preco-atual-produto">R$ 165,70</p>
      </div>

      <div class="card-produto" data-id="5" data-descricao="Perfume masculino 212 Vip Rosé Eau De Parfum 125ml.">
        <div class="container-imagem">
          <img src="img/212.png" alt="212 Vip Rosé Eau De Parfum" />
          <span class="etiqueta-desconto">-22%</span>
        </div>
        <h3 class="titulo-produto">212 Vip Rosé Eau De Parfum 125ml</h3>
        <p class="preco-antigo-produto">R$ 650,90</p>
        <p class="preco-atual-produto">R$ 413,90</p>
      </div>

      <div class="card-produto" data-id="6" data-descricao="Pó Fenty Beauty Pro Filtr Soft Matte para acabamento perfeito.">
        <div class="container-imagem">
          <img src="img/po1-removebg-preview (2).png" alt="Pó Fenty Beauty" />
          <span class="etiqueta-desconto">-30%</span>
        </div>
        <h3 class="titulo-produto">Pó Fenty Beauty Pro Filtr Soft Matte</h3>
        <p class="preco-antigo-produto">R$ 437,90</p>
        <p class="preco-atual-produto">R$ 305,90</p>
      </div>

      <div class="card-produto" data-id="7" data-descricao="Kit Completo Ultimate Repair para cabelos danificados.">
        <div class="container-imagem">
          <img src="img/wella1.sem_fundo.jpg" alt="Kit Completo Ultimate Repair" />
          <span class="etiqueta-desconto">-10%</span>
        </div>
        <h3 class="titulo-produto">Kit Completo Ultimate Repair</h3>
        <p class="preco-antigo-produto">R$ 710,90</p>
        <p class="preco-atual-produto">R$ 610,90</p>
      </div>

      <div class="card-produto" data-id="8" data-descricao="Perfume Invictus Paco Rabanne masculino.">
        <div class="container-imagem">
          <img src="img/invictus-removebg-preview.png" alt="Perfume Invictus Paco Rabanne" />
          <span class="etiqueta-desconto">-10%</span>
        </div>
        <h3 class="titulo-produto">Perfume Invictus Paco Rabanne Masculino</h3>
        <p class="preco-antigo-produto">R$ 539,90</p>
        <p class="preco-atual-produto">R$ 439,90</p>
      </div>
    </div>
    <h5>BOSS: elegância alemã em perfumes e moda para quem vive com sofisticação!</h5>
    <div>
      <img src="img/imagem_inicial8.png" width="1200px" height="400px" />
    </div>
    <div class="lista-produtos">
      <div class="card-produto" data-id="9" data-descricao="Perfume.">
        <div class="container-imagem">
          <img src="img/boss.png" alt="Mascara para Cílios Diorshow" />
          <span class="etiqueta-desconto">-15%</span>
        </div>
        <h3 class="titulo-produto">Hugo Boss Bottled Perfume Masculino (200ml)</h3>
        <p class="preco-antigo-produto">R$ 503,99</p>
        <p class="preco-atual-produto">R$ 428,40</p>
      </div>

      <div class="card-produto" data-id="10" data-descricao="Perfume.">
        <div class="container-imagem">
          <img src="img/boss1.png" alt="212 Vip Rosé Eau De Parfum" />
          <span class="etiqueta-desconto">-22%</span>
        </div>
        <h3 class="titulo-produto">Hugo Boss Bottled Parfum - Perfume Masculino (200ml)</h3>
        <p class="preco-antigo-produto">R$ 686,90</p>
        <p class="preco-atual-produto">R$ 535,78</p>
      </div>

      <div class="card-produto" data-id="11" data-descricao="Perfume.">
        <div class="container-imagem">
          <img src="img/boss2.png" alt="Pó Fenty Beauty" />
          <span class="etiqueta-desconto">-30%</span>
        </div>
        <h3 class="titulo-produto">Hugo Boss Bottled Tonic - Perfume Masculino (100ml)</h3>
        <p class="preco-antigo-produto">R$ 458,90</p>
        <p class="preco-atual-produto">R$ 321,23</p>
      </div>

      <div class="card-produto" data-id="12" data-descricao="Perfume.">
        <div class="container-imagem">
          <img src="img/boss3.png" alt="Kit Completo Ultimate Repair" />
          <span class="etiqueta-desconto">-10%</span>
        </div>
        <h3 class="titulo-produto">Bottled Triumph Elixir Hugo Boss Perfume Masculino 50ml</h3>
        <p class="preco-antigo-produto">R$ 578,90</p>
        <p class="preco-atual-produto">R$ 521,01</p>
      </div>

      <div class="card-produto" data-id="13" data-descricao="Perfume.">
        <div class="container-imagem">
          <img src="img/boss4.png" alt="Perfume Invictus Paco Rabanne" />
          <span class="etiqueta-desconto">-10%</span>
        </div>
        <h3 class="titulo-produto">The Scent Magnetic Hugo Boss Perfume Masculino 50ml</h3>
        <p class="preco-antigo-produto">R$ 458,00</p>
        <p class="preco-atual-produto">R$ 412,20</p>
      </div>
    </div>
  </center>


  <div id="produtoModal" class="modal">
    <div class="modal-overlay"></div>
    <div class="modal-content">
      <span class="close">&times;</span>
      <img id="modalImagem" src="" alt="Produto" />
      <h3 id="modalTitulo"></h3>
      <p id="modalDescricao"></p>
      <p id="modalPrecoAntigo"></p>
      <p id="modalPrecoAtual"></p>

      <form id="formAdicionarCarrinho" method="post">
        <input type="hidden" name="produto_id" id="produtoId" value="" />
        <label for="modalQuantidade">Quantidade:</label><br />
        <input type="number" name="quantidade" id="modalQuantidade" value="1" min="1" required />
        <br />
        <button type="submit" class="btn-comprar">Comprar</button>
      </form>
    </div>
  </div>
  <br>


  <script>
    const produtos = {
      1: {
        titulo: "Kérastase Chronologiste Masque Intense - 200ml",
        descricao: "Máscara intensa para cabelos revitalizados e nutridos.",
        precoAntigo: "R$ 292,70",
        precoAtual: "R$ 104,90",
        imagem: "img/kerastase.png"
      },
      2: {
        titulo: "Kérastase Nutritive 8h Magic Night - 90ml",
        descricao: "Tratamento nutritivo noturno para cabelos saudáveis.",
        precoAntigo: "R$ 531,90",
        precoAtual: "R$ 413,90",
        imagem: "img/kerastase2.png"
      },
      3: {
        titulo: "Kérastase Densifique Densité - Máscara Capilar 200ml",
        descricao: "Máscara capilar que densifica e fortalece os fios.",
        precoAntigo: "R$ 437,90",
        precoAtual: "R$ 305,90",
        imagem: "img/produto3_inicial.jpg"
      },
      4: {
        titulo: "Mascara para Cilios Diorshow Iconic Overcurl Waterproof",
        descricao: "Máscara para cílios Diorshow Iconic Overcurl à prova d'água.",
        precoAntigo: "R$ 265,70",
        precoAtual: "R$ 165,70",
        imagem: "img/rimeldior-removebg-preview.png"
      },
      5: {
        titulo: "212 Vip Rosé Eau De Parfum 125ml",
        descricao: "Perfume masculino 212 Vip Rosé Eau De Parfum 125ml.",
        precoAntigo: "R$ 650,90",
        precoAtual: "R$ 413,90",
        imagem: "img/212.png"
      },
      6: {
        titulo: "Pó Fenty Beauty Pro Filtr Soft Matte",
        descricao: "Pó Fenty Beauty Pro Filtr Soft Matte para acabamento perfeito.",
        precoAntigo: "R$ 437,90",
        precoAtual: "R$ 305,90",
        imagem: "img/po1-removebg-preview (2).png"
      },
      7: {
        titulo: "Kit Completo Ultimate Repair",
        descricao: "Kit Completo Ultimate Repair para cabelos danificados.",
        precoAntigo: "R$ 710,90",
        precoAtual: "R$ 610,90",
        imagem: "img/wella1.sem_fundo.jpg"
      },
      8: {
        titulo: "Perfume Invictus Paco Rabanne Masculino",
        descricao: "Perfume Invictus Paco Rabanne masculino.",
        precoAntigo: "R$ 539,90",
        precoAtual: "R$ 439,90",
        imagem: "img/invictus-removebg-preview.png"
      },
      9: {
        titulo: "Hugo Boss Bottled Perfume Masculino (200ml)",
        descricao: "Perfume Hugo Boss Bottled Masculino.",
        precoAntigo: "R$ 503,99",
        precoAtual: "R$ 428,40",
        imagem: "img/boss.png"
      },
      10: {
        titulo: "Hugo Boss Bottled Parfum - Perfume Masculino (200ml)",
        descricao: "Perfume Hugo Boss Bottled Parfum Masculino.",
        precoAntigo: "R$ 686,90",
        precoAtual: "R$ 535,78",
        imagem: "img/boss1.png"
      },
      11: {
        titulo: "Hugo Boss Bottled Tonic - Perfume Masculino (100ml)",
        descricao: "Perfume Hugo Boss Bottled Tonic Masculino.",
        precoAntigo: "R$ 458,90",
        precoAtual: "R$ 321,23",
        imagem: "img/boss2.png"
      },
      12: {
        titulo: "Bottled Triumph Elixir Hugo Boss Perfume Masculino 50ml",
        descricao: "Perfume Hugo Boss Bottled Triumph Elixir Masculino.",
        precoAntigo: "R$ 578,90",
        precoAtual: "R$ 521,01",
        imagem: "img/boss3.png"
      },
      13: {
        titulo: "The Scent Magnetic Hugo Boss Perfume Masculino 50ml",
        descricao: "Perfume Hugo Boss The Scent Magnetic Masculino.",
        precoAntigo: "R$ 458,00",
        precoAtual: "R$ 412,20",
        imagem: "img/boss4.png"
      }
    };

    const modal = document.getElementById("produtoModal");
    const modalOverlay = modal.querySelector(".modal-overlay");
    const closeBtn = modal.querySelector(".close");
    const modalImagem = document.getElementById("modalImagem");
    const modalTitulo = document.getElementById("modalTitulo");
    const modalDescricao = document.getElementById("modalDescricao");
    const modalPrecoAntigo = document.getElementById("modalPrecoAntigo");
    const modalPrecoAtual = document.getElementById("modalPrecoAtual");
    const produtoIdInput = document.getElementById("produtoId");
    const quantidadeInput = document.getElementById("modalQuantidade");

    document.querySelectorAll(".card-produto").forEach(card => {
      card.addEventListener("click", e => {
        if (e.target.closest("form") || e.target.closest("button")) return;

        const id = card.dataset.id;
        const produto = produtos[id];
        if (!produto) return;

        modalImagem.src = produto.imagem;
        modalTitulo.textContent = produto.titulo;
        modalDescricao.textContent = produto.descricao;
        modalPrecoAntigo.textContent = produto.precoAntigo;
        modalPrecoAtual.textContent = produto.precoAtual;
        produtoIdInput.value = id;
        quantidadeInput.value = 1;

        modal.style.display = "flex";
      });
    });

    modalOverlay.addEventListener("click", () => modal.style.display = "none");
    closeBtn.addEventListener("click", () => modal.style.display = "none");
    window.addEventListener("keydown", e => {
      if (e.key === "Escape") modal.style.display = "none";
    });

    document.getElementById("formAdicionarCarrinho").addEventListener("submit", e => {
      if (!produtoIdInput.value) {
        e.preventDefault();
        alert("Erro: produto não identificado!");
      }
      console.log("Produto enviado:", produtoIdInput.value);
    });
    document.getElementById("formAdicionarCarrinho").addEventListener("submit", e => {
      e.preventDefault();

      const id = produtoIdInput.value;
      const categorias = {
        1: "cabelos.php",
        2: "cabelos.php",
        3: "cabelos.php",
        4: "maquiagem.php",
        5: "perfumaria.php",
        6: "maquiagem.php",
        7: "cabelos.php",
        8: "perfumaria.php",
        9: "perfumaria.php",
        10: "perfumaria.php",
        11: "perfumaria.php",
        12: "perfumaria.php",
        13: "perfumaria.php"
      };

      const paginaCategoria = categorias[id] || "index.php";
      window.location.href = paginaCategoria;
    });
  </script>
  <footer class="footer">
    <div class="footer-section apps">
      <h3>Baixe nossos aplicativos</h3>
      <div class="app-buttons">
        <a href="https://play.google.com/store/apps/details?id=br.com.belezanaweb.android&hl=pt" target="_blank">
          <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
        </a>
        <a href="https://apps.apple.com/br/app/beleza-na-web-cosm%C3%A9ticos/id1137374669" target="_blank">
          <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store">
        </a>
      </div>
    </div>

    <div class="footer-section midia">
      <h3>Na mídia</h3>
      <div class="logos">
        <img src="https://via.placeholder.com/80x20?text=EXAME" alt="Exame">
        <img src="https://via.placeholder.com/80x20?text=Veja" alt="Veja">
        <img src="https://via.placeholder.com/80x20?text=Estadão" alt="Estadão">
        <img src="https://via.placeholder.com/80x20?text=ELLE" alt="Elle">
        <img src="https://via.placeholder.com/80x20?text=Glamour" alt="Glamour">
      </div>
    </div>

    <div class="footer-section premio">
      <h3>Prêmio</h3>
      <img src="https://via.placeholder.com/180x60?text=Prêmio+eCommerceBrasil" alt="Prêmio eCommerceBrasil">
    </div>
  </footer>
  <footer class="footer">
    <div class="footer-top">
      <div class="footer-column">
        <h3>Ajuda & Suporte</h3>
        <ul>
          <li><a href="#">Relacionamento com o Cliente</a></li>
          <li><a href="#">Política de Devolução</a></li>
          <li><a href="#">Política de Privacidade</a></li>
          <li><a href="#">Consumidor.gov.br</a></li>
          <li><a href="#">Código de Defesa do Consumidor</a></li>
          <li><a href="#">Termos de Uso</a></li>
          <li><a href="#">Mapa do Site</a></li>
          <li><a href="#">Outlet</a></li>
          <li><a href="#">Nossas Lojas</a></li>
          <li><a href="quemsomos.php">Quem Somos</a></li>
          <li><a href="#">Promoções e Cupons</a></li>
          <li><a href="#">Venda em nosso Marketplace</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Departamentos</h3>
        <ul>
          <li><a href="cabelos.php">Produtos para Cabelo</a></li>
          <li><a href="perfumaria.php">Perfumes</a></li>
          <li><a href="maquiagem.php">Maquiagem</a></li>
          <li><a href="skincare.php">Skincare</a></li>
          <li><a href="corpo.php">Corpo e Banho</a></li>
          <li><a href="cabelos.php">Cronograma Capilar</a></li>
          <li><a href="skincare.php">Dermocosméticos</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Destaques</h3>
        <ul>
          <li><a href="#">Beauty Friday 2025</a></li>
          <li><a href="#">Presentes</a></li>
          <li><a href="#">Alto Luxo</a></li>
          <li><a href="#">Perfumes Árabes</a></li>
          <li><a href="#">Produtos Exclusivos</a></li>
          <li><a href="#">K-Beauty e J-Beauty</a></li>
          <li><a href="50%_desconto.php">Desconto</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Em Alta</h3>
        <ul>
          <li><a href="#">Shampoo Antiqueda</a></li>
          <li><a href="#">Shampoo para Cabelos Brancos</a></li>
          <li><a href="#">Shampoo a Seco</a></li>
          <li><a href="#">Leave-in</a></li>
          <li><a href="#">Protetor Térmico</a></li>
          <li><a href="#">Perfume de Cabelo</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Minha Conta</h3>
        <ul>
          <li><a href="#">Dados Pessoais</a></li>
          <li><a href="#">Meus Endereços</a></li>
          <li><a href="#">Alterar Senha</a></li>
          <li><a href="#">Meus Pedidos</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Loucas por Beleza</h3>
        <ul>
          <li><a href="#">Últimas</a></li>
          <li><a href="#">Resenhas</a></li>
          <li><a href="#">Alto Luxo</a></li>
          <li><a href="#">Siga nosso canal no WhatsApp</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Marcas</h3>
        <ul>
          <li><a href="#">Beleza na Web Pro</a></li>
          <li><a href="https://www.boticario.com.br/">O Boticário</a></li>
          <li><a href="https://trussprofessional.com/">Truss</a></li>
          <li><a href="https://www.eudora.com.br/">Eudora</a></li>
          <li><a href="https://www.quemdisseberenice.com.br/">Quem Disse, Berenice?</a></li>
          <li><a href="https://www.vult.com.br/?srsltid=AfmBOoo91nomcetkdi-tRNnpOf-CTw-1M3UngAzuM2IlVNqI4DFKx1zW">Vult</a></li>
          <li><a href="#">O.U.i</a></li>
          <li><a href="#">Dr Jones</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="payment">
        <h4>Pagamento</h4>
        <div class="payment-icons">
          <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
          <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard">
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/30/American_Express_logo_%282018%29.svg" alt="Amex">
          <img src="https://upload.wikimedia.org/wikipedia/commons/c/cb/Elo_card_logo.svg" alt="Elo">
          <img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Pix_logo.svg" alt="Pix">
        </div>
        <p>Até 10x sem juros no cartão. Confira as regras</p>
      </div>

      <div class="security">
        <h4>Segurança</h4>
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/GeoTrust_logo.svg" alt="GeoTrust">
      </div>

      <div class="social">
        <h4>Siga a empresa nas redes</h4>
        <div class="social-icons">
          <a href="https://www.facebook.com/belezanaweb/?locale=pt_BR" target="_blank"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/belezanaweb/?hl=pt" target="_blank"><i class="bi bi-instagram"></i></a>
          <a href="https://www.youtube.com/@BelezanaWeb" target="_blank"><i class="bi bi-youtube"></i></a>
          <a href="https://www.tiktok.com/@belezanaweb" target="_blank"><i class="bi bi-tiktok"></i></a>
          <a href="https://api.whatsapp.com/send/?phone=551134897076&text&type=phone_number&app_absent=0" target="_blank"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>