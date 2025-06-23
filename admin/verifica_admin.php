<?php 
    require_once(file_exists('../conexao.php') ? '../conexao.php' : '../../conexao.php');
    session_start();

    if(!isset($_SESSION['user']) || !isset($_SESSION['senha'])){
        header("Location:/portfolio/login.php");
        exit();
    }
?>