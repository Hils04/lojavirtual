<?php
session_start();

// Inicializa o carrinho, se não existir
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Função para adicionar um item ao carrinho
function addItemToCart($nome, $preco) {
    $_SESSION['cart'][] = [
        'nome' => $nome,
        'preco' => $preco,
    ];
}

// Verifica se o formulário de adição de um produto foi enviado
if (isset($_POST['addCarrinho'])) {
    // Adiciona um produto principal (Notebook ou Desktop)
    if (!empty($_POST['id_produto']) && !empty($_POST['valor'])) {
        $produto = htmlspecialchars($_POST['id_produto']);
        $valor = floatval($_POST['valor']);
        addItemToCart($produto, $valor);
    }

    // Adiciona componentes personalizados selecionados (CPU, RAM, etc.)
    if (!empty($_POST['components'])) {
        foreach ($_POST['components'] as $component) {
            list($nomeComponente, $precoComponente) = explode('|', $component);
            addItemToCart($nomeComponente, floatval($precoComponente));
        }
    }

    // Redireciona de volta para o index.php
    header('Location: index.php');
    exit;
}

// Verifica se o formulário de remoção de um item foi enviado
if (isset($_POST['removeCarrinho']) && isset($_POST['index'])) {
    $index = intval($_POST['index']);
    
    // Remove o item do carrinho com o índice fornecido
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        // Reindexa o array após a remoção
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    // Redireciona de volta para o index.php
    header('Location: index.php');
    exit;
}
?>
