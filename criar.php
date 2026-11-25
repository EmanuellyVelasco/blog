<?php
require 'conexao.php';
require 'funcoes.php';

// Valores iniciais do formulário
$titulo = '';
$conteudo = '';
$data_publicacao = date('Y-m-d');
$erros = [];

// Só tenta salvar quando o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $conteudo = trim($_POST['conteudo'] ?? '');
    $data_publicacao = $_POST['data_publicacao'] ?? '';

    $erros = validarPost($titulo, $conteudo, $data_publicacao);

    if (count($erros) == 0) {
        $sql = 'INSERT INTO posts (titulo, conteudo, data_publicacao)
                VALUES (:titulo, :conteudo, :data_publicacao)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':data_publicacao' => $data_publicacao
        ]);

        header('Location: index.php?msg=criado');
        exit;
    }
}

include 'includes/cabecalho.php';
?>

<h2>Novo post</h2>

<?php include 'includes/formulario.php'; ?>

<?php include 'includes/rodape.php'; ?>