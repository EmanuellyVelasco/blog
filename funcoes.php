<?php
// Valida os dados do post e retorna uma lista com os erros encontrados
function validarPost($titulo, $conteudo, $data_publicacao)
{
    $erros = [];

    if ($titulo == '') {
        $erros[] = 'O título é obrigatório.';
    } elseif (mb_strlen($titulo) > 255) {
        $erros[] = 'O título pode ter no máximo 255 caracteres.';
    }

    if ($conteudo == '') {
        $erros[] = 'O conteúdo é obrigatório.';
    }

    // Confere se a data está no formato ano-mês-dia e se é uma data válida
    $data = DateTime::createFromFormat('Y-m-d', $data_publicacao);
    if (!$data || $data->format('Y-m-d') != $data_publicacao) {
        $erros[] = 'Informe uma data de publicação válida.';
    }

    return $erros;
}