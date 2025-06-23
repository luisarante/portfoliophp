<?php
require_once '../../conexao.php';

$id = isset($_POST['id']) ? (int) $_POST['id'] : null;
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

if ($id && $nome && $email) {
    if (!empty($senha)) {
        $senhaHash = md5($senha); 
        $sql = "UPDATE admins SET 
                    admins_nome = '$nome', 
                    admins_email = '$email', 
                    admins_senha = '$senhaHash' 
                WHERE admins_id = $id";
    } else {
        $sql = "UPDATE admins SET 
                    admins_nome = '$nome', 
                    admins_email = '$email' 
                WHERE admins_id = $id";
    }

    $resultado = $mysqli->query($sql);

    if ($resultado) {
        header('Location: ./');
        exit;
    } else {
        echo "Erro ao atualizar: " . $mysqli->error;
    }
} else {
    exit('Dados incompletos para atualização.');
}
?>
