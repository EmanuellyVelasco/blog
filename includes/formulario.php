<?php if (count($erros) > 0): ?>
    <div class="erro">
        <?php foreach ($erros as $erro): ?>
            <p><?= htmlspecialchars($erro) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" class="formulario">
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" maxlength="255"
           value="<?= htmlspecialchars($titulo) ?>">

    <label for="conteudo">Conteúdo</label>
    <textarea name="conteudo" id="conteudo" rows="10"><?= htmlspecialchars($conteudo) ?></textarea>

    <label for="data_publicacao">Data de publicação</label>
    <input type="date" name="data_publicacao" id="data_publicacao"
           value="<?= htmlspecialchars($data_publicacao) ?>">

    <button type="submit">Salvar</button>
    <a href="index.php">Cancelar</a>
</form>