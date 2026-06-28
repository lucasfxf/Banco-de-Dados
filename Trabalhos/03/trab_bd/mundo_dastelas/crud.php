<?php
session_start();
$logged = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CRUD - Gerenciar Logins</title>
  <link rel="stylesheet" href="../css/navbar.css" />
  <link rel="stylesheet" href="../css/crud.css">
  
</head>
<body>

  <header>
    <nav class="navbar">
      <h1 class="titulo"><span style="color: white;">🎬 Mundo</span>DasTelas</h1>

      <input type="checkbox" id="menu-toggle">
      <label for="menu-toggle" class="menu-icon">&#9776;</label>

      <ul class="nav-menu">
        <li><a href="Inicio.php">Início</a></li>
        <li><a href="entrar.php">Login</a></li>
        <li><a href="filmes.php">Filmes</a></li>
        <li><a href="series.php">Séries</a></li>
        <li><a href="lancamentos.php">Lançamentos</a></li>
        <li><a href="favoritos.php">Favoritos</a></li>
        <li><a href="gerenciar.php">Gerenciar Logins</a></li>
        <li><a href="criadores.php">Criadores</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Gerenciar Logins</h2>

    <form id="loginForm">
      <input type="text" id="usuario" placeholder="Usuário" required />
      <input type="email" id="email" placeholder="Email" required />
      <input type="password" id="senha" placeholder="Senha" required />
      <button type="submit" id="btnSubmit">Adicionar</button>
      <button type="button" id="btnCancelar" style="display:none; background-color:#555;">Cancelar</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>Usuário</th>
          <th>Email</th>
          <th>Senha</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="tabelaLogins">
       
      </tbody>
    </table>
  </main>

  <footer class="footer">
    <div class="footer-content">
      <p>© 2025 Mundo das Telas. Todos os direitos reservados.</p>
      <p>Projeto desenvolvido por Lucas, Miguel e Hudson</p>
      <ul class="footer-links">
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Contato</a></li>
        <li><a href="#">Privacidade</a></li>
      </ul>
    </div>
  </footer>

  <script>
    const form = document.getElementById('loginForm');
    const usuarioInput = document.getElementById('usuario');
    const emailInput = document.getElementById('email');
    const senhaInput = document.getElementById('senha');
    const tabelaLogins = document.getElementById('tabelaLogins');
    const btnSubmit = document.getElementById('btnSubmit');
    const btnCancelar = document.getElementById('btnCancelar');

    let logins = JSON.parse(localStorage.getItem('logins')) || [];
    let editIndex = null;

    function salvarLocalStorage() {
      localStorage.setItem('logins', JSON.stringify(logins));
    }

    function limparFormulario() {
      usuarioInput.value = '';
      emailInput.value = '';
      senhaInput.value = '';
      editIndex = null;
      btnSubmit.textContent = 'Adicionar';
      btnCancelar.style.display = 'none';
    }

    function renderTabela() {
      tabelaLogins.innerHTML = '';
      logins.forEach((login, index) => {
        const tr = document.createElement('tr');

       
        const senhaOculta = '*'.repeat(login.senha.length);

        tr.innerHTML = `
          <td>${login.usuario}</td>
          <td>${login.email}</td>
          <td>${senhaOculta}</td>
          <td>
            <button onclick="editarLogin(${index})">Editar</button>
            <button onclick="removerLogin(${index})">Remover</button>
          </td>
        `;

        tabelaLogins.appendChild(tr);
      });
    }

    function editarLogin(index) {
      const login = logins[index];
      usuarioInput.value = login.usuario;
      emailInput.value = login.email;
      senhaInput.value = login.senha;
      editIndex = index;
      btnSubmit.textContent = 'Salvar';
      btnCancelar.style.display = 'inline-block';
    }

    function removerLogin(index) {
      if (confirm(`Deseja remover o login de ${logins[index].usuario}?`)) {
        logins.splice(index, 1);
        salvarLocalStorage();
        renderTabela();
        if(editIndex === index){
          limparFormulario();
        }
      }
    }

    btnCancelar.addEventListener('click', () => {
      limparFormulario();
    });

    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const usuario = usuarioInput.value.trim();
      const email = emailInput.value.trim();
      const senha = senhaInput.value;

      if (!usuario || !email || !senha) {
        alert('Por favor, preencha todos os campos.');
        return;
      }

      if (editIndex !== null) {
        
        logins[editIndex] = { usuario, email, senha };
      } else {
        
        if (logins.some(login => login.usuario.toLowerCase() === usuario.toLowerCase())) {
          alert('Usuário já existe!');
          return;
        }
        logins.push({ usuario, email, senha });
      }

      salvarLocalStorage();
      renderTabela();
      limparFormulario();
    });

    
    window.editarLogin = editarLogin;
    window.removerLogin = removerLogin;

    
    renderTabela();
  </script>
</body>
</html>
