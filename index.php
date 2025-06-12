<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>

<body class="container">
    <h1>Por favor, realize seu cadastro</h1>
    
    <p>
    <nav>
        <a href="index.php">Home</a> |
        <a href="cadastro.php">Cadastro</a> |
        <a href="tarefas.php">Lista de Tarefas</a> |
        <a href="deslogar.php">Deslogar</a>
    </nav>
    </p>


    <?php

        require_once 'funcao.php';
        verificar_codigo();

        incluir_login();
    ?>

</body>

</html>