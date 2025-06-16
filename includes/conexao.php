<?php
function conectar_banco() {
    $servidor = 'localhost:3306';
    $usuario_bd = 'root';
    $senha_bd = '';
    $banco = 'bd_usuarios'; // <--- Nome do seu banco de dados

    $conn = new mysqli($servidor, $usuario_bd, $senha_bd, $banco);

    if ($conn->connect_error) {
        // Em um ambiente real, você logaria o erro em vez de exibi-lo.
        die("Falha na conexão: " . $conn->connect_error);
    }

    return $conn;
}
?>