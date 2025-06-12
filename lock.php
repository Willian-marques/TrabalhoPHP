<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
    header('location:index.php?codigo=0'); // código 0 = acesso negado
    exit;
}
?>
