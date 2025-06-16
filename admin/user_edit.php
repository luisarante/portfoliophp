<?php
require_once '../conexao.php';

$id = isset($_POST['id']) ? (int) $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

if ($id && $nome && $email && $senha) {
    $sql = "UPDATE admins SET 
                admins_nome = '$nome', 
                admins_email = '$email', 
                admins_senha = '$senha' 
            WHERE admins_id = $id";

    $resultado = $mysqli->query($sql);

    if ($resultado) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao atualizar: " . $mysqli->error;
    }
} else {
    exit('Dados incompletos para atualização.');
}
?>
