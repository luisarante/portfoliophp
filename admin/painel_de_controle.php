<?php
include 'verifica_admin.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include '../includes/head.php' ?>

<body>
  <?php include 'admin_header.php'; ?>
  <main>
    <div class="w-full flex items-center justify-center px-4 mt-30 mb-15">
      <div class="grid grid-cols-2 gap-2 sm:gap-8 w-full max-w-4xl p-4 sm:p-10 bg-[#e8e8e8] rounded-xl shadow-lg text-black">
      <a href="admin_header.php">
        <div class="rounded-xl bg-white shadow-xl p-3 text-xl font-semibold hover:bg-gray-100 transition duration-300 cursor-pointer">
            <h3> Header </h3>
            <p class="font-normal text-base hover:text-orange-400 hover:text-orange-400">Editar <button class="text-center hover:text-orange-400 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button></p>
        </div>
      </a>
      <a href="">
        <div class="rounded-xl bg-white shadow-xl p-3 text-xl font-semibold hover:bg-gray-100 transition duration-300 cursor-pointer">
            <h3> Início </h3>
            <p class="font-normal text-base hover:text-orange-400 hover:text-orange-400">Editar <button class="text-center hover:text-orange-400 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button></p>
        </div>
      </a>
      <a href="">
        <div class="rounded-xl bg-white shadow-xl p-3 text-xl font-semibold hover:bg-gray-100 transition duration-300 cursor-pointer">
            <h3> Sobre </h3>
            <p class="font-normal text-base hover:text-orange-400 hover:text-orange-400">Editar <button class="text-center hover:text-orange-400 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button></p>
        </div>
      </a>
      <a href="admin_skills.php">
        <div class="rounded-xl bg-white shadow-xl p-3 text-xl font-semibold hover:bg-gray-100 transition duration-300 cursor-pointer">
            <h3> Skills </h3>
            <p class="font-normal text-base hover:text-orange-400 hover:text-orange-400">Editar <button class="text-center hover:text-orange-400 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button></p>
        </div>
      </a>
      <a href="admin_projetos.php">
        <div class="rounded-xl bg-white shadow-xl p-3 text-xl font-semibold hover:bg-gray-100 transition duration-300 cursor-pointer">
            <h3> Projeto </h3>
            <p class="font-normal text-base hover:text-orange-400 hover:text-orange-400">Editar <button class="text-center hover:text-orange-400 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button></p>
        </div>
      </a>
      <a href="">
        <div class="rounded-xl bg-white shadow-xl p-3 text-xl font-semibold hover:bg-gray-100 transition duration-300 cursor-pointer">
            <h3> Contato </h3>
            <p class="font-normal text-base hover:text-orange-400 hover:text-orange-400">Editar <button class="text-center hover:text-orange-400 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button></p>
        </div>
      </a>
      <a href="">
        <div class="rounded-xl bg-white shadow-xl p-3 text-xl font-semibold hover:bg-gray-100 transition duration-300 cursor-pointer">
            <h3> Footer </h3>
            <p class="font-normal text-base hover:text-orange-400 hover:text-orange-400">Editar <button class="text-center hover:text-orange-400 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button></p>
        </div>
      </a>
      <a href="admin_usuarios.php">
        <div class="rounded-xl bg-white shadow-xl p-3 text-xl font-semibold hover:bg-gray-100 transition duration-300 cursor-pointer">
            <h3> Usuários </h3>
            <p class="font-normal text-base hover:text-orange-400 hover:text-orange-400">Editar <button class="text-center hover:text-orange-400 cursor-pointer"><i class="fa-solid fa-pen-to-square"></i></button></p>
        </div>
      </a>
      </div>
    </div>
  </main>
</body>
<script src="../js/index.js"></script>

</html>