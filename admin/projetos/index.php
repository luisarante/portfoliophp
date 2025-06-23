  <?php
    include '../verifica_admin.php';
  ?>

  <!DOCTYPE html>
  <html lang="pt-BR">
  <?php include '../../includes/head.php'?>
  <body>
  <?php 
      include '../admin_header.php'; 
      include '../admin_aside.php';
  ?>
  <?php 
    $db = new mysqli("localhost", "root", "", "portfolio_db");
    $db->set_charset("utf8mb4");

    if (isset($_POST['enviar'])) {
      $titulo = $_POST['titulo'];
      $descricao = $_POST['desc'];
      $link_repo = $_POST['link_repo'];
      $link_proj = $_POST['link_proj'];

      if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
          $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
          $nomeImagem = md5($_FILES['imagem']['name'] . time()) . "." . $ext;
          $caminho = "../../images/projetos/";

        move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho . $nomeImagem);
      } else {
        die("Erro: imagem não enviada ou falha no upload.");
      }

      $insere = $db->query("INSERT INTO projetos(
        titulo,
        descricao,
        imagem,
        link_repositorio,
        link_projeto
      ) VALUES (
        '$titulo',
        '$descricao',
        '$nomeImagem',
        '$link_repo',
        '$link_proj'
      )");

      if ($insere) {
        $projeto_id = $db->insert_id;

        if (!empty($_POST['tecnologia'])) {
          foreach ($_POST['tecnologia'] as $tecnologia_id) {
            $db->query("INSERT INTO projeto_tecnologia (projeto_id, tecnologia_id)
            VALUES (
              '$projeto_id', 
              '$tecnologia_id'
            )");
          }
        }
      } else {
        echo "Erro ao inserir projeto: " . $db->error;
      }
    }
  ?>

  <main>
    <div class="w-full flex items-center justify-center min-h-screen px-4 mt-30 mb-15">
      <div class="w-full max-w-xl p-10 bg-white rounded-xl shadow-lg">
        <form method="POST" enctype="multipart/form-data" class="space-y-6">
          <fieldset>
            <legend class="text-2xl font-bold text-gray-800 mb-6">Novo Projeto</legend>

            <div class="flex flex-col space-y-2">
              <label for="titulo" class="text-gray-700 font-medium">Título</label>
              <input
                id="titulo"
                name="titulo"
                type="text"
                placeholder="Digite o título do projeto"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                required
              />
            </div>

            <div class="flex flex-col space-y-2 mt-4">
              <label for="desc" class="text-gray-700 font-medium">Descrição</label>
              <textarea
                id="desc"
                name="desc"
                rows="4"
                placeholder="Descreva sobre o projeto"
                class="w-full resize-none px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                required
              ></textarea>
            </div>

            <div class="flex flex-col space-y-2 mt-4">
              <label for="imagem" class="text-gray-700 font-medium">Imagem do projeto</label>
              <div class="relative py-8 flex flex-col justify-center items-center outline-2 outline-dashed outline-gray-300 rounded-xl hover:outline-[#1E3050] hover:bg-gray-200 transition durantion-200">
                <input
                  id="imagem"
                  name="imagem"
                  type="file"
                  class="w-full h-full absolute opacity-0 transition duration-300"
                  
                />
                <i class="fa-solid fa-upload text-5xl" style="color: #1E3050"></i>
                <p class="text-gray-400 mt-2">Clique aqui para selecionar a imagem</p>
              </div>
            </div>

            <div class="flex flex-col space-y-2 mt-4">
              <label for="link-repo" class="text-gray-700 font-medium">Link do repositório <i class="fa-solid fa-link"></i></label>
              <input
                id="link-repo"
                name="link_repo"
                type="text"
                placeholder="Deixe o link do repositório"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                required
              />
            </div>

            <div class="flex flex-col space-y-2 mt-4">
              <label for="link-proj" class="text-gray-700 font-medium">Link do projeto <i class="fa-solid fa-link"></i></label>
              <input
                id="link-proj"
                name="link_proj"
                type="text"
                placeholder="Deixe o link do projeto"
                class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                required
              />
            </div>

            <div class="flex flex-col space-y-2 mt-4 text-black">
              <label for="link-proj" class="text-gray-700 font-medium">Tecnologias utilizadas</label>
              <div class="flex flex-wrap gap-4">
                <?php
                  $mysqli = new mysqli("localhost", "root", "", "portfolio_db");
                  $consulta = $mysqli->query("SELECT * FROM tecnologias");
                  while ($tecnologia = $consulta->fetch_object()) {
                    echo '<div>';
                      echo '<input type="checkbox" name="tecnologia[]" class="peer hidden" value="' . $tecnologia->id . '" id="' . $tecnologia->nome . '"> ';
                      echo '<label for="' . $tecnologia->nome . '" class="block font-[Outfit] px-4 py-2 border font-bold text-[#202020] rounded-lg border-gray-300 cursor-pointer transition hover:bg-gray-100 peer-checked:bg-gray-200">';
                        echo $tecnologia->nome;
                      echo '</label>';
                    echo '</div>';
                  }
                ?>
              </div>
            </div>
            <div class="mt-6">
              <button type="submit" name="enviar" class="w-full cursor-pointer py-3 bg-blue-500 text-white font-medium text-lg rounded-xl shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                Enviar Projeto
              </button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </main>

  <section id="Projetos">
    <div class="flex flex-col items-center w-full justify-center py-26">
      <h1 class="mb-12 text-4xl font-bold text-white">Projetos já cadastrados</h1>
      <div class="max-w-7xl flex w-full items-center flex-wrap gap-16 sm:gap-8 justify-center">
        <?php

        $consulta = $db->query("
                    SELECT 
                      p.id AS projeto_id,
                      p.titulo,
                      p.descricao,
                      p.imagem,
                      p.link_repositorio,
                      p.link_projeto,
                      t.nome AS tecnologia
                    FROM projetos p
                    LEFT JOIN projeto_tecnologia pt ON p.id = pt.projeto_id
                    LEFT JOIN tecnologias t ON pt.tecnologia_id = t.id
                    ORDER BY p.id DESC
                  ");

        $projetos = [];

        while ($row = $consulta->fetch_object()) {
          $id = $row->projeto_id;

          if (!isset($projetos[$id])) {
            $projetos[$id] = [
              'titulo' => $row->titulo,
              'descricao' => $row->descricao,
              'imagem' => $row->imagem,
              'link_repositorio' => $row->link_repositorio,
              'link_projeto' => $row->link_projeto,
              'tecnologias' => []
            ];
          }

          if (!empty($row->tecnologia)) {
            $projetos[$id]['tecnologias'][] = $row->tecnologia;
          }
        }

        foreach ($projetos as $id => $projeto) {
          echo "<div class='flex flex-col justify-center align-center bg-[#50597B]/40 rounded-xl'> 
                  <div class='w-sm max-h-[183px] overflow-hidden'> 
                      <img class='text-white rounded-t-xl h-full w-auto object-cover' src='../../images/projetos/{$projeto['imagem']}' alt='Imagem do projeto {$projeto['titulo']}'> 
                  </div> 
                  <div class='flex flex-col p-3 gap-5 max-w-sm'> 
                    <h3 class='text-3xl text-white font-bold'>{$projeto['titulo']}</h3> 
                    <div class='flex gap-2 flex-wrap'> ";
                    foreach ($projeto['tecnologias'] as $tecnologia) {
                      echo "<span class='block font-[Outfit] px-2 py-1 text-xs border font-bold text-white rounded-lg border-gray-300 cursor-default transition durantion-700 hover:bg-gray-900'>";
                      echo $tecnologia;
                      echo "</span>";
                    }
              echo  "</div>
                  <div> 
                    <p>" . nl2br($projeto['descricao']) . "</p>
                  </div> 
                  <div class='flex gap-3 items-center'> 
                    <a href='{$projeto['link_projeto']}' target='_blank'> 
                      <button class='text-white bg-[#171B27] rounded-lg py-2 px-4 text-md font-bold cursor-pointer hover:bg-[#1F2431] transition-400 duration-400'><i class='fa-solid fa-arrow-up-right-from-square mr-1' style='color: #ffffff;'></i> Abrir projeto</button> 
                    </a> 
                    <a href='{$projeto['link_repositorio']}' target='_blank'> 
                      <button class='text-white text-md cursor-pointer font-bold py-2 px-4 border hover:[&>i]:text-[#000000] rounded-lg hover:bg-white transition-400 duration-400 hover:text-[#171B27]'><i class='fa-brands fa-github mr-1 fa-xl'></i> Repositório</button> 
                    </a> 
                  </div>
                  <div class='flex w-full justify-between'>
                    <div class='text-center'>
                      <a href='projetos_form_edit.php?id={$id}'
                        class='text-orange-500 hover:text-orange-700'>
                        <i class='fa-solid fa-pen-to-square'></i> Editar
                      </a>
                    </div>
                    <div class='text-center'>
                      <a href='delete.php?id={$id}&rota=users/' 
                        onclick=\"return confirm('Tem certeza que deseja excluir este projeto?');\" 
                        class='text-red-500 hover:text-red-700'>
                        <i class='fa-solid fa-trash'></i> Excluir
                      </a>
                    </div>
                  </div> 
                </div> 
                </div> 
                ";    
        }
        ?>
      </div>
  </section>

  <script src="../../js/index.js"></script>
  </body>
  </html>