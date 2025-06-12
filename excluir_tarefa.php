<?php
require_once 'lock.php';

// Apenas permitir acesso via método POST para segurança
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location:tarefas.php');
    exit;
}

if (!isset($_POST['id_tarefa'])) {
    header('location:tarefas.php');
    exit; 
}

$id_tarefa = (int) $_POST['id_tarefa'];

require_once 'conexao.php';
$conn = conectar_banco();

// Usar declaração preparada para evitar SQL Injection
$sql = "DELETE FROM tb_tarefa WHERE id_tarefa = ? AND id_cliente = ?"; // Adicionado id_cliente para segurança extra
$stmt = mysqli_prepare($conn, $sql);

// O id do cliente vem da sessão, garantindo que um usuário não apague a tarefa de outro
$id_cliente = $_SESSION['id']; 
mysqli_stmt_bind_param($stmt, "ii", $id_tarefa, $id_cliente);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    header('location:tarefas.php');
} else {
    // Erro ou tarefa não pertence ao usuário
    header('location:tarefas.php?codigo=4');
}

exit;
?>