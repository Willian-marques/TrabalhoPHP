<?php
    function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

    function campos_em_branco() {
    return empty($_POST['nome']) || empty($_POST['senha']) || empty($_POST['email']);
}

function tarefa_em_branco() {
    return empty($_POST['tarefa']);
}

function verificar_codigo() {

    if (!isset($_GET['codigo'])) {
        return;
    }

    $codigo = (int)$_GET['codigo'];

    switch ($codigo) {

        case 0:
            $msg = "<h3><br>Você não tem permissão para acessar a página requisitada, <br>faça login e tente novamente.</p>";
            break;

        case 1:
            $msg = "<h3><p>Usuário ou senha inválidos. Por favor, tente novamente!<br></p>";
            break;

        case 2:
            $msg = "<h3><p>Por favor, preencha todos os campos do formulário<br></p>";
            break;

        case 3:
            $msg = "<h3><p>Erro na estrutura da consulta SQL. Verifique com o suporte ou 
            tente novamente mais tarde<br></p>";
            break;

        case 4:
            $msg = "<h3><p>Erro ao excluir tarefa selecionada. Verifique com o suporte ou 
            tente novamente mais tarde<br></p>";
            break;

        case 5:
            $msg = "<h3><p>Erro ao cadastrar. Verifique com o suporte ou 
            tente novamente mais tarde<br></p>";
            break;
        case 6:
            $msg = "<h3><p>Alterado com Sucesso</p></h3>";
            break;
         case 7:
            $msg = "<h3><p>Erro ao alterar, tente novamente</p></h3>";
            break;
        case 8:
        case 10: // Adicionado para manter compatibilidade e exibir a mensagem correta
            $msg = "<h3><p>Erro: Usuário ou e-mail já cadastrado</p></h3>";
            break;
        default:
            $msg = "";
            break;
    }

    echo $msg;

}

function incluir_login() {

    if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
       
        require_once 'formulario_login.php';
    } else {
       
        echo "<h3><p><br>Bem-vindo, " . htmlspecialchars($_SESSION['nome']) . "!</p></h3>";
    }
}

?>