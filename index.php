<?php
// Inicia a sessão
session_start();

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';


// Inicializa o carrinho, se não existir
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Calcula o total do carrinho
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['preco'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechPoint</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <div class="center">
            <img src="./img/logo.jpeg" alt="Logo">
        </div>
        <p class="logo">TechPoint</p>
        <div class="cart"><i class="fa fa-shopping-cart"></i>
            <p id="cart-count"><?php echo count($_SESSION['cart']); ?></p>
        </div>
    </div>
    <br>
    <h1>Escolha seu equipamento</h1>
    <br>

    <!-- Formulário de Produtos e Componentes -->
    <div class="container">

        <div class="linha-produtos">
            <!-- Notebook -->
            <form action="cart.php" method='POST'>
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="./img/note.jpg" alt="" class="produtoMiniatura">
                    </div>
                    <div class="titulo">
                        <p>Notebook</p>
                    </div>
                </div>
            </form>
            <br><br><br><br><br><br><br><br><br>
            <!-- Desktop -->
            <form action="cart.php" method='POST'>
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="./img/desktop.jpg" alt="" class="produtoMiniatura">
                    </div>
                    <div class="titulo">
                        <p>Desktop</p>
                    </div>
                </div>
            </form>
        </div>

        <!-- Formulário de Seleção de Componentes -->
        <form action="cart.php" method="POST">
            <!-- Seção de CPU -->
            <h2>->Turbine seu Notebook</h2>
            <div class="component-category">
                <h3>1. CPU</h3>
                <label><input type="checkbox" name="components[]" value="Intel Core i5-1135G7|1200"> Intel Core i5-1135G7: R$ 1.200,00</label><br>
                <label><input type="checkbox" name="components[]" value="Intel Core i7-1165G7|1800"> Intel Core i7-1165G7: R$ 1.800,00</label><br>
                <label><input type="checkbox" name="components[]" value="AMD Ryzen 5 4500U|1100"> AMD Ryzen 5 4500U: R$ 1.100,00</label><br>
                <label><input type="checkbox" name="components[]" value="AMD Ryzen 7 4700U|1600"> AMD Ryzen 7 4700U: R$ 1.600,00</label><br>
            </div>

            <!-- Seção de Memória -->
            <div class="component-category">
                <h3>2. Memória (RAM)</h3>
                <label><input type="checkbox" name="components[]" value="8GB DDR4 2666MHz|280"> 8GB DDR4 2666MHz: R$ 280,00</label><br>
                <label><input type="checkbox" name="components[]" value="16GB DDR4 3200MHz|550"> 16GB DDR4 3200MHz: R$ 550,00</label><br>
                <label><input type="checkbox" name="components[]" value="32GB DDR4 3200MHz|1100"> 32GB DDR4 3200MHz: R$ 1.100,00</label><br>
                <label><input type="checkbox" name="components[]" value="64GB DDR4 3200MHz|2200"> 64GB DDR4 3200MHz: R$ 2.200,00</label><br>
            </div>

            <!-- Seção de Armazenamento -->
            <div class="component-category">
                <h3>3. Armazenamento</h3>
                <label><input type="checkbox" name="components[]" value="SSD 256GB NVMe|250"> SSD 256GB NVMe: R$ 250,00</label><br>
                <label><input type="checkbox" name="components[]" value="SSD 512GB NVMe|400"> SSD 512GB NVMe: R$ 400,00</label><br>
                <label><input type="checkbox" name="components[]" value="SSD 1TB NVMe|800"> SSD 1TB NVMe: R$ 800,00</label><br>
                <label><input type="checkbox" name="components[]" value="HD 1TB 5400 RPM|250"> HD 1TB 5400 RPM: R$ 250,00</label><br>
            </div>

            <!-- Seção de Sistemas Operacionais -->
            <div class="component-category">
                <h3>4. Sistemas Operacionais</h3>
                <label><input type="checkbox" name="components[]" value="Windows 10 Pro|800"> Windows 10 Pro: R$ 800,00</label><br>
                <label><input type="checkbox" name="components[]" value="Ubuntu Linux|0"> Ubuntu Linux: Gratuito</label><br>
            </div>
            <br>
            <!-- Seção do Monitor -->
            <h2>-> Turbine seu Desktop</h2>
            <div class="component-category">
                <h3>1. Monitor</h3>
                <label><input type="checkbox" name="components[]" value="Monitor LED 24'' Full HD|800"> Monitor LED 24" Full HD: R$ 800,00</label><br>
                <label><input type="checkbox" name="components[]" value="Monitor IPS 27'' Quad HD|1500"> Monitor IPS 27" Quad HD: R$ 1.500,00</label><br>
                <label><input type="checkbox" name="components[]" value="Monitor Curvo 32'' 4K|3000"> Monitor Curvo 32" 4K: R$ 3.000,00</label><br>
                <label><input type="checkbox" name="components[]" value="Monitor Gamer 34'' Ultrawide|4500"> Monitor Gamer 34" Ultrawide: R$ 4.500,00</label><br>
            </div>
            <br><br><br><br><br>
            <!-- Botão para adicionar ao carrinho -->
            <button type="submit" name="addCarrinho" class="button">Adicionar itens selecionados ao Carrinho</button>
        </form>

        <!-- Barra Lateral do Carrinho -->
        <div class="barraLateral">
            <div class="topoCarrinho">
                <p>Bem-vindo(a), <?php echo $usuario; ?>!</p>
                
            </div>

            <div id="cart-items">
                <?php if (empty($_SESSION['cart'])): ?>
                    <div class="item-carrinho-vazio">Seu carrinho está vazio!</div>
                <?php else: ?>
                    <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                        <div class="item-carrinho">
                            <p><?php echo $item['nome']; ?></p>
                            <h3>R$ <?php echo number_format($item['preco'], 2,',', '.'); ?></h3>
                            <form action="cart.php" method="POST" style="display:inline;">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit" name="removeCarrinho" style="border:none; background:none;">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="rodape">
                <h3>Total do seu Carrinho</h3>
                <h2 id="cart-total">R$ <?php echo number_format($total, 2, ',', '.'); ?></h2>
            </div>
        </div>
    </div>
</body>
</html>
