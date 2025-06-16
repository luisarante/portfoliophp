<?php
include 'verifica_admin.php';
$db = new mysqli("localhost", "root", "", "portfolio_db");
$db->set_charset("utf8mb4");

if (isset($_POST['enviar'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);

  if ($_SESSION['nome'] == 'admin') {
    $insere = $db->query("INSERT INTO admins(
        admins_nome,
        admins_email,
        admins_senha
      ) VALUES (
        '$nome',
        '$email',
        '$senha'
      )");
  } else {
    echo "
        <div id='msg-erro' class='absolute bg-red-600 text-white top-11 z-80 font-semibold rounded-full flex items-center justify-center left-[50%] py-3 px-4 radious -translate-[50%]'>
          <span>Sem permissão necessária</span>
        </div>
     
      ";
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include '../includes/head.php' ?>

<body>
  <?php include 'admin_header.php'; ?>
  <?php include 'admin_aside.php'; ?>

  <main>
    <div class="w-full flex items-center justify-center px-4 mt-30 mb-15">
      <div class="w-full max-w-xl p-10 bg-white rounded-xl shadow-lg" id="adminsCadastrados">
        <div class="flex flex-col space-y-2 mt-4 text-black">
          <h1 for="link-proj" class="text-gray-700 text-2xl font-bold">Administradores cadastrados</h1>
          <div class="max-w-4xl mt-4">
            <div class="grid grid-cols-4 bg-gray-800 text-white font-bold py-2 px-4 rounded-t">
              <div class="text-center">ID</div>
              <div class="text-center">User</div>
              <div class="text-center">Editar</div>
              <div class="text-center">Excluir</div>
            </div>
            <form method="POST">
              <?php
              $mysqli = new mysqli("localhost", "root", "", "portfolio_db");
              $consulta = $mysqli->query("SELECT * FROM admins");
              $admins = [];

              while ($usuario = $consulta->fetch_assoc()) {
                $admins[] = $usuario;
              }
              ?>
              <?php foreach ($admins as $admin): ?>
                <div class="grid grid-cols-4 items-center border-b border-x border-gray-300 py-2 px-4 hover:bg-gray-100">
                  <div class="font-[Outfit] text-center font-bold text-[#000]">
                    <?php echo htmlspecialchars($admin['admins_id']); ?>
                  </div>
                  <div class="font-[Outfit] text-center font-bold text-[#000]">
                    <?php echo htmlspecialchars($admin['admins_nome']); ?>
                  </div>
                  <div class="text-center">
                    <a href="admin_form_edit.php?id=<?php echo $admin['admins_id']; ?>"
                      class="text-orange-500 hover:text-orange-700">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                  </div>
                  <div class="text-center">
                    <a href="delete.php?id=<?php echo $admin['admins_id']; ?>"
                      onclick="return confirm('Tem certeza que deseja excluir este administrador?');"
                      class="text-red-500 hover:text-red-700">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </form>
          </div>
          <button class="py-2 rounded-full mt-4 border border-gray-300 cursor-pointer transition durantion-200 hover:bg-gray-100" title="Cadastrar novo usuário" id="abrirCadastrarAdmin">
            <i class="fa-solid text-2xl hover:text-green-600 fa-plus transition durantion-200"></i>
          </button>
        </div>
      </div>

      <div class="w-full max-w-xl p-10 bg-white rounded-xl shadow-lg hidden" id="cadastrarAdmin">
        <form method="POST" enctype="multipart/form-data" class="space-y-6">
          <fieldset>
            <div class="flex justify-between w-full items-center mb-6">
              <legend class="text-2xl font-bold text-gray-800">Cadastrar novo Admin</legend>
              <button type="button" id="fecharCadatrarAdmin" class="cursor-pointer"><i class="fa-solid fa-x text-black text-2xl"></i></button>
            </div>
            <div class="flex flex-col space-y-2">
              <label for="nomeAdmin" class="text-gray-700 font-medium">Nome</label>
              <input
                id="nomeAdmin"
                name="nome"
                type="text"
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
                placeholder="Digite o título do projeto"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                required />
            </div>
            <div class="flex flex-col space-y-2 mt-3">
              <label for="senhaAdmin" class="text-gray-700 font-medium">Senha</label>
              <input
                id="senhaAdmin"
                name="senha"
                type="password"
                placeholder="Digite o título do projeto"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                required />
            </div>
            <div class="mt-6">
              <button type="submit" name="enviar" class="w-full cursor-pointer py-3 bg-blue-500 text-white font-medium text-lg rounded-xl shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                Enviar Projeto
              </button>
            </div>
          </fieldset>
          <form>
      </div>
    </div>
  </main>
  <script>
    const containerAdminsCadastrados = document.querySelector('#adminsCadastrados');
    const containerCadastrarAdmin = document.querySelector('#cadastrarAdmin');
    const btnAbrirCadastrarAdmin = document.querySelector('#abrirCadastrarAdmin');
    const btnFecharCadatrarAdmin = document.querySelector('#fecharCadatrarAdmin');

    btnAbrirCadastrarAdmin.addEventListener('click', () => {
      containerAdminsCadastrados.classList.add('hidden');
      containerCadastrarAdmin.classList.remove('hidden');
    });

    btnFecharCadatrarAdmin.addEventListener('click', () => {
      containerCadastrarAdmin.classList.add('hidden');
      containerAdminsCadastrados.classList.remove('hidden');
    });

    setTimeout(() => {
      const msg = document.querySelectorAll('#msg-erro');
      if (msg) {
        msg.style.display = 'none';
      }
    }, 4000);
  </script>
</body>

</html>