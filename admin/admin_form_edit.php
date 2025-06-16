<?php
include 'verifica_admin.php';

require_once '../conexao.php';
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if ($id) {
    $sql = "SELECT admins_nome, admins_email, admins_senha FROM admins WHERE admins_id = $id";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $admin = $resultado->fetch_assoc();
    } else {
        exit('Administrador não encontrado.');
    }
} else {
    exit('ID inválido.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include '../includes/head.php' ?>

<body>
    <?php include 'admin_header.php'; ?>
    <?php include 'admin_aside.php'; ?>
    <main class="flex justify-center items-center min-h-[100vh]">
        <div class="w-full max-w-xl p-10 bg-white rounded-xl shadow-lg" id="cadastrarAdmin">
            <form method="POST" action="user_edit.php" class="space-y-6">
                <fieldset>
                    <div class="flex justify-between w-full items-center mb-6">
                        <legend class="text-2xl font-bold text-gray-800">Editar Informações de <?php echo htmlspecialchars($admin['admins_nome']); ?></legend>
                        <a href="admin_usuarios.php" class="cursor-pointer"><i class="fa-solid fa-x text-black text-2xl"></i></a>
                    </div>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <div class="flex flex-col space-y-2">
                        <label for="nomeAdmin" class="text-gray-700 font-medium">Nome</label>
                        <input
                            id="nomeAdmin"
                            name="nome"
                            type="text"
                            value="<?php echo htmlspecialchars($admin['admins_nome']); ?>"
                            placeholder="Digite o título do projeto"
                            class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                            required />
                    </div>
                    <div class="flex flex-col space-y-2 mt-3">
                        <label for="emailAdmin" class="text-gray-700 font-medium">Email</label>
                        <input
                            id="emailAdmin"
                            name="email"
                            type="email"
                            value="<?php echo htmlspecialchars($admin['admins_email']); ?>"
                            placeholder="Digite o título do projeto"
                            class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                            required />
                    </div>
                    <div class="flex flex-col relative space-y-2 mt-3">
                        <label for="senhaAdmin" class="text-gray-700 font-medium">Senha</label>
                        <div class="relative">
                            <input
                                id="senhaAdmin"
                                name="senha"
                                type="password"
                                value="<?php echo htmlspecialchars($admin['admins_senha']); ?>"
                                placeholder="Digite a senha"
                                class="w-full px-4 py-2 pr-12 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                                required />

                            <button type="button"
                                id="mostrar"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                <i id="iconSenha" class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" name="enviar" class="w-full cursor-pointer py-3 bg-blue-500 text-white font-medium text-lg rounded-xl shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                            Confirmar alterações
                        </button>
                    </div>
                </fieldset>
                <form>
        </div>
    </main>
    <script>
        const btnSenha = document.querySelector('#mostrar');
        const senhaAdmin = document.querySelector('#senhaAdmin');
        const iconSenha = document.querySelector('#iconSenha');

        btnSenha.addEventListener('click', () => {
            if (senhaAdmin.type === 'password') {
                senhaAdmin.type = 'text';
                iconSenha.classList.remove('fa-eye');
                iconSenha.classList.add('fa-eye-slash');
            } else {
                senhaAdmin.type = 'password';
                iconSenha.classList.remove('fa-eye-slash');
                iconSenha.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>