<?php
// Conexão com o banco de dados
$host = 'localhost';
$user = 'root'; // Altere se necessário
$pass = 'nemer358%'; // Adicione sua senha se houver
$dbname = 'loja_livros';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
