<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Eventos</title>
    <i class="bi bi-calendar-event"></i>
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

        .eventos-section {
            text-align: center;
            padding: 60px 40px;
        }

        .eventos-header {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-bottom: 40px;
        }

        .eventos-header img {
            width: 70px;
            margin-bottom: 10px;
        }

        .eventos-header h2 {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin: 10px 0 8px 0;
        }

        .eventos-header p {
            font-size: 15px;
            color: #666;
            margin-bottom: 20px;
        }

        .btn-topo {
            background-color: #8a66b4;
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 10px 25px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-topo:hover {
            background-color: #7b5aa4;
            transform: translateY(-2px);
        }

        .cards-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .card-evento {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 320px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-evento:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .card-evento img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-conteudo {
            padding: 20px 20px 30px;
        }

        .card-conteudo h3 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
            text-transform: uppercase;
        }

        .card-conteudo p {
            font-size: 14px;
            line-height: 1.6;
            color: #555;
            margin: 5px 0;
        }

        .card-conteudo strong {
            color: #333;
        }

        .btn-card {
            margin-top: 15px;
            border: 1.5px solid #8a66b4;
            color: #8a66b4;
            background-color: transparent;
            border-radius: 25px;
            padding: 8px 25px;
            font-size: 14px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-card:hover {
            background-color: #8a66b4;
            color: #fff;
        }

        @media (max-width: 950px) {
            .cards-container {
                gap: 20px;
            }

            .card-evento {
                width: 90%;
            }
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

        .cor {
            color: #b238d1ff;
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
        <h2 class="cor">Lojas Físicas | Beleza Web</h2>
        <video width="840" height="560" controls autoplay muted loop>
            <source src="img/video_localização.mp4" type="video/mp4">
        </video>
        <section class="eventos-section">
            <div class="eventos-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg>
                <h2>CALENDÁRIO DE EVENTOS</h2>

            </div>

            <div class="cards-container">
                <div class="card-evento">
                    <img src="img/fachada.png" alt="Loja Moema">
                    <div class="card-conteudo">
                        <h3>MOEMA / SP</h3>
                        <p>Rua Gaivota, 1312 - Moema</p>
                        <p><strong>Horário de Funcionamento:</strong><br>
                            Segunda a Sexta: 10h às 20h<br>
                            Sábado: 10h às 19h<br>
                            Domingo: Fechada</p>
                        <p><strong>Telefone:</strong> (11) 5096-7503</p>
                        <a href="https://www.google.com/maps/place/Beleza+na+Web+-+Moema/@-23.6065319,-46.6705251,15z/data=!4m6!3m5!1s0x94ce51c4905f4701:0x1e5e65c94df19104!8m2!3d-23.6065319!4d-46.6705251!16s%2Fg%2F11sk17mypz?hl=pt-BR&entry=ttu&g_ep=EgoyMDI1MTAyNy4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                            <button class="btn-card">CONFIRA</button></a>
                    </div>
                </div>

                <div class="card-evento">
                    <img src="img/fachada1.png" alt="Loja Morumbi">
                    <div class="card-conteudo">
                        <h3>SHOPPING MORUMBI / SP</h3>
                        <p>Av. Roque Petroni Júnior, 1089<br>
                            Térreo, Loja 88 - Jardim das Acácias</p>
                        <p><strong>Horário de Funcionamento:</strong><br>
                            Segunda a Sábado: 10h às 22h<br>
                            Domingo: 14h às 20h</p>
                        <p><strong>Telefone:</strong> (11) 5181-3973</p>
                        <a href="https://www.google.com/maps/place/Beleza+na+Web+-+Shopping+Morumbi/@-23.6230632,-46.6983715,15z/data=!4m6!3m5!1s0x94ce50c35b98c829:0x8fcf49803f589a24!8m2!3d-23.6230632!4d-46.6983715!16s%2Fg%2F11dxcg1hqv?sa=X&ved=2ahUKEwjgzvuKyfaDAxXprpUCHYx3CS8Q_BJ6BAhdEAA&hl=pt-BR&entry=tts" target="_blank">
                            <button class="btn-card">CONFIRA</button></a>
                    </div>
                </div>

                <div class="card-evento">
                    <img src="img/fachada2.png" alt="Loja Rom Concept">
                    <div class="card-conteudo">
                        <h3>ROM CONCEPT / SP</h3>
                        <p>Av. Brasil, 126 - Jardim Paulista</p>
                        <p><strong>Horário de Funcionamento:</strong><br>
                            Terça a Sábado: 09h às 21h<br>
                            Domingo e Segunda: Fechado</p>
                        <p><strong>Telefone:</strong> (11) 3051-4909</p>
                        <a href="https://www.google.com/maps/place/ROM.+Concept/@-23.5780488,-46.6623802,17z/data=!3m1!4b1!4m6!3m5!1s0x94ce5929e5e7e6ef:0x96aaff1c0836e1a2!8m2!3d-23.5780488!4d-46.6623802!16s%2Fg%2F11gxrcb8f2?entry=ttu&g_ep=EgoyMDI1MDUyMS4wIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D" target="_blank">
                            <button class="btn-card">CONFIRA</button></a>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="cards-container">
                <div class="card-evento">
                    <img src="img/fachada.png" alt="Loja Moema">
                    <div class="card-conteudo">
                        <h3>SHOPPING ANÁLIA | SP</h3>
                        <p>Av. Reg. Feijó, 1739 - Tatuapé</p>
                        <p><strong>Horário de Funcionamento:</strong><br>
                            Segunda a Sexta: 10h às 20h<br>
                            Sábado: 10h às 19h<br>
                            Domingo: Fechada</p>
                        <p><strong>Telefone:</strong> (11) 5096-7503</p>
                        <a href="https://www.google.com/maps/place/Beleza+na+Web+-+Shopping+An%C3%A1lia+Franco/@-23.5611682,-46.5600261,17z/data=!3m1!4b1!4m6!3m5!1s0x94ce5d230f5c4135:0xbe6f3bc108cc5cd5!8m2!3d-23.5611682!4d-46.5600261!16s%2Fg%2F11xp3tr70n?hl=pt-BR&entry=ttu&g_ep=EgoyMDI1MTAyNy4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                            <button class="btn-card">CONFIRA</button></a>
                    </div>
                </div>

                <div class="card-evento">
                    <img src="img/fachada1.png" alt="Loja Morumbi">
                    <div class="card-conteudo">
                        <h3>BH SHOPPING</h3>
                        <p>BR-356, 3049 -
                            <br>Loja 012 - Belvedere
                        </p>
                        <p><strong>Horário de Funcionamento:</strong><br>
                            Segunda a Sábado: 10h às 22h<br>
                            Domingo: 14h às 20h</p>
                        <p><strong>Telefone:</strong> (11) 5181-3973</p>
                        <a href="https://www.google.com/maps/place/Beleza+na+Web+-+Shopping+Morumbi/@-23.6230632,-46.6983715,15z/data=!4m6!3m5!1s0x94ce50c35b98c829:0x8fcf49803f589a24!8m2!3d-23.6230632!4d-46.6983715!16s%2Fg%2F11dxcg1hqv?sa=X&ved=2ahUKEwjgzvuKyfaDAxXprpUCHYx3CS8Q_BJ6BAhdEAA&hl=pt-BR&entry=tts" target="_blank">
                            <button class="btn-card">CONFIRA</button></a>
                    </div>
                </div>

                <div class="card-evento">
                    <img src="img/fachada2.png" alt="Loja Rom Concept">
                    <div class="card-conteudo">
                        <h3>BARRA SHOPPING / RJ</h3>
                        <p>Av. das Américas, 4666 - Barra da Tijuca</p>
                        <p><strong>Horário de Funcionamento:</strong><br>
                            Terça a Sábado: 09h às 21h<br>
                            Domingo e Segunda: Fechado</p>
                        <p><strong>Telefone:</strong> (11) 3051-4909</p>
                        <a href="https://www.google.com/maps/place/Beleza+na+Web+-+Barra+da+Tijuca/@-22.9983176,-43.3568566,15z/data=!4m6!3m5!1s0x9bda38017f115b:0xb27be223d8bb9439!8m2!3d-22.9983176!4d-43.3568566!16s%2Fg%2F11c6qr6dkf?entry=ttu&g_ep=EgoyMDI1MTAyNy4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                            <button class="btn-card">CONFIRA</button></a>
                    </div>
                </div>
            </div>
        </section>

</body>

</html>