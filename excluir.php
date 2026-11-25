<?php
require 'conexao.php';

// A exclusão só é aceita via POST, assim um simples link não apaga um post
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $stmt = $pdo->prepare('DELETE FROM posts WHERE id = :id');
    $stmt->execute([':id' => $id]);
}

header('Location: index.php?msg=excluido');
exit;