<header>
    <div class="flex justify-center py-7 fixed top-0 w-full z-100 transition-500 duration-500 ease-in-out" id="header">
        <div class="max-w-7xl w-full flex justify-between items-center section-container">
            <div>
                <a class="text-white text-xl" href="/">Luis Arantes</a>
            </div>
            <nav class="hidden md:block">
                <ul class="text-white flex gap-12">
                    <li>
                        <a class="transition-300 duration-300 hover:text-gray-200" href="<?= $headerarg1 ?? '#Sobre' ?>"><?= $headerarg1 ?? 'Sobre' ?></a>
                    </li>
                    <li>
                        <a class="transition-300 duration-300 hover:text-gray-200" href="<?= $headerarg2 ?? '#Projetos' ?>"><?= $headerarg2 ?? 'Projetos' ?></a>
                    </li>
                    <li>   
                        <a class="transition-300 duration-300 hover:text-gray-200" href="<?= $headerarg1 ?? '#Contato' ?>"><?= $headerarg3 ?? 'Contato' ?></a>
                    </li>
                </ul>
            </nav>
            
            <div id="menu-button" class="md:hidden cursor-pointer">
            <i class="fa-solid fa-bars text-2xl"></i>
            </div>

            <ul id="menu-modal"
                class="fixed top-0 -right-[100%] w-full h-screen bg-[#00050d] opacity-0 transition-all duration-500 hidden flex flex-col pt-[90px] pr-12 pl-4 gap-6 z-50">
                
            <li class="absolute top-9 left-4 cursor-pointer" id="close-modal-menu">
                <i class="fa-solid fa-arrow-right text-2xl"></i>
            </li>

            <li><a href="#Sobre" class="text-xl hover:text-gray-200 duration-300">Sobre</a></li>
            <li><a href="#Projetos" class="text-xl hover:text-gray-200 duration-300">Projetos</a></li>
            <li><a href="#Contato" class="text-xl hover:text-gray-200 duration-300">Contato</a></li>
            </ul>


        </div>
    </div>
</header>

<script>
  const menuButton = document.querySelector('#menu-button');
  const menuModal = document.querySelector('#menu-modal');
  const closeModalMenu = document.querySelector('#close-modal-menu');
  const menuLinks = document.querySelectorAll('#menu-modal a');

    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
        menuModal.classList.remove('right-0');
        menuModal.classList.add('-right-[100%]', 'opacity-0');

        const hideAfterTransition = () => {
        menuModal.classList.add('hidden');
        menuModal.removeEventListener('transitionend', hideAfterTransition);
        };

        menuModal.addEventListener('transitionend', hideAfterTransition);
    });
    });


  menuButton.addEventListener('click', () => {
    menuModal.classList.remove('hidden', 'opacity-0', '-right-[100%]');
    menuModal.classList.add('right-0');
  });

  closeModalMenu.addEventListener('click', () => {
    menuModal.classList.remove('right-0');
    menuModal.classList.add('-right-[100%]', 'opacity-0');

    const hideAfterTransition = () => {
      menuModal.classList.add('hidden');
      menuModal.removeEventListener('transitionend', hideAfterTransition);
    };

    menuModal.addEventListener('transitionend', hideAfterTransition);
  });
</script>

