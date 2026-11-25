<?php
require 'conexao.php';

// Palavra digitada no campo de busca (se tiver)
$busca = trim($_GET['busca'] ?? '');

if ($busca != '') {
    // Procura a palavra no título ou no conteúdo
    $sql = 'SELECT * FROM posts
            WHERE titulo LIKE :busca1 OR conteudo LIKE :busca2
            ORDER BY data_publicacao DESC, id DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':busca1' => '%' . $busca . '%',
        ':busca2' => '%' . $busca . '%'
    ]);
} else {
    // Busca todos os posts, do mais recente para o mais antigo
    $sql = 'SELECT * FROM posts ORDER BY data_publicacao DESC, id DESC';
    $stmt = $pdo->query($sql);
}

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

<form method="get" action="index.php" class="busca">
    <input type="text" name="busca" placeholder="Buscar posts..."
           value="<?= htmlspecialchars($busca) ?>">
    <button type="submit">Buscar</button>
    <?php if ($busca != ''): ?>
        <a href="index.php">Limpar busca</a>
    <?php endif; ?>
</form>

<?php if ($busca != ''): ?>
    <h2>Resultados para "<?= htmlspecialchars($busca) ?>"</h2>
<?php else: ?>
    <h2>Posts</h2>
<?php endif; ?>

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

        <div class="acoes">
            <a href="editar.php?id=<?= $post['id'] ?>">Editar</a>
            <form action="excluir.php" method="post" class="form-excluir">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <button type="submit" class="botao-excluir">Excluir</button>
            </form>
        </div>
    </article>
<?php endforeach; ?>

<?php include 'includes/rodape.php'; ?>