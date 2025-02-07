<?php


// Outras funções e código...


// Conexão com o banco de dados
$host = 'local2';
$user = 'root'; 
$pass = ''; 
$dbname = 'loja_livros';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Funções CRUD para Clientes
function adicionarCliente($nome, $email) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $email);
    return $stmt->execute();
}

function listarClientes() {
    global $conn;
    $result = $conn->query("SELECT * FROM clientes");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function atualizarCliente($id, $nome, $email) {
    global $conn;
    $stmt = $conn->prepare("UPDATE clientes SET nome=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $nome, $email, $id);
    return $stmt->execute();
}

function deletarCliente($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM clientes WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Funções CRUD para Produtos
function adicionarProduto($titulo, $preco) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO produtos (titulo, preco) VALUES (?, ?)");
    $stmt->bind_param("sd", $titulo, $preco);
    return $stmt->execute();
}

function listarProdutos() {
    global $conn;
    $result = $conn->query("SELECT * FROM produtos");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function atualizarProduto($id, $titulo, $preco) {
    global $conn;
    $stmt = $conn->prepare("UPDATE produtos SET titulo=?, preco=? WHERE id=?");
    $stmt->bind_param("sdi", $titulo, $preco, $id);
    return $stmt->execute();
}

function deletarProduto($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Funções CRUD para Vendas
function adicionarVenda($cliente_id, $produto_id, $quantidade) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO vendas (cliente_id, produto_id, quantidade) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $cliente_id, $produto_id, $quantidade);
    return $stmt->execute();
}

function listarVendas() {
    global $conn;
    $result = $conn->query("SELECT v.id, c.nome AS cliente, p.titulo AS produto, v.quantidade FROM vendas v INNER JOIN clientes c ON v.cliente_id = c.id INNER JOIN produtos p ON v.produto_id = p.id");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function deletarVenda($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM vendas WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
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
