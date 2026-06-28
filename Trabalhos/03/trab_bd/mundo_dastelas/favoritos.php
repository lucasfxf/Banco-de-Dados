<?php
session_start();
$logged = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Favoritos</title>
  <link rel="stylesheet" href="../css/navbar.css" />
  <style>
    body {
      background-color: #0d0d0d;
      color: #fff;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0 2rem 2rem 2rem;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    h2, h3 {
      text-align: center;
    }

    .section-container {
      margin-top: 30px;
      background-color: #1c1c1c;
      padding: 20px;
      border-radius: 12px;
      width: 320px;
      margin-left: auto;
      margin-right: auto;
      box-shadow: 0 0 10px red;
    }

    .input-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin: 15px 0;
    }

    .input-group input {
      padding: 10px;
      border: none;
      border-radius: 6px;
      background-color: #333;
      color: white;
    }

    .input-group button {
      background-color: red;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      border-radius: 8px;
      overflow: hidden;
    }

    thead {
      background-color: red;
    }

    th, td {
      padding: 12px;
      text-align: left;
    }

    tbody tr:nth-child(odd) {
      background-color: #222;
    }

    tbody tr:nth-child(even) {
      background-color: #111;
    }

    .btn-remover {
      background-color: #aa0000;
      color: white;
      border: none;
      padding: 5px 8px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 0.8rem;
    }

    .footer {
      margin-top: auto;
      background-color: #1a1a1a;
      padding: 20px;
      text-align: center;
    }

    .footer-content p {
      margin: 5px;
    }

    .footer-links {
      list-style: none;
      padding: 0;
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 10px;
    }

    .footer-links li a {
      color: red;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <header>
    <nav class="navbar">
      <h1 class="titulo"><span style="color: white;">🎬Mundo</span>DasTelas</h1>
      <input type="checkbox" id="menu-toggle" />
      <label for="menu-toggle" class="menu-icon">&#9776;</label>
      <ul class="nav-menu">
        <li><a href="Inicio.php">Início</a></li>
        <li><a href="entrar.php">Login</a></li>
        <li><a href="filmes.html">Filmes</a></li>
        <li><a href="series.html">Séries</a></li>
        <li><a href="lancamentos.html">Lançamentos</a></li>
        <li><a href="favoritos.html">Favoritos</a></li>
        <li><a href="gerenciar.php">Gerenciar Logins</a></li>
        <li><a href="criadores.html">Criadores</a></li>
      </ul>
    </nav>
  </header>

  <section id="Favoritos">
    <h2>Liste abaixo seus Filmes e Séries Favoritos:</h2>

    
    <div class="section-container">
      <h3>⭐ Filmes Favoritos</h3>
      <div class="input-group">
        <input type="text" id="input-filme" placeholder="Digite o nome do filme" />
        <button id="btn-adicionar-filme">★ Adicionar</button>
      </div>
      <table>
        <thead>
          <tr>
            <th>Filme</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="tbody-filmes">
          
        </tbody>
      </table>
    </div>

    
    <div class="section-container">
      <h3>🎬 Assistindo no Momento</h3>
      <div class="input-group">
        <input type="text" id="input-assistindo" placeholder="Digite o nome do filme ou série" />
        <button id="btn-adicionar-assistindo">Adicionar</button>
      </div>
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="tbody-assistindo">
          
        </tbody>
      </table>
    </div>
  </section>

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
    
    function adicionarItem(tbodyId, inputId) {
      const nome = document.getElementById(inputId).value.trim();
      const tbody = document.getElementById(tbodyId);

      if (nome !== "") {
        const tr = document.createElement("tr");

        const tdNome = document.createElement("td");
        tdNome.textContent = nome;

        const tdBtn = document.createElement("td");
        const btn = document.createElement("button");
        btn.textContent = "Remover";
        btn.className = "btn-remover";

        
        btn.onclick = () => tr.remove();

        tdBtn.appendChild(btn);
        tr.appendChild(tdNome);
        tr.appendChild(tdBtn);
        tbody.appendChild(tr);

        document.getElementById(inputId).value = ""; 
      }
    }

    
    document.getElementById("btn-adicionar-filme").addEventListener("click", () => {
      adicionarItem("tbody-filmes", "input-filme");
    });

    document.getElementById("btn-adicionar-assistindo").addEventListener("click", () => {
      adicionarItem("tbody-assistindo", "input-assistindo");
    });
  </script>

</body>
</html>
