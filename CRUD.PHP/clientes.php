<?php

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

?>