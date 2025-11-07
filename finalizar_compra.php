<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_after_login'] = 'finalizar_compra.php';
    header("Location: login.php");
    exit();
}
$usuario_id = $_SESSION['user_id'];

// Calcula o total da compra
$stmt = $conn->prepare("
    SELECT c.quantidade, p.preco
    FROM carrinho c
    JOIN produtos p ON c.produto_id = p.id
    WHERE c.usuario_id = ?
");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$total = 0.0;
while ($row = $result->fetch_assoc()) {
    $total += $row['preco'] * $row['quantidade'];
}

// Se não houver produtos no carrinho, volta para index
if ($total == 0) {
    header("Location: index.php");
    exit();
}

// Processa o POST do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados básicos
    $endereco = trim($_POST['endereco'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $pagamento = trim($_POST['pagamento'] ?? '');

    // Se pagamento por cartão, recolhemos (temporariamente) os campos; não salvamos!
    $card_number = isset($_POST['card_number']) ? preg_replace('/\D/', '', $_POST['card_number']) : '';
    $card_name = trim($_POST['card_name'] ?? '');
    $card_exp = trim($_POST['card_exp'] ?? '');
    $card_cvv = trim($_POST['card_cvv'] ?? '');

    // Validações básicas
    if (!$endereco || !$telefone || !$pagamento) {
        $_SESSION['message'] = "Preencha todos os campos obrigatórios!";
        $_SESSION['message_type'] = "danger";
    } else {
        $valid = true;
        if ($pagamento === 'credito' || $pagamento === 'debito') {
            // Validações básicas de cartão (cliente) - servidor só checa formato, NÃO guarda dados sensíveis
            if (strlen($card_number) < 12 || strlen($card_number) > 19) {
                $valid = false;
                $_SESSION['message'] = "Número do cartão inválido.";
                $_SESSION['message_type'] = "danger";
            }
            // validade MM/YY ou MM/YYYY
            if (!preg_match('/^(0[1-9]|1[0-2])\/?([0-9]{2}|[0-9]{4})$/', $card_exp)) {
                $valid = false;
                $_SESSION['message'] = "Validade do cartão inválida.";
                $_SESSION['message_type'] = "danger";
            }
            // CVV 3 ou 4 dígitos
            if (!preg_match('/^[0-9]{3,4}$/', $card_cvv)) {
                $valid = false;
                $_SESSION['message'] = "CVV inválido.";
                $_SESSION['message_type'] = "danger";
            }
            // Aqui você poderia colocar uma checagem Luhn no servidor se quiser reforço (opcional).
        }

        if ($valid) {
            // Re-obtem os itens do carrinho apenas para garantir total atualizado (opcional)
            $stmt = $conn->prepare(" SELECT c.quantidade, p.preco FROM carrinho c JOIN produtos p ON c.produto_id = p.id WHERE c.usuario_id = ? ");
            $stmt->bind_param("i", $usuario_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Processamento do pagamento SIMULADO:
            // - Se PIX: assumimos que a confirmação veio do QR (já que o JS submete após 15s)
            // - Se Cartão: aqui apenas simulamos aprovação (em produção chame a API do gateway)
            // **NUNCA ARMAZENAR CVV ou número do cartão em texto plano.**

            // Limpa o carrinho inteiro do usuário
            $stmt = $conn->prepare("DELETE FROM carrinho WHERE usuario_id=?");
            $stmt->bind_param("i", $usuario_id);
            $stmt->execute();
            $stmt->close();

            // Salva o total na sessão para mostrar na página de confirmação
            $_SESSION['total_pedido'] = $total;

            // Opcional: poderia salvar um registro de pedido no banco com status "confirmado" etc.
            // IMPORTANTE: não salvar dados sensíveis do cartão.

            header("Location: pedido_concluido.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <style>
        body {
            background-color: #e2cfe2;
            font-family: Arial, sans-serif;
        }

        .confirmar {
            background-color: #BA55D3;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a,
        a:link,
        a:visited,
        a:hover,
        a:active {
            text-decoration: none;
        }

        .hidden {
            display: none;
        }

        .qr-box {
            background: white;
            padding: 15px;
            border-radius: 8px;
            display: inline-block;
            text-align: center;
        }

        .small-muted {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>

<body class="container mt-5">
    <h2>Finalizar Compra</h2>
    <hr>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= htmlspecialchars($_SESSION['message_type']) ?>">
            <?= htmlspecialchars($_SESSION['message']) ?>
        </div>
        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <h4>Total da compra: <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></h4>
    <br>

    <form id="checkoutForm" method="post" novalidate>
        <div class="form-group">
            <label>Digite o CEP:</label>
            <input type="text" name="endereco" class="form-control form-control-sm" placeholder="00000-000" maxlength="9" pattern="\d{5}-?\d{3}" required value="<?= isset($endereco) ? htmlspecialchars($endereco) : '' ?>">
        </div>
        <div>
            <label>Não sabe seu CEP?</label>
            <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Clique aqui</a>
        </div>
        <div class="form-group mt-2">
            <label>Digite seu CPF:</label>
            <input type="text" name="cpf" class="form-control form-control-sm" placeholder="000.000.000.00" class="form-control form-control-sm" maxlength="11" required value="<?= isset($cpf) ? htmlspecialchars($cpf) : '' ?>">
        </div>

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="(xx) xxxxx-xxxx" class="form-control form-control-sm" maxlength="11" required value="<?= isset($telefone) ? htmlspecialchars($telefone) : '' ?>">
        </div>

        <div class="form-group">
            <label>Forma de Pagamento:</label><br>
            <div class="form-check">
                <input class="form-check-input pagamento-radio" type="radio" id="payPix" name="pagamento" value="pix" required <?= (isset($pagamento) && $pagamento === 'pix') ? 'checked' : '' ?>>
                <label class="form-check-label" for="payPix">Pix</label>
            </div>
            <div class="form-check">
                <input class="form-check-input pagamento-radio" type="radio" id="payCredito" name="pagamento" value="credito" required <?= (isset($pagamento) && $pagamento === 'credito') ? 'checked' : '' ?>>
                <label class="form-check-label" for="payCredito">Cartão de Crédito</label>
            </div>
            <div class="form-check">
                <input class="form-check-input pagamento-radio" type="radio" id="payDebito" name="pagamento" value="debito" required <?= (isset($pagamento) && $pagamento === 'debito') ? 'checked' : '' ?>>
                <label class="form-check-label" for="payDebito">Cartão de Débito</label>
            </div>
        </div>

        <!-- Campos de cartão (aparecem somente se crédito/débito selecionado) -->
        <div id="cardFields" class="hidden">
            <h5>Dados do Cartão</h5>
            <div class="form-group">
                <label>Número do cartão</label>
                <input type="text" id="card_number" name="card_number" class="form-control" placeholder="0000 0000 0000 0000" maxlength="16">
                <small class="small-muted">Somente números. Não envie dados reais de cartão neste ambiente de teste.</small>
            </div>
            <div class="form-group">
                <label>Nome no cartão</label>
                <input type="text" id="card_name" name="card_name" class="form-control" placeholder="NOME COMPLETO" maxlength="30">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Validade (MM/AA)</label>
                    <input type="text" id="card_exp" name="card_exp" class="form-control" placeholder="MM/AA" maxlength="4">
                </div>
                <div class="form-group col-md-6">
                    <label>CVV</label>
                    <input type="text" id="card_cvv" name="card_cvv" class="form-control" placeholder="123" maxlength="3">
                </div>
            </div>
        </div>

        <!-- Área do QR (aparece somente se PIX selecionado e após o clique em Confirmar) -->
        <div id="pixArea" class="hidden mt-3">
            <div class="qr-box">
                <h5>Escaneie o PIX</h5>
                <img src="img/QR CODE.PNG" alt="QR Code PIX" style="width:150px; height:150px;">
                <div id="qrImageWrap" style="margin:10px 0;">
                    <!-- imagem do QR será inserida aqui -->
                    <img id="qrImage" src="" alt="QR Code PIX">
                </div>
                <div id="pixInfo" class="small-muted">Aguardando confirmação do pagamento... <span id="countdown">15</span>s</div>
            </div>
            <div class="mt-2">
                <button type="button" id="cancelPix" class="btn btn-secondary">Cancelar</button>
            </div>
        </div>

        <br>
        <button type="submit" id="submitBtn" class="confirmar">Confirmar Pedido</button>
        <a href="carrinho.php" class="btn btn-secondary">Voltar ao Carrinho</a>
    </form>

    <script>
        // Helper Luhn check (opcional, para validação básica do número do cartão)
        function luhnCheck(num) {
            num = num.replace(/\D/g, '');
            let sum = 0;
            let alt = false;
            for (let i = num.length - 1; i >= 0; i--) {
                let n = parseInt(num.charAt(i), 10);
                if (alt) {
                    n *= 2;
                    if (n > 9) n -= 9;
                }
                sum += n;
                alt = !alt;
            }
            return (sum % 10 === 0);
        }

        const radios = document.querySelectorAll('.pagamento-radio');
        const cardFields = document.getElementById('cardFields');
        const pixArea = document.getElementById('pixArea');
        const checkoutForm = document.getElementById('checkoutForm');
        const submitBtn = document.getElementById('submitBtn');
        const qrImage = document.getElementById('qrImage');
        const countdownEl = document.getElementById('countdown');
        const cancelPix = document.getElementById('cancelPix');

        function showFieldsByPayment() {
            const selected = document.querySelector('.pagamento-radio:checked');
            if (!selected) {
                cardFields.classList.add('hidden');
                return;
            }
            if (selected.value === 'pix') {
                cardFields.classList.add('hidden');
            } else {
                cardFields.classList.remove('hidden');
            }
        }

        radios.forEach(r => r.addEventListener('change', showFieldsByPayment));
        showFieldsByPayment();

        // PIX flow: intercepta o submit e mostra QR + contador de 15s
        let pixTimer = null;
        let pixCountdown = 15;

        function startPixFlow() {
            // Gera um payload PIX de exemplo — em produção gere o payload real pelo seu backend/gateway
            const total = <?= json_encode(number_format($total, 2, ',', '.')) ?>;
            const pixPayload = "PIX_EXEMPLO|CHAVE: loja@exemplo.com|VALOR: R$ " + total + "|ID:<?= session_id() ?>";
            const encoded = encodeURIComponent(pixPayload);
            // Usa Google Charts para gerar QR temporário (apenas para demo)
            const qrUrl = "https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=" + encoded;
            qrImage.src = qrUrl;

            pixArea.classList.remove('hidden');
            submitBtn.disabled = true;

            pixCountdown = 15;
            countdownEl.textContent = pixCountdown;

            pixTimer = setInterval(() => {
                pixCountdown--;
                countdownEl.textContent = pixCountdown;
                if (pixCountdown <= 0) {
                    clearInterval(pixTimer);
                    // Simula confirmação do pagamento: submete o form com pagamento=pix
                    // Inserimos um campo oculto 'pagamento' se não existir (normalmente existe)
                    let input = document.querySelector('input[name="pagamento"]:checked');
                    if (!input) {
                        // cria um input hidden para pagamento=pix
                        const hidden = document.createElement('input');
                        hidden.type = 'hidden';
                        hidden.name = 'pagamento';
                        hidden.value = 'pix';
                        checkoutForm.appendChild(hidden);
                    }
                    // Adiciona um flag opcional para dizer que o QR venceu/foi pago
                    const flag = document.createElement('input');
                    flag.type = 'hidden';
                    flag.name = 'pix_auto';
                    flag.value = '1';
                    checkoutForm.appendChild(flag);

                    checkoutForm.submit();
                }
            }, 1000);
        }

        // Cancelar PIX
        cancelPix.addEventListener('click', function() {
            if (pixTimer) clearInterval(pixTimer);
            pixArea.classList.add('hidden');
            submitBtn.disabled = false;
        });

        // Ao enviar o formulário (client-side), fazemos validações e tratamos fluxo do PIX
        checkoutForm.addEventListener('submit', function(e) {
            const selected = document.querySelector('.pagamento-radio:checked');
            if (!selected) {
                e.preventDefault();
                alert('Selecione uma forma de pagamento.');
                return;
            }

            if (selected.value === 'pix') {
                // Intercepta e inicia exibição do QR + contador (não submete de imediato)
                e.preventDefault();
                startPixFlow();
                return;
            }

            // Para cartão: validações cliente
            if (selected.value === 'credito' || selected.value === 'debito') {
                const cn = document.getElementById('card_number').value.replace(/\D/g, '');
                const cnRaw = document.getElementById('card_number').value;
                const cexp = document.getElementById('card_exp').value.trim();
                const cvv = document.getElementById('card_cvv').value.trim();
                const cname = document.getElementById('card_name').value.trim();

                if (!cn || !cname || !cexp || !cvv) {
                    e.preventDefault();
                    alert('Preencha todos os campos do cartão.');
                    return;
                }

                // Verifica Luhn (apenas se tiver números)
                if (cn.length >= 12 && !luhnCheck(cn)) {
                    e.preventDefault();
                    alert('Número do cartão inválido (falha Luhn).');
                    return;
                }

                // Valida MM/AA mínimo
                if (!/^(0[1-9]|1[0-2])\/?([0-9]{2}|[0-9]{4})$/.test(cexp)) {
                    e.preventDefault();
                    alert('Validade do cartão inválida. Use MM/AA.');
                    return;
                }

                if (!/^[0-9]{3,4}$/.test(cvv)) {
                    e.preventDefault();
                    alert('CVV inválido.');
                    return;
                }

                // Se passou nas validações, o envio segue normalmente (servidor faz validação adicional e NÃO armazena dados)
                return;
            }
        });
    </script>
</body>

</html>