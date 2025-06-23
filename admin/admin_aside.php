<aside class="fixed left-0 top-[50%] min-w-[7rem] -translate-y-1/2 -translate-x-[100px] hover:translate-x-[0px] py-5 bg-zinc-50 rounded-e-lg text-black font-semibold transition duration-300" style="box-shadow: -5px 0px 47px -8px rgba(255,255,255,0.6);">
    <nav>
        <ul class="flex flex-col gap-2 text-center">
            <li>
                <a href="">Header</a>
            </li>
            <li>
                <a href="">Início</a>
            </li>
            <li>
                <a href="">Sobre</a>
            </li>
            <li>
                <a href="<?= file_exists('skills/') ? 'skills/' : '../skills/'; ?>">Skills</a>
            </li>
            <li>
                <a href="<?= file_exists('projetos/') ? 'projetos/' : '../projetos/'; ?>">Projetos</a>                
            </li>
            <li>
                <a href="">Contato</a>
            </li>
            <li>
                <a href="">Footer</a>
            </li>
            <li>
                <a href="<?= file_exists('users/') ? 'users/' : '../users/'; ?>">Usuários</a>
            </li>
        </ul>
    </nav>
</aside>