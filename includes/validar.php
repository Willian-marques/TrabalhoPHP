<?php
require_once 'funcao.php';

if (form_nao_enviado()) {
    header('Location: ../index.php?codigo=0'); // sem permissão
    exit;
}

if (empty($_POST['nome']) || empty($_POST['senha'])) {
    header('Location: ../index.php?codigo=2'); // campos em branco
    exit;
}

$nome          = $_POST['nome'];
$senhaDigitada = $_POST['senha'];

require_once 'conexao.php';

$conn = conectar_banco();

$query = "SELECT id, nome, senha, email FROM tb_clientes WHERE BINARY nome = ?";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    header('Location: ../index.php?codigo=3'); // erro SQL
    exit;
}

mysqli_stmt_bind_param($stmt, "s", $nome);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) <= 0) {
    header('Location: ../index.php?codigo=1'); // usuário ou senha inválidos
    exit;
}

mysqli_stmt_bind_result($stmt, $id, $nome_bd, $senha_hash, $email_bd);
mysqli_stmt_fetch($stmt);

if (password_verify($senhaDigitada, $senha_hash)) {
    session_start();
    $_SESSION['id']    = $id;
    $_SESSION['nome']  = $nome_bd;
    $_SESSION['email'] = $email_bd;
    $_SESSION['senha'] = $senha_hash;

    header('Location: ../tarefas.php');
    exit;
} else {
    header('Location: ../index.php?codigo=1'); // senha inválida
    exit;
}
?>