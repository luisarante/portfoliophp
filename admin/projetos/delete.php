<?php 
require_once "../../conexao.php";
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if ($id) {
    $mysqli->query("DELETE FROM projetos WHERE id = $id");
    header("Location: ./");
    exit;
} else {
    exit("ID inválido para exclusão.");
}
?>
