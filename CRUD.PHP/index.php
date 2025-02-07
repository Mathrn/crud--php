<?php
    include 'clientes.php';
    include 'produtos.php';
    include 'vendas.php';
    include 'A.PHP';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Loja de Livros</title>
</head>
<body>
    <h2>Lista de Clientes</h2>
    <ul>
        <?php
        $clientes = listarClientes();
        foreach ($clientes as $cliente) {
            echo "<li>{$cliente['id']} - {$cliente['nome']} ({$cliente['email']})</li>";
        }
        ?>
    </ul>
    
    <h2>Lista de Produtos</h2>
    <ul>
        <?php
        $produtos = listarProdutos();
        foreach ($produtos as $produto) {
            echo "<li>{$produto['id']} - {$produto['titulo']} (R$ {$produto['preco']})</li>";
        }
        ?>
    </ul>
    
    <h2>Lista de Vendas</h2>
    <ul>
        <?php
        $vendas = listarVendas();
        foreach ($vendas as $venda) {
            echo "<li>Venda {$venda['id']}: {$venda['cliente']} comprou {$venda['quantidade']} de '{$venda['produto']}'</li>";
        }
        ?>
    </ul>
</body>
</html>

