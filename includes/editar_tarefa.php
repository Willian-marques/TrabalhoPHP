<?php

require_once 'lock.php';
require_once 'conexao.php';

// Conecta com o banco
$conn = conectar_banco();

// Se for envio de formulário (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id_tarefa'], $_POST['tarefa'])) {
        header('location:../tarefas.php?codigo=0');
        exit;
    }

    $id_tarefa = $_POST['id_tarefa'];
    $tarefa = $_POST['tarefa'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE tb_tarefa SET tarefa = ?, descricao = ? WHERE id_tarefa = ? AND id_cliente = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $id_cliente = $_SESSION['id']; // Garante que o usuário só edite sua própria tarefa
    mysqli_stmt_bind_param($stmt, "ssii", $tarefa, $descricao, $id_tarefa, $id_cliente);

    if (mysqli_stmt_execute($stmt)) {
        header('location:../tarefas.php?codigo=6');
    } else {
        header('location:../tarefas.php?codigo=7');
    }
    exit;
}

// Se for acesso via link (GET)
if (!isset($_GET['id_tarefa'])) {
    header('location:../tarefas.php');
    exit;
}

$id_tarefa = $_GET['id_tarefa'];
$id_cliente = $_SESSION['id'];

// Consulta segura para buscar os dados da tarefa
$sql = "SELECT tarefa, descricao FROM tb_tarefa WHERE id_tarefa = ? AND id_cliente = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $id_tarefa, $id_cliente);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $tarefa, $descricao);

// Se não encontrar a tarefa ou ela não pertencer ao usuário, redireciona
if (!mysqli_stmt_fetch($stmt)) {
    header('location:../tarefas.php?codigo=0');
    exit;
}
mysqli_stmt_close($stmt); // Fecha a declaração anterior
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="container">

    <h1>Editar Tarefa</h1>

    <nav class="mb-3">
        <a href="../index.php">Home</a> |
        <a href="../cadastro.php">Cadastro</a> |
        <a href="../tarefas.php">Lista de Tarefas</a> |
        <a href="../includes/deslogar.php">Deslogar</a>
    </nav>


    <form method="POST" action="../includes/editar_tarefa.php">
        <input type="hidden" name="id_tarefa" value="<?= htmlspecialchars($id_tarefa) ?>">

        <div class="mb-3">
            <label for="tarefa" class="form-label">Tarefa:</label>
            <input type="text" name="tarefa" id="tarefa" class="form-control" value="<?= htmlspecialchars($tarefa) ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"
                rows="3"><?= htmlspecialchars($descricao) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="../tarefas.php" class="btn btn-secondary">Cancelar</a>
    </form>

</body>

</html>