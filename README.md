# Blog de postagens
Projeto de um blog simples feito em PHP e MySQL para o desafio técnico.
Permite criar, listar, visualizar, editar, excluir e buscar posts.

## Como rodar localmente

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) (ou outro ambiente com PHP 7.4+ e MySQL)

### Passo a passo

1. Clone o repositório dentro da pasta `htdocs` do XAMPP:

   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/EmanuellyVelasco/blog.git
   ```

2. Abra o painel do XAMPP e inicie o **Apache** e o **MySQL**.

3. Crie o banco de dados:
   - Acesse `http://localhost/phpmyadmin`
   - Vá na aba **SQL**, cole o conteúdo do arquivo `database.sql` e clique em **Executar**

4. Se o seu MySQL tiver usuário ou senha diferentes do padrão (`root` sem senha),
   altere as variáveis no arquivo `conexao.php`.

5. Acesse no navegador:

   ```
   http://localhost/blog-simples
   ```

## Estrutura do projeto

```
blog-simples/
├── css/
│   └── style.css          # estilo das páginas
├── includes/
│   ├── cabecalho.php      # topo do HTML e menu
│   ├── formulario.php     # formulário usado no criar e no editar
│   └── rodape.php         # fim do HTML
├── js/
│   └── script.js          # validação do formulário e confirmação de exclusão
├── conexao.php            # conexão com o banco
├── criar.php              # criar post
├── database.sql           # script do banco de dados
├── editar.php             # editar post
├── excluir.php            # excluir post
├── funcoes.php            # função de validação dos dados
├── index.php              # listagem e busca
└── post.php               # post completo
```
