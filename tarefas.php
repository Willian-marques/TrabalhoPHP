<?php require_once 'includes/lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Tarefas</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body class="container">

    <h1>Lista de tarefas de <?= htmlspecialchars($_SESSION['nome']) ?>!</h1>
    <p>
    <nav>
        <a href="index.php">Home</a> |
        <a href="cadastro.php">Cadastro</a> |
        <a href="tarefas.php">Lista de Tarefas</a> |
        <a href="includes/deslogar.php">Deslogar</a>
    </nav>
    </p>
    <br>
    <h3>Criar nova tarefa: </h3>

    <form action="includes/nova_tarefa.php" method="post">
        <p>
            <label for="tarefa">Nova Tarefa: </label>
            <input type="text" name="tarefa" id="tarefa" required>
        </p>
        <p>
            <label for="descricao">Descrição: </label>
            <input type="text" name="descricao" id="descricao">
        </p>
        <p>
            <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
        </p>
    </form>
    <br>

    <?php
        require_once 'includes/funcao.php';
        verificar_codigo();

        require_once 'includes/conexao.php';
        $conn = conectar_banco();

        // Consulta segura com declaração preparada
        $id_usuario = $_SESSION['id'];
        $sql = "SELECT id_tarefa, tarefa, descricao FROM tb_tarefa WHERE id_cliente = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_usuario);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($resultado) > 0) {
            echo "<h4>Lista de Tarefas:</h4>";
            
            while ($tarefa = mysqli_fetch_assoc($resultado)) {
                $id_tarefa       = $tarefa['id_tarefa'];
                $tarefa_atual    = htmlspecialchars($tarefa['tarefa']);
                $descricao_atual = htmlspecialchars($tarefa['descricao']);

                echo "<ul>";
                echo    "<h5>" . $tarefa_atual;
                
                // Botão de Editar
                echo    ' <a class="btn btn-outline-primary btn-sm" 
                           style="margin-right: 5px;"
                           href="includes/editar_tarefa.php?id_tarefa=' . $id_tarefa . '">Editar</a>';

                // Formulário de Exclusão (proteção contra CSRF)
                echo    '<form action="includes/excluir_tarefa.php" method="post" style="display:inline;">
                            <input type="hidden" name="id_tarefa" value="' . $id_tarefa . '">
                            <button type="submit" class="btn btn-outline-danger btn-sm" 
                                    style="--bs-btn-padding-y: .10rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                X
                            </button>
                        </form>';

                echo    "</h5>";
                echo    "<p>" . $descricao_atual . "</p>";
                echo "</ul>";
            }
        } else {
            echo "<h2>Não há tarefas cadastradas!</h2>";
        }
    ?>
</body>

</html>