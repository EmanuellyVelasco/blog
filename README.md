# Blog de postagens
Projeto de um blog simples feito em PHP e MySQL para o desafio técnico.
Permite criar, listar, visualizar, editar, excluir e buscar posts.

## Como rodar localmente

### Pré-requisitos

- [XAMPP] (https://www.apachefriends.org/) (ou outro ambiente com PHP 7.4+ e MySQL)
- [Git] (https://git-scm.com/)

### 1. Clone o repositório

**Windows** — no Prompt de Comando:

```bat
cd /d C:\xampp\htdocs
git clone https://github.com/EmanuellyVelasco/blog.git
```

**Linux** — no terminal:

```bash
cd /opt/lampp/htdocs
git clone https://github.com/EmanuellyVelasco/blog.git
```

Se aparecer `Permission denied` ao clonar no Linux, execute `sudo git clone https://github.com/EmanuellyVelasco/blog.git` dentro da pasta `htdocs`.

### 2. Inicie o XAMPP

- **Windows:** abra o painel do XAMPP e inicie o **Apache** e o **MySQL**.
- **Linux:** execute `sudo /opt/lampp/lampp start` no terminal.

### 3. Crie o banco de dados

1. Abra o [phpMyAdmin](http://localhost/phpmyadmin).
2. Na aba **SQL**, cole o conteúdo do arquivo `database.sql` e clique em **Executar**. O script cria o banco `blog` e a tabela `posts`.
3. Se o seu banco usar credenciais diferentes de `root` sem senha, ajuste o arquivo `conexao.php`.


5. Acesse no navegador:

   ```
   http://localhost/blog/
   ```

## Estrutura do projeto

```
blog/
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
