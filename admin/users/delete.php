<?php 
require_once "../conexao.php";

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$rota = $_GET['rota'] ?? null;

if ($id) {
    $mysqli->query("DELETE FROM admins WHERE admins_id = $id");
    header("Location: ./");
    exit;
} else {
    exit("ID inválido para exclusão.");
}
?>
