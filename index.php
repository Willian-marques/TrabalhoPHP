<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="container">
    <h1>SISTEMA DE TAREFAS</h1>

    <p>
    <nav>
        <a href="index.php">Home</a> |
        <a href="cadastro.php">Cadastro</a> |
        <a href="tarefas.php">Lista de Tarefas</a> |
        <a href="includes/deslogar.php">Deslogar</a>
    </nav>
    </p>


    <?php

        require_once 'includes/funcao.php';
        verificar_codigo();

        incluir_login();
    ?>

</body>

</html>