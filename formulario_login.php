<h3>Informe seus dados para acessar a sua Lista de Tarefas</h3>

<form action="includes/validar.php" method="post">
    <p>
        <label for="nome">Usuário:</label><br>
        <input type="text" name="nome" id="nome" required>
    </p>

    <p>
        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" id="senha" required>
    </p>

    <button type="submit" class="btn btn-success btn-sm">Logar</button>
</form>