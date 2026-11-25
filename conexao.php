<?php
// Configurações do banco de dados com PDO
$host = 'localhost';
$banco = 'blog';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $user, $password);
    // Faz o PDO lançar exceção quando acontecer algum erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Faz as consultas retornarem linhas com os nomes das colunas como chaves
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Não mostra o erro para o user, apenas uma mensagem temporária
    die('Erro ao conectar com o banco de dados.');
}