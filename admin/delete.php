<?php 
require_once "../conexao.php";

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if ($id) {
    $mysqli->query("DELETE FROM admins WHERE admins_id = $id");
    header("Location: admin_usuarios.php");
    exit;
} else {
    exit("ID inválido para exclusão.");
}
?>
