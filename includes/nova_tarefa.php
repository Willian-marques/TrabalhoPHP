<?php 
require_once 'lock.php';
require_once 'funcao.php';

if (form_nao_enviado()) {
    header('location:../tarefas.php?codigo=0');
    exit;
}

if (tarefa_em_branco()) {
    header('location:../tarefas.php?codigo=2');
    exit;
}

$tarefa = $_POST['tarefa']; // Título da tarefa
$descricao = $_POST['descricao'] ?? ''; // Descrição (opcional)
$id_usuario = $_SESSION['id'];

require_once 'conexao.php';

$conn = conectar_banco();

$sql = "INSERT INTO tb_tarefa (tarefa, descricao, id_cliente) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    header('location:../tarefas.php?codigo=3');
    exit;
}

mysqli_stmt_bind_param($stmt, "ssi", $tarefa, $descricao, $id_usuario);

if(!mysqli_stmt_execute($stmt)){
    header('location:../tarefas.php?codigo=3');
    exit;
}

mysqli_stmt_store_result($stmt);

if (mysqli_stmt_affected_rows($stmt) <= 0) {
    header('location:../tarefas.php?codigo=5');
    exit;
}

header('location:../tarefas.php');
?>
