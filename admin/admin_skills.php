<?php
include 'verifica_admin.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include '../includes/head.php' ?>
<?php 
  $db = new mysqli("localhost", "root", "", "portfolio_db");
  $db->set_charset("utf8mb4");

  if (isset($_POST['enviar'])) {
    $nome = $_POST['nomeSkill'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nomeImagem = md5($_FILES['imagem']['name'] . time()) . "." . $ext;
        $caminho = "../images/skills/";

      move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho . $nomeImagem);
    } else {
      die("Erro: imagem não enviada ou falha no upload.");
    }

    $insere = $db->query("INSERT INTO skills(
      imagem,
      skill
    ) VALUES (
      '$nomeImagem',
      '$nome'
    )");
  }
?>
<body>
  <?php include 'admin_header.php'; ?>
  <?php include 'admin_aside.php'; ?>
  <div class="w-full flex items-center justify-center px-4 mt-30 mb-15">
    <div class="w-full max-w-xl p-10 bg-white rounded-xl shadow-lg">
      <form method="POST" enctype="multipart/form-data" class="space-y-6">
        <fieldset>
          <legend class="text-2xl font-bold text-gray-800 mb-6">Nova Skill</legend>
          <div class="flex flex-col space-y-2">
            <label for="nomeSkill" class="text-gray-700 font-medium">Nome</label>
            <input
              id="nomeSkill"
              name="nomeSkill"
              type="text"
              placeholder="Digite o nome da skill"
              class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
              required />
          </div>
          <div class="flex flex-col space-y-2 mt-4">
            <label for="imagem" class="text-gray-700 font-medium">Imagem</label>
            <div class="relative py-8 flex flex-col justify-center items-center outline-2 outline-dashed outline-gray-300 rounded-xl hover:outline-[#1E3050] hover:bg-gray-200 transition durantion-200">
              <input
                id="imagem"
                name="imagem"
                type="file"
                class="w-full h-full absolute opacity-0 transition duration-300" />
              <i class="fa-solid fa-upload text-5xl" style="color: #1E3050"></i>
              <p class="text-gray-400 mt-2">Clique aqui para selecionar a imagem</p>
            </div>
          </div>
          <div class="mt-6">
            <button type="submit" name="enviar" class="w-full cursor-pointer py-3 bg-blue-500 text-white font-medium text-lg rounded-xl shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
              Enviar
            </button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>
<script src="../js/index.js"></script>

</html>