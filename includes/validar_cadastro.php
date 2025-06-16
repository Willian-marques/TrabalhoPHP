<?php
// 1. Incluir a conexão
require_once 'conexao.php';
require_once 'funcao.php'; 

// 2. Validar se os campos foram recebidos
if (campos_em_branco()) { // Usa a função de funcao.php
    header('location:../cadastro.php?codigo=2');
    exit;
}

// 3. Receber os dados do formulário
$nome  = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// 4. Conectar ao banco de dados
$conn = conectar_banco(); // Usa a função de conexao.php

// 5. Verificar se o nome ou e-mail já existem
$sql_check = "SELECT id FROM tb_clientes WHERE nome = ? OR email = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "ss", $nome, $email);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_store_result($stmt_check);

// 6. Se encontrou algum registro, redireciona com erro
if (mysqli_stmt_num_rows($stmt_check) > 0) {
    // CORREÇÃO: Redireciona para o código de erro correto (8 em vez de 10)
    header('location:../cadastro.php?codigo=8');
    exit;
}

// 7. Se passou na verificação, CRIPTOGRAFA A SENHA
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// 8. Preparar o comando SQL INSERT
$sql_insert = "INSERT INTO tb_clientes (nome, senha, email) VALUES (?, ?, ?)";
$stmt_insert = mysqli_prepare($conn, $sql_insert);

// 9. Associar os dados ao comando SQL de forma segura
mysqli_stmt_bind_param($stmt_insert, "sss", $nome, $senha_hash, $email);

// 10. Executar o comando e verificar o resultado
if (mysqli_stmt_execute($stmt_insert)) {
    header('location:../index.php'); // Sucesso, vai para a página de login
} else {
    header('location:../cadastro.php?codigo=5'); // Erro genérico de cadastro
}

mysqli_close($conn);
?>