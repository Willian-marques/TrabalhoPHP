# Sistema de Tarefas em PHP

Este é um sistema web simples para gerenciamento de tarefas (To-Do List), desenvolvido como um projeto de estudo em PHP. A aplicação é multiusuário, permitindo que cada pessoa se cadastre e gerencie sua própria lista de tarefas de forma segura e independente.

## ✨ Funcionalidades

* **Autenticação de Usuário**: Sistema completo de Cadastro, Login e Logout.
* **Gerenciamento de Tarefas (CRUD)**:
    * **C**riar novas tarefas com título e descrição opcional.
    * **L**er (Visualizar) todas as tarefas de um usuário logado.
    * **A**tualizar (Editar) tarefas existentes.
    * **E**xcluir tarefas concluídas ou indesejadas.
* **Segurança**:
    * Sessões de usuário para proteger o acesso às páginas.
    * Senhas criptografadas no banco de dados com `password_hash`.
    * Proteção contra injeção de SQL com o uso de Prepared Statements (declarações preparadas).
* **Interface Responsiva**: O design se adapta a diferentes tamanhos de tela graças ao uso do framework Bootstrap.

## 🛠️ Tecnologias Utilizadas

* **Backend**: PHP 8
* **Frontend**: HTML5, CSS3, Bootstrap 5
* **Banco de Dados**: MySQL / MariaDB

## 🚀 Como Executar o Projeto

Para executar este projeto localmente, você precisará de um ambiente de servidor como XAMPP, WAMP ou MAMP.

### Pré-requisitos

* PHP 8 ou superior
* MySQL ou MariaDB
* Apache (ou outro servidor web)
* Navegador Web

### Passos para Instalação

1.  **Baixe os Arquivos**: Faça o download ou clone todos os arquivos do projeto para o seu computador.

2.  **Mova para a Pasta do Servidor**: Mova a pasta do projeto para o diretório web do seu servidor local (geralmente `htdocs` no XAMPP).

3.  **Inicie o Servidor**: Abra o painel de controle do XAMPP e inicie os módulos **Apache** e **MySQL**.

4.  **Crie o Banco de Dados**:
    * Abra seu navegador e acesse o phpMyAdmin (`http://localhost/phpmyadmin`).
    * Crie um novo banco de dados com o nome `bd_usuarios`.
    * Selecione o banco de dados recém-criado, clique na aba "Importar", escolha o arquivo `bd_usuarios.sql` que está na pasta do projeto e execute a importação. Isso criará as tabelas `tb_clientes` e `tb_tarefa`.

5.  **Verifique a Conexão**: O arquivo `conexao.php` está configurado para um ambiente padrão do XAMPP (usuário `root`, sem senha). Se sua configuração for diferente, ajuste as credenciais neste arquivo.

6.  **Acesse a Aplicação**: Abra seu navegador e acesse `http://localhost/TrabalhoPHP`.

7.  **Pronto!** Você já pode se cadastrar, fazer login e começar a usar o sistema. Há um usuário de teste no arquivo SQL:
    * **Usuário**: willian
    * **Senha**: 1234

## 🗃️ Estrutura do Banco de Dados

O banco de dados `bd_usuarios` consiste em duas tabelas principais:

* **`tb_clientes`**: Armazena as informações dos usuários.
    * `id` (int, Chave Primária, Auto Incremento)
    * `nome` (varchar)
    * `senha` (varchar, armazena o hash)
    * `email` (varchar)
* **`tb_tarefa`**: Armazena as tarefas, com uma chave estrangeira para associar cada tarefa a um cliente.
    * `id_tarefa` (int, Chave Primária, Auto Incremento)
    * `tarefa` (varchar)
    * `descricao` (text)
    * `id_cliente` (int, Chave Estrangeira para `tb_clientes.id`)



## 👨‍💻 Autores

* Willian Marques
* Gabriel Kremer