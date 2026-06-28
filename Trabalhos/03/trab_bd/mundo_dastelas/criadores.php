<?php
session_start();
$logged = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criadores</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/criadores.css">

</head>
<body>

    <header>
        <nav class="navbar">
        <h1 class="titulo"><span style="color: white;">🎬Mundo</span>DasTelas</h1>
      
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
        <h2>Criadores do Projeto</h2>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Papéis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lucas</td>
                    <td>Página de Início, Favoritos, Lançamentos, CRUD, tabela dos papéis</td>
                </tr>
                <tr>
                    <td>Miguel</td>
                    <td>Página de Filmes, Login, Barra de Navegação, CRUD, tabela dos papéis</td>
                </tr>
                <tr>
                    <td>Hudson</td>
                    <td>Página de Séries, CRUD, tabela dos papéis</td>
                </tr>
            </tbody>
        </table>

        <section>
            <div class="card">
                <h3>Miguel</h3>
                    <img src="cr7.jpg" alt="Foto representativa de Miguel" width="200" height="250">
             </div>
             <div class="card">
                  <h3>Lucas</h3>
                     <img src="neyma.jpg" alt="Foto representativa de Lucas" width="200" height="250">
            </div>
             <div class="card">
                 <h3>Hudson</h3>
                      <img src="messi.jpg" alt="Foto representativa de Hudson" width="200" height="250">
            </div>
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
