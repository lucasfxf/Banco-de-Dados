<?php
session_start();
$logged = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lançamentos</title>
  <link rel="stylesheet" href="../css/navbar.css" />
  <link rel="stylesheet" href="../css/lancamentos.css">
  <script src="https://www.youtube.com/iframe_api"></script>
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
    
    <section id="modal-carousel">
      <h2>Lançamentos em Destaque</h2>
      <div class="carousel-container">
        <button id="prev-slide" class="nav-arrow" aria-label="Anterior">&#10094;</button>

        <div class="slide active">
          <h3>The Mandalorian & Grogu</h3>
          <img
            src="https://br.web.img2.acsta.net/pictures/24/01/29/13/04/4232996.jpg"
            alt="The Mandalorian & Grogu"
            width="400"
            height="500"
          />
          <p>Estreia em 22 de maio de 2026</p>
          <button class="btn-trailer" data-trailer="https://www.youtube.com/embed/SuXMXTQUGww?autoplay=1">Assistir Trailer</button>
        </div>

        <div class="slide">
          <h3>Dune: Part Three</h3>
          <img
            src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f452aa2c-0c64-4bbf-b065-942b8dbda8bb/dk45k5n-11b65cff-8288-40bc-9b37-3713b539ae8a.png/v1/fill/w_1280,h_1928/dune__part_three____dune_3___dune_messiah__by_diamonddead_art_dk45k5n-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTkyOCIsInBhdGgiOiJcL2ZcL2Y0NTJhYTJjLTBjNjQtNGJiZi1iMDY1LTk0MmI4ZGJkYThiYlwvZGs0NWs1bi0xMWI2NWNmZi04Mjg4LTQwYmMtOWIzNy0zNzEzYjUzOWFlOGEucG5nIiwid2lkdGgiOiI8PTEyODAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.X2xJ-MkBXCG6u1KF9A0CkO2rw4gllIQ6F66-Jnq6hhw"
            alt="Dune: Part Three"
            width="400"
            height="500"
          />
          <p>Estreia em 18 de dezembro de 2026</p>
          <button class="btn-trailer" data-trailer="https://www.youtube.com/embed/a5DybNHKKKY?autoplay=1">Assistir Trailer</button>
        </div>

        <div class="slide">
          <h3>Toy Story 5</h3>
          <img
            src="https://upload.wikimedia.org/wikipedia/pt/8/8a/Toy_Story_5.jpg"
            alt="Toy Story 5"
            width="400"
            height="500"
          />
          <p>Estreia em 19 de junho de 2026</p>
          <button class="btn-trailer" data-trailer="https://www.youtube.com/embed/F8N0-ViM254?autoplay=1">Assistir Trailer</button>
        </div>

        <div class="slide">
          <h3>The Batman part II</h3>
          <img
            src="https://www.quadrorama.com.br/wp-content/uploads/2024/08/117-1.png"
            alt="The Batman part II"
            width="400"
            height="500"
          />
          <p>Estreia em xx de outubro de 2026</p>
          <button class="btn-trailer" data-trailer="https://www.youtube.com/embed/dDDsjQswUf0?autoplay=1">Assistir Trailer</button>
        </div>

         <div class="slide">
          <h3>Avengers: Doomsday</h3>
          <img
            src="https://cdna.artstation.com/p/assets/images/images/084/284/264/large/gabriel-munoz-avengers-doomsday.jpg?1738166963"
            alt="Avengers: Doomsday"
            width="400"
            height="500"
          />
          <p>Estreia em 1º de maio de 2026</p>
          <button class="btn-trailer" data-trailer="https://www.youtube.com/embed/S8cYoTkLo-8?autoplay=1">Assistir Trailer</button>
        </div>

        <button id="next-slide" class="nav-arrow" aria-label="Próximo">&#10095;</button>
      </div>
    </section>

    
    <section id="series-alta">
      <h2>Séries</h2>
      <div class="series-list">
    
        <article class="serie-item">
          <img src="https://assets-prd.ignimgs.com/2022/05/12/stranger-things-4-poster-1652365494843.jpeg" alt="Stranger Things" />
          <div class="serie-info">
            <h3>Stranger Things</h3>
            <p class="sinopse">A série retorna com a temporada 5, prometendo novos mistérios e aventuras na cidade de Hawkins.</p>
            <p><strong>Status:</strong> Em produção</p>
            <button class="btn-trailer" data-trailer="https://www.youtube.com/embed/a3thyAnShck?autoplay=1">Assistir Trailer</button>
          </div>
        </article>
    
        <article class="serie-item">
          <img src="https://br.web.img3.acsta.net/pictures/19/11/29/17/57/5161763.jpg" alt="The Witcher" />
          <div class="serie-info">
            <h3>The Witcher</h3>
            <p class="sinopse">Geralt de Rívia continua sua jornada em um mundo cheio de monstros e intrigas políticas.</p>
            <p><strong>Status:</strong> Novos episódios em produção</p>
            <button class="btn-trailer" data-trailer="https://www.youtube.com/embed/tjujvMkqWe4?autoplay=1">Assistir Trailer</button>
          </div>
        </article>
    
        <article class="serie-item">
          <img
            src="https://sm.ign.com/ign_br/screenshot/default/imagem-2024-05-22-162031979_4jtd.jpg"
            alt="House of the Dragon"/>
          <div class="serie-info">
            <h3>House of the Dragon</h3>
            <p class="sinopse">
              House of the Dragon é um épico drama de fantasia que narra a história da Casa Targaryen, cheia de intrigas, batalhas pelo poder e dragões majestosos, servindo como prelúdio para Game of Thrones.
            </p>
            <p><strong>Status:</strong> Em exibição — Temporada 2 confirmada para 2025.</p>
            <button class="btn-trailer" data-trailer="https://www.youtube.com/embed/DotnJ7tTA34?autoplay=1">Assistir Trailer</button>
          </div>
        </article>        
      </div>
    </section>        

    <section id="noticias">
      <h2>Notícias do Mundo do Entretenimento</h2>
    
      <div class="news-container">
        <article class="news-item">
          <h3>Marvel anuncia nova fase do MCU</h3>
          <p>Os próximos filmes e séries foram confirmados para lançamento entre 2025 e 2027, prometendo revolucionar o universo cinematográfico.</p>
          <a href="https://www.cnnbrasil.com.br/entretenimento/presidente-da-marvel-da-detalhes-sobre-nova-fase-do-mcu-veja-o-que-se-sabe/" class="read-more" target="_blank">Leia mais</a>
        </article>
    
        <article class="news-item">
          <h3>Oscar 2025: Expectativas e indicados</h3>
          <p>Confira os filmes e profissionais que estão concorrendo à premiação deste ano, com muitas surpresas e favoritos na disputa.</p>
          <a href="https://www.cnnbrasil.com.br/entretenimento/oscar-2025-confira-a-lista-completa-dos-indicados/" class="read-more" target="_blank">Leia mais</a>
        </article>
    
        <article class="news-item">
          <h3>Festival de Cannes destaca cinema independente</h3>
          <p>Produções independentes ganham destaque no festival, revelando novos talentos e histórias impactantes.</p>
          <a href="https://www.festival-cannes.com/en/the-festival/the-history-of-the-festival/" class="read-more" target="_blank" >Leia mais</a>
        </article>
      </div>
    </section>    
    
  </main>

  
  <div id="modal-trailer" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <iframe
        id="iframe-trailer"
        src=""
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </div>
  </div>

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
    document.addEventListener("DOMContentLoaded", () => {
      const slides = document.querySelectorAll("#modal-carousel .slide");
      const prevBtn = document.getElementById("prev-slide");
      const nextBtn = document.getElementById("next-slide");
      let currentIndex = 0;

      function showSlide(index) {
        slides.forEach((slide, i) => {
          slide.classList.toggle("active", i === index);
        });
      }

      prevBtn.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
      });

      nextBtn.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
      });

      showSlide(currentIndex);

      
      document.querySelectorAll("#modal-carousel .btn-trailer").forEach((btn) => {
        btn.addEventListener("click", (e) => {
          e.preventDefault();
          const modal = document.getElementById("modal-trailer");
          const iframe = document.getElementById("iframe-trailer");
          iframe.src = btn.getAttribute("data-trailer");
          modal.style.display = "flex";
        });
      });

      
      const closeBtn = document.querySelector(".close");
      closeBtn.addEventListener("click", () => {
        const modal = document.getElementById("modal-trailer");
        const iframe = document.getElementById("iframe-trailer");
        modal.style.display = "none";
        iframe.src = "";
      });

      
      window.addEventListener("click", (e) => {
        const modal = document.getElementById("modal-trailer");
        const iframe = document.getElementById("iframe-trailer");
        if (e.target === modal) {
          modal.style.display = "none";
          iframe.src = "";
        }
      });
    });
  </script>
</body>
</html>
