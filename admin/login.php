<?php include '../includes/head.php'; ?>
<div class="fixed top-[1rem] left-[1rem] text-lg">
    <a href="../" class=""> <i class="fa-solid fa-arrow-left mr-2"></i>Voltar</a>
</div>

<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['senha'])){
        header('Location:painel_de_controle.php');
    }else{
        require_once("../conexao.php");
        if(isset($_POST['enviar'])){
            $user = $_POST['email'];
            $senha = md5(trim($_POST['senha']));
    
            $puxa  = $mysqli->query(
                "SELECT * FROM admins
                        WHERE admins_email = '$user'
                        AND admins_senha = '$senha'"
            );
            $mostra = $puxa->fetch_object();
            $conta = $puxa->num_rows;
            if($conta == 1){
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['senha'] = $senha;
                $_SESSION['nome'] = $mostra->admins_nome;
                $_SESSION['adminId'] = $mostra->admins_id;
                header("Location:painel_de_controle.php");
            }else{
                echo "
                    <div id='msg-erro' class='absolute bg-red-600 text-white top-11 z-80 font-semibold rounded-full flex items-center justify-center left-[50%] py-3 px-4 radious -translate-[50%]'>
                    <span>Dados Incorretos</span>
                    </div>

                    <script>
                    setTimeout(() => {
                        const msg = document.getElementById('msg-erro');
                        if (msg) {
                        msg.style.display = 'none';
                        }
                    }, 4000);
                    </script>      
                ";
            }
        }
    } 
?>
<div class="flex items-center justify-center">
    <div class="max-w-sm w-full">
        <form method="POST">
        <div class="flex flex-col text-white justify-center items-center h-screen gap-5">
            <div class="relative w-full">
                <input placeholder="Email" required class="w-full px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 bg-white text-gray-800" type="email" name="email">
            </div>
            <div class="relative flex w-full">
                <input placeholder="Senha" id="senha" required class="w-full px-4 py-2 z-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 bg-white text-gray-800" type="password" name="senha">
                <button type="button" class="bg-white rounded-e-xl hidden cursor-pointer border-l-[1px] border-gray-300 w-[60px]" id="mostrar">
                    <i class="fa-solid fa-eye fa-lg text-black" id="iconSenha"></i>
                </button>
            </div>
                <button class="px-6 py-2 w-full bg-blue-500 text-white rounded-xl shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 cursor-pointer" type="submit" name="enviar">Login</button>
            </div>
        </form>
    </div>
</div>

<script src="js/index.js"></script>