<?php
session_start();
$logged = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mundo das Telas</title>
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/inicio.css">
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
    <section class="hero">
      <div class="hero-content">
        <h2>Bem-vindo ao Mundo das Telas</h2>
        <p>
          Seu universo de filmes e séries começa aqui!<br>
          Fique por dentro dos lançamentos, explore os favoritos do momento<br>
          e mergulhe no melhor do cinema e da TV!
        </p>

        <div class="acoes">
          <?php if(!$logged): ?>
            <form action="entrar.php" method="get">
              <button type="submit" class="botao-branco">Entrar</button>
            </form>

            <div class="ou">
              <hr><span>ou</span><hr>
            </div>

            <form action="inserir.php" method="get">
              <button type="submit" class="botao-branco">Cadastrar</button>
            </form>
          <?php else: ?>
            <p>Bem-vindo, <strong><?= htmlspecialchars($_SESSION['user_name'] ?? 'Usuário') ?></strong>!</p>
            <form action="sair.php" method="post">
              <button type="submit" class="botao-branco">Sair</button>
            </form>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="conteudo">
      <h3>Explore nossos catálogos</h3>
      <p>Confira os filmes, séries e lançamentos mais populares do momento. Navegue pelos gêneros, adicione aos seus favoritos e aproveite ao máximo a experiência cinematográfica online.</p>
    </section>
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
