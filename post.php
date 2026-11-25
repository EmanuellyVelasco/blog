<?php
require 'conexao.php';

// Pega o id da URL e confere se é um número inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: index.php');
    exit;
}

// Usa prepared statement para evitar SQL Injection
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$stmt->execute([':id' => $id]);
$post = $stmt->fetch();

include 'includes/cabecalho.php';
?>

<?php if (!$post): ?>
    <p>Post não encontrado.</p>
    <a href="index.php">Voltar</a>
<?php else: ?>
    <article class="post">
        <h2><?= htmlspecialchars($post['titulo']) ?></h2>
        <p class="data">Publicado em <?= date('d/m/Y', strtotime($post['data_publicacao'])) ?></p>
        <p><?= nl2br(htmlspecialchars($post['conteudo'])) ?></p>

        <div classe="acoes">
            <a href="editar.php?id=<?= $post['id'] ?>">Editar</a>
            <form action="excluir.php" method="post"class="form-excluir">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <button type="submit" class="botao-excluir">Excluir</button>
            </form>
        </div>
    </article>
    <a href="index.php">Voltar</a>
<?php endif; ?>

<?php include 'includes/rodape.php'; ?>