<?php
    session_start();
    if(
        isset($_SESSION['user'])
        &&
        isset($_SESSION['senha'])
        ){
            unset($_SESSION['user']);    
            unset($_SESSION['senha']); 
            unset($_SESSION['nome']);       
            header("location:login.php");
    }else{
        header("location:login.php");
    }
?>