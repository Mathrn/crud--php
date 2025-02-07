<?php

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