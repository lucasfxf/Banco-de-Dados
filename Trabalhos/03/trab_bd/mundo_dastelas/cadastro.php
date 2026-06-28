<?php
session_start();
$logged = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <link rel="stylesheet" href="../css/navbar.css" />
  <link rel="stylesheet" href="../css/cadastro.css" />

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

  
  <main class="main-login">
    <div class="conteudo">
      <div class="form-container">
        <h1>Formulário de Cadastro</h1>
        <form action="/submit" method="post">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" required>

          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" required>

          <label for="senha">Senha:</label>
          <input type="password" id="senha" name="senha" required>

          <label for="confirmar-senha">Confirmar Senha:</label>
          <input type="password" id="confirmar-senha" name="confirmar-senha" required>

          <div class="buttons">
            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
            <button type="button" class="btn-voltar" onclick="location.href='entrar.php'">Voltar</button>
          </div>
        </form>
      </div>
    </div>
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

</body>
</html>