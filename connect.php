<?php
// 
$host = 'localhost';
$user = 'root'; 
$pass = ''; 
$dbname = 'loja_livros';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
# a função $ serve para conectar o  php no banco , na var $conn criamos a function new mysqli(e estabelecemos como parametro 
# os dados de conexão do banco.)