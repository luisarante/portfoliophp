<header>
    <div class="flex justify-center py-7 fixed top-0 w-full z-60 transition-500 duration-500 ease-in-out" id="header">
        <div class="max-w-7xl w-full flex justify-between items-center section-container relative">
            <div>
                <a class="text-white text-xl" href="<?= file_exists('painel_de_controle.php') ? 'painel_de_controle.php' : '../painel_de_controle.php'; ?>">Painel de Controle</a>
            </div>
            <div class="rounded-2xl absolute right-[50%] text-center translate-x-1/2 z-40 py-1 px-3 bg-[#fff] text-black" style="box-shadow: 0px 2px 15px 0px rgba(255,255,255,0.60); -webkit-box-shadow: 0px 2px 15px 0px rgba(255,255,255,0.60); -moz-box-shadow: 0px 2px 15px 0px rgba(255,255,255,0.60);">
                <?php echo $_SESSION['nome']; ?>
            </div>
            <nav>
                <ul class="text-white flex gap-12">
                    <li>
                        <a class="transition-300 duration-300 hover:text-gray-200" href="<?= file_exists('../index.php') ? '../index.php' : '../../index.php'; ?>">Início</a>
                    </li>
                    <li>
                        <a class="transition-300 duration-300 hover:text-gray-200" href="<?= file_exists('sair.php') ? 'sair.php' : '../sair.php'; ?>">Sair</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>