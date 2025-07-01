<?php 
require_once "../../conexao.php";
session_start();
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if ($id) {
    if($id <> $_SESSION['adminId']){
        $mysqli->query("DELETE FROM admins WHERE admins_id = $id");
        header("Location: ./?msg=deleted");
        exit;
    }else{
        header("Location: ./?msg=cannot_delete_self");
        exit("Você não pode excluir sua conta.");
    }
} else {
    exit("ID inválido para exclusão.");
}
?>
