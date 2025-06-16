<?php 
    require_once("../conexao.php");
    session_start();

    if(!isset($_SESSION['user']) || !isset($_SESSION['senha'])){
        header("Location:/portfolio/login.php");
        exit();
    }
?>