<?php
require 'conexao.php';
require 'funcoes.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: index.php');
    exit;
}

// Busca o post que vai ser editado
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$stmt->execute([':id' => $id]);
$post = $stmt->fetch();

if (!$post) {
    header('Location: index.php');
    exit;
}

// Preenche o formulário com os dados atuais do post
$titulo = $post['titulo'];
$conteudo = $post['conteudo'];
$data_publicacao = $post['data_publicacao'];
$erros = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $conteudo = trim($_POST['conteudo'] ?? '');
    $data_publicacao = $_POST['data_publicacao'] ?? '';

    $erros = validarPost($titulo, $conteudo, $data_publicacao);

    if (count($erros) == 0) {
        $sql = 'UPDATE posts
                SET titulo = :titulo, conteudo = :conteudo, data_publicacao = :data_publicacao
                WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':data_publicacao' => $data_publicacao,
            ':id' => $id
        ]);

        header('Location: index.php?msg=editado');
        exit;
    }
}

include 'includes/cabecalho.php';
?>

<h2>Editar post</h2>

<?php include 'includes/formulario.php'; ?>

<?php include 'includes/rodape.php'; ?>