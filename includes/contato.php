<section class="flex items-center my-26 justify-center section-contato px-2" id="Contato">
    <div class="max-w-3xl flex flex-col items-center top-section w-full px-4 py-10 sm:p-20 bg-[#2e3448] rounded-xl">
        <h2 class="text-3xl font-bold mb-6 text-center text-white">Entre em Contato</h2>
        <form class="space-y-6 w-full">
            <div>
                <label for="nome" class="text-white block mb-1 font-medium bottom-[5px] left-[16px] cursor-text">Nome</label>
                <input type="text" id="nome" name="nome" required class="text-[#f5f5f5] w-full px-4 py-2 border border-white rounded-lg focus:outline-none focus:ring-2 focus:ring-white" />
            </div>
            <div>
                <label for="email" class="text-white block mb-1 font-medium bottom-[5px] left-[16px] cursor-text">Email</label>
                <input type="email" id="email" name="email" required class="text-[#f5f5f5] w-full px-4 py-2 border border-white rounded-lg focus:outline-none focus:ring-2 focus:ring-white" />
            </div>
            <div>
                <label for="mensagem" class="text-white block mb-1 font-medium top-[8px] left-[16px] cursor-text">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="5" required class="text-[#f5f5f5] resize-none w-full border-white px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-white"></textarea>
            </div>
            <div class="w-full flex justify-center">
                <button type="submit" class="text-white bg-[#171B27] rounded-lg w-full py-3 text-md font-bold cursor-pointer hover:bg-[#1F2431] transition-400 duration-400 hover:scale-105 transition-transform"><i class="fa-regular fa-paper-plane mr-1 fa-lg" style="color: #ffffff;"></i> Enviar Mensagem</button>
            </div>
        </form>
    </div>
</section>