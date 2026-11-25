// Validação do formulário de criar/editar post
const formulario = document.querySelector('.formulario');

if (formulario) {
    formulario.addEventListener('submit', function (evento) {
        const titulo = document.getElementById('titulo').value.trim();
        const conteudo = document.getElementById('conteudo').value.trim();
        const data = document.getElementById('data_publicacao').value;

        let erros = [];

        if (titulo === '') {
            erros.push('Preencha o título do post.');
        }

        if (conteudo === '') {
            erros.push('Preencha o conteúdo do post.');
        }

        if (data === '') {
            erros.push('Informe a data de publicação.');
        }

        if (erros.length > 0) {
            evento.preventDefault(); // impede o envio do formulário
            alert(erros.join('\n'));
        }
    });
}

// Pede confirmação antes de excluir um post
const formsExcluir = document.querySelectorAll('.form-excluir');

formsExcluir.forEach(function (form) {
    form.addEventListener('submit', function (evento) {
        const confirmou = confirm('Tem certeza que deseja excluir este post?');

        if (!confirmou) {
            evento.preventDefault();
        }
    });
});