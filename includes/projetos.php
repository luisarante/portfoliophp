<section id="Projetos" class="">
  <div class="flex flex-col items-center w-full justify-center mt-26">
    <h1 class="mb-12 text-4xl font-bold text-white">Projetos</h1>
    <div class="max-w-7xl flex w-full items-center flex-wrap gap-16 sm:gap-8 justify-center">
      <?php
      $db = new mysqli("localhost", "root", "", "portfolio_db");
      $db->set_charset("utf8");

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

      foreach ($projetos as $projeto) {
        echo  "  <div class='flex flex-col justify-center align-center bg-[#50597B]/40 rounded-xl'> ";
        echo  "      <div class='w-sm max-h-[183px] overflow-hidden'> ";
        echo  "          <img class='text-white rounded-t-xl h-full w-auto object-cover' src='images/projetos/{$projeto['imagem']}' alt='Imagem do projeto {$projeto['titulo']}'> ";
        echo  "      </div> ";
        echo  "      <div class='flex flex-col p-3 gap-5 max-w-sm'> ";
        echo  "          <h3 class='text-3xl text-white font-bold'>{$projeto['titulo']}</h3> ";
        echo  "          <div class='flex gap-2 flex-wrap'> ";
        foreach ($projeto['tecnologias'] as $tecnologia) {
          echo "<span class='block font-[Outfit] px-2 py-1 text-xs border font-bold text-white rounded-lg border-gray-300 cursor-default transition durantion-700 hover:bg-gray-900'>";
          echo $tecnologia;
          echo "</span>";
        }
        echo  "          </div> ";
        echo  "          <div class=''> ";
        echo  "               <p>" . nl2br($projeto['descricao']) . "</p>";
        echo  "          </div> ";
        echo  "          <div class='flex gap-3 items-center'> ";
        echo  "              <a href='{$projeto['link_projeto']}' target='_blank'> ";
        echo  "                  <button class='text-white bg-[#171B27] rounded-lg py-2 px-4 text-md font-bold cursor-pointer hover:bg-[#1F2431] transition-400 duration-400'><i class='fa-solid fa-arrow-up-right-from-square mr-1' style='color: #ffffff;'></i> Abrir projeto</button> ";
        echo  "              </a> ";
        echo  "              <a href='{$projeto['link_repositorio']}' target='_blank'> ";
        echo  "                  <button class='text-white text-md cursor-pointer font-bold py-2 px-4 border hover:[&>i]:text-[#000000] rounded-lg hover:bg-white transition-400 duration-400 hover:text-[#171B27]'><i class='fa-brands fa-github mr-1 fa-xl'></i> Repositório</button> ";
        echo  "              </a> ";
        echo  "          </div> ";
        echo  "      </div> ";
        echo  "  </div> ";
      }
      ?>
    </div>
</section>