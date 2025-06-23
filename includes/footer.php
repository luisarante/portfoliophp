<footer class="w-full border-t border-[#3c435c] pt-8 pb-6 text-center relative">
    <div class="absolute bottom-[1rem] right-[1rem] text-white">
        <a href="admin/login.php"><button class="cursor-pointer">Entrar</button></a>
    </div>
    <div class="mx-auto px-4">
        <p class="text-sm text-gray-500 mb-4">
            &copy; <span id="ano"></span> Luis Arantes. Todos os direitos reservados.
        </p>
        <div class="flex items-center gap-6 justify-center h-12">
            <a target="_blank" href="https://github.com/luisarante"><i class="fa-brands fa-github cursor-pointer fa-xl inline-block hover:before:text-gray-400" style="color: #FFF;"></i></a>
            <a target="_blank" href="https://www.linkedin.com/in/luis-fernando-arantes-97ba9b285/"><i class="fa-brands fa-linkedin cursor-pointer fa-xl hover:before:text-gray-400 transition-colors duration-300" style="color: #FFF;"></i></a>
            <a href="mailto:arantesluisfernando@gmail.com?subject=Contato%20via%20Portfólio&body=Olá,%20gostaria%20de%20falar%20com%20você."><i class="fa-solid fa-envelope cursor-pointer fa-xl hover:before:text-gray-400 transition-colors duration-300" style="color: #FFF;"></i></a>
        </div>
    </div>
</footer>
<script>
    document.getElementById('ano').textContent = new Date().getFullYear();
</script>   