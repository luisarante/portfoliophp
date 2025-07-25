# 💼 Projeto: Painel de Controle para Portfólio PHP

## 📌 Visão Geral

Este projeto é um sistema completo de gerenciamento de conteúdo para um portfólio web, desenvolvido com **PHP puro** e estilizado com **Tailwind CSS**. A aplicação permite que administradores editem dinamicamente informações como *skills*, *projetos* e textos exibidos na página principal, utilizando um painel central conectado a um banco de dados via **XAMPP** e **phpMyAdmin**.

> ⚠️ Este sistema não será usado como portfólio final, mas foi essencial para meu aprendizado em desenvolvimento web fullstack.

---

## 🛠️ Tecnologias Utilizadas

- ⚙️ PHP (sem frameworks)
- 🐬 MySQL + phpMyAdmin via XAMPP
- 🎨 Tailwind CSS
- 🖼️ HTML + CSS
- ✨ JavaScript (interações no painel)

---

## 🧠 O que Aprendi

- Organização de aplicações PHP com separação de responsabilidades
- Sistema de autenticação e controle de acesso para múltiplos usuários
- Implementação de CRUD completo para projetos e skills
- Estilização moderna e responsiva com Tailwind CSS
- Conexão e manipulação segura de dados no MySQL
- Gerenciamento de arquivos e imagens via painel administrativo

---

## 📁 Estrutura de Pastas

portfolio-php/
├── admin/
│   ├── login.php
│   ├── painel_de_controle.php
│   ├── sair.php
│   ├── verifica_admin.php
│   ├── admin_aside.php
│   ├── admin_header.php
├── projetos/
│   ├── index.php
│   ├── delete.php
│   └── projetos_form_edit.php
├── skills/
│   ├── index.php
│   ├── delete.php
│   └── skills_form_edit.php
├── users/  ← Gestão de administradores
│   ├── admin_form_edit.php
│   ├── delete.php
│   ├── index.php
│   └── user_edit.php
├── includes/
│   ├── conexao.php
│   ├── contato.php
│   ├── footer.php
│   ├── head.php
│   ├── header.php
│   └── ...
├── js/
│   ├── index.js
├── css/
│   ├── global.css
│   └── media.css
├── images/
│   ├── projetos/
│   └── skills/
├── index.php  ← Página principal gerada com dados do banco


---

## 🔐 Recursos do Sistema

- Login de administradores com controle de sessão
- Cadastro e edição de projetos com imagens e links
- Gerenciamento de habilidades técnicas (skills)
- Controle de texto dinâmico do site via banco de dados
- Administração de contas de usuários com acesso ao painel

---

## 📝 Conclusão

Este projeto representa minha evolução como desenvolvedor back-end com PHP, e me ensinou na prática como conectar, organizar e gerenciar dados em um sistema real. Apesar de não estar online como portfólio final, é um dos projetos que mais contribuíram para minha formação técnica e lógica de programação.

