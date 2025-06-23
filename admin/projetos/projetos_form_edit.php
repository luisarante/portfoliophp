<?php
include '../verifica_admin.php';
require_once '../../conexao.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if ($id) {
    $sql = "SELECT titulo, descricao, imagem, link_repositorio, link_projeto FROM projetos WHERE id = $id";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $projeto = $resultado->fetch_assoc();
        // Atribuir os dados às variáveis
        $titulo = $projeto['titulo'];
        $descricao = $projeto['descricao'];
        $imagem = $projeto['imagem'];
        $link_repositorio = $projeto['link_repositorio'];
        $link_projeto = $projeto['link_projeto'];
    } else {
        exit('Projeto não encontrado.');
    }
} else {
    exit('ID inválido.');
}

$sql_tecnologias = "SELECT tecnologia_id FROM projetos_tecnologias WHERE projeto_id = $id";
$result_tecnologias = $mysqli->query($sql_tecnologias);

$tecnologiasSelecionadas = [];
if ($result_tecnologias && $result_tecnologias->num_rows > 0) {
    while ($row = $result_tecnologias->fetch_assoc()) {
        $tecnologiasSelecionadas[] = $row['tecnologia_id'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php include '../../includes/head.php'; ?>

<body>
    <?php
    include '../admin_header.php';
    include '../admin_aside.php';
    ?>

    <main>
        <div class="w-full flex items-center justify-center min-h-screen px-4 mt-30 mb-15">
            <div class="w-full max-w-xl p-10 bg-white rounded-xl shadow-lg">
                <form method="POST" enctype="multipart/form-data" class="space-y-6">
                    <fieldset>
                        <legend class="text-2xl font-bold text-gray-800 mb-6">Editar Projeto</legend>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                        <div class="flex flex-col space-y-2">
                            <label for="titulo" class="text-gray-700 font-medium">Título <span class="text-red-500">*</span></label>
                            <input
                                id="titulo"
                                name="titulo"
                                type="text"
                                value="<?php echo htmlspecialchars($titulo); ?>"
                                placeholder="Digite o título do projeto"
                                class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                                required />
                        </div>

                        <div class="flex flex-col space-y-2 mt-4">
                            <label for="desc" class="text-gray-700 font-medium">Descrição <span class="text-red-500">*</span></label>
                            <textarea
                                id="desc"
                                name="desc"
                                rows="4"
                                placeholder="Descreva sobre o projeto"
                                class="w-full resize-none px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                                required><?php echo htmlspecialchars($descricao); ?></textarea>
                        </div>

                        <div class="flex flex-col space-y-2 mt-4">
                            <label for="imagem" class="text-gray-700 font-medium">Imagem do projeto <span class="text-red-500">*</span></label>
                            <div class="relative py-8 flex flex-col justify-center items-center outline-2 outline-dashed outline-gray-300 rounded-xl hover:outline-[#1E3050] hover:bg-gray-200 transition duration-200">
                                <input
                                    id="imagem"
                                    name="imagem"
                                    type="file"
                                    class="w-full h-full absolute opacity-0 transition duration-300" />
                                <i class="fa-solid fa-upload text-5xl" style="color: #1E3050"></i>
                                <p class="text-gray-400 mt-2">Clique aqui para selecionar a imagem</p>
                            </div>
                            <?php if (!empty($imagem)) : ?>
                                <p class="text-sm text-gray-600 mt-2">Imagem atual: <?php echo htmlspecialchars($imagem); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="flex flex-col space-y-2 mt-4">
                            <label for="link-repo" class="text-gray-700 font-medium">Link do repositório <i class="fa-solid fa-link"></i> <span class="text-red-500">*</span></label>
                            <input
                                id="link-repo"
                                name="link_repo"
                                type="text"
                                value="<?php echo htmlspecialchars($link_repositorio); ?>"
                                placeholder="Deixe o link do repositório"
                                class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                                required />
                        </div>

                        <div class="flex flex-col space-y-2 mt-4">
                            <label for="link-proj" class="text-gray-700 font-medium">Link do projeto <i class="fa-solid fa-link"></i> <span class="text-red-500">*</span></label>
                            <input
                                id="link-proj"
                                name="link_proj"
                                type="text"
                                value="<?php echo htmlspecialchars($link_projeto); ?>"
                                placeholder="Deixe o link do projeto"
                                class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-800"
                                required />
                        </div>

                        <div class="flex flex-col space-y-2 mt-4 text-black">
                            <label class="text-gray-700 font-medium">Atualizar tecnologias <span class="text-red-500">*</span></label>
                            <div class="flex flex-wrap gap-4">
                                <?php
                                $consulta = $mysqli->query("SELECT * FROM tecnologias");
                                while ($tecnologia = $consulta->fetch_object()) {
                                    $checked = in_array($tecnologia->id, $tecnologiasSelecionadas) ? 'checked' : '';
                                    echo '<div>';
                                    echo '<input type="checkbox" name="tecnologia[]" class="peer hidden" value="' . $tecnologia->id . '" id="' . htmlspecialchars($tecnologia->nome) . '" ' . $checked . '>';
                                    echo '<label for="' . htmlspecialchars($tecnologia->nome) . '" class="block font-[Outfit] px-4 py-2 border font-bold text-[#202020] rounded-lg border-gray-300 cursor-pointer transition hover:bg-gray-100 peer-checked:bg-gray-200">';
                                    echo htmlspecialchars($tecnologia->nome);
                                    echo '</label>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" name="enviar" class="w-full cursor-pointer py-3 bg-blue-500 text-white font-medium text-lg rounded-xl shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                                Atualizar Projeto
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>

    <script src="../../js/index.js"></script>
</body>

</html>
