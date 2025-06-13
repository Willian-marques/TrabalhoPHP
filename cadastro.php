<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">

</head>

<body class="container">

    <h1>SISTEMA DE TAREFAS</h1>
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

    <h3>Informe seus dados para realizar o cadastro</h3>
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