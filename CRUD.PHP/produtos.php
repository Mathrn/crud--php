<?php

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

?>