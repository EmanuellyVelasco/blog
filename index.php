<?php
require 'conexao.php';

// Busca todos os posts, do mais recente para o mais antigo
$sql = 'SELECT * FROM posts ORDER BY data_publicacao DESC, id DESC';
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll();

// Mensagens que aparecem depois de criar, editar ou excluir um post
$mensagens = [
    'criado' => 'Post criado com sucesso!',
    'editado' => 'Post editado com sucesso!',
    'excluido' => 'Post excluído com sucesso!'
];
$msg = $_GET['msg'] ?? '';

include 'includes/cabecalho.php';
?>

<?php if (isset($mensagens[$msg])): ?>
    <div class="sucesso"><?= $mensagens[$msg] ?></div>
<?php endif; ?>

<h2>Posts</h2>

<?php if (count($posts) == 0): ?>
    <p>Nenhum post encontrado.</p>
<?php endif; ?>

<?php foreach ($posts as $post): ?>
    <article class="post">
        <h3>
            <a href="post.php?id=<?= $post['id'] ?>">
                <?= htmlspecialchars($post['titulo']) ?>
            </a>
        </h3>
        <p class="data">Publicado em <?= date('d/m/Y', strtotime($post['data_publicacao'])) ?></p>

        <?php
        // Mostra só um trecho do conteúdo (os primeiros 150 caracteres)
        $trecho = mb_substr($post['conteudo'], 0, 150);
        if (mb_strlen($post['conteudo']) > 150) {
            $trecho .= '...';
        }
        ?>
        <p><?= htmlspecialchars($trecho) ?></p>

        <div classe="acoes">
            <a href="editar.php?id=<?= $post['id'] ?>">Editar</a>
            <form action="excluir.php" method="post" class="form-excluir">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <button type="submit" class="botao-excluir">Excluir</button>
            </form>
        </div>
    </article>
<?php endforeach; ?>

<?php include 'includes/rodape.php'; ?>