<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>

<body class="container">
    <h1>Informe seus dados para realizar o cadastro</h1>

    <?php
   
    require_once 'funcao.php';
    verificar_codigo();
    ?>
    <p>
    <nav>
        <a href="index.php">Home</a> |
        <a href="cadastro.php">Cadastro</a> |
        <a href="tarefas.php">Lista de Tarefas</a> |
        <a href="deslogar.php">Deslogar</a>
    </nav>
    </p>
    <br>
    
    <form action="validar_cadastro.php" method="post" class="form">
        <p>
            <label for="nome">Nome de Usuário:</label><br>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="senha" required>
        </p>
        <p>
            <label for="email">E-mail:</label><br>
            <input type="email" name="email" id="email" required>
        </p>

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>