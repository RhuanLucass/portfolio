<?php
// TODO: download extensions for front-end and take tests
// TODO: configure paths
  define('HOME', 'http://localhost/portfolio/');

  include 'assets/php/connect.php';
  include 'assets/php/require.php';
  $links = new Requires();
  $competences = new Requires();
  $projects = new Requires();
  $about = new Requires();
  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rhuan Lucas</title>
  <meta name="title" content="Portfólio - Rhuan Lucas">
  <meta name="description" content="Se quiser saber a respeito de minhas habilidades e um pouco mais sobre mim, está no lugar certo!">
  <base id="urlHome" href="<?= HOME ?>">
  <link rel="icon" type="image/x-icon" href="<?= HOME ?>assets/images/icon.ico" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Allison&family=Raleway:wght@300;400;700&display=swap" rel="stylesheet">


  <!-- CSS -->
  <link rel="stylesheet" href="<?= HOME ?>assets/css/style.css">
</head>
<body onload="preload()">
  <div class="overlay"></div>

  <section id="preload">
    <div class="container">
      <h1 class="name">Rhuan Lucas Barbosa Fernandes</h1>
    </div>
  </section>

  <div id="load">
    <header data-scroll>
      <div class="container">
        <div class="logo">
          <h1>Rhuan Lucas</h1>
        </div>

        <div class="menu-wrapper">
          <nav>
            <ul>
              <li><a class="current" href="#home">Início</a></li>
              <li><a href="#portfolio">Portfólio</a></li>
              <li><a href="#about">Sobre mim</a></li>
              <li><a href="#skills">Habilidades</a></li>
              <li><a href="#contact">Contato</a></li>
            </ul>
          </nav>
          <div id="mode">
            <label class="link" data-ballon="Dark Mode">
              <input type="checkbox">
              <i class="fa-solid fa-moon"></i>
              <span class="toggle"></span>
              <i class="fa-solid fa-sun"></i>
            </label>
          </div>
          <div class="icon-bars">
            <span class="bar-top"></span>
            <span class="bar"></span>
            <span class="bar-bottom"></span>
          </div>
        </div>
      </div>
    </header>

    <main data-scroll id="home">
      <div class="container">
        <div class="main-wrapper">
          <div data-animation="left" class="image-main">
            <div class="image">
              <img src="<?= HOME ?>assets/images/main/main.png" alt="Desenho representando o autor do portfólio.">
            </div>
            <div class="links">
              <a class="link" data-ballon="<?= $links->getLinks('github')['nome_link'] ?>"  target="_blank" href="<?= $links->getLinks('github')['link'] ?>"><i class="fa-brands fa-github"></i></a>
              <a class="link" data-ballon="<?= $links->getLinks('linkedin')['nome_link'] ?>"  target="_blank" href="<?= $links->getLinks('linkedin')['link'] ?>"><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
          <div class="description-main">
            <div data-animation="right"  class="text-main">
              <h1>Oi, me chamo
              <p class="name">Rhuan Lucas</p>
              e sou Desenvolvedor Web.</h1>
              <p>Se quiser saber a respeito de minhas habilidades e um pouco mais sobre mim, está no lugar certo!</p>
            </div>
          </div>
        </div>
        <div data-animation="left" class="down-page">
          <p>
            Role para baixo
            <div class='scrolldown'>
              <div class="chevrons">
                <div class='chevrondown'></div>
                <div class='chevrondown'></div>
              </div>
            </div>
          </p>
        </div>
      </div>
    </main>
    
    <section data-scroll id="portfolio">
      <div class="container">
        <div class="description-port">
          <div data-animation="top" class="text-port">
            <h2>Portfólio</h2>
            <p>Aqui é possível acessar os projetos que desenvolvi e venho desenvolvendo. Espero que você goste do meu trabalho.</p>
          </div>
        </div>
        <div class="projects-wrapper">
          <?php       
          $allProjects = $projects->getProjects();     
            foreach ($allProjects as $key => $value) {
              if($key >= 3) break;
          ?>
          <div class="project-single">
            <img data-animation="left" src="<?= HOME ?>assets/images/projects/<?= $value['name_image'] ?>.png" alt="Miniatura referente ao site ">
            <div data-animation="right" class="description-project">
              <h4><?= $value['name_project'] ?></h4>
              <p><?= $value['description_project'] ?></p>

              <div class="access">
                <a data-ballon="Acessar"  target="_blank" href="<?= $value['link_site'] ?>"><i class="fa-solid fa-globe"></i> Acessar</a>
                <a data-ballon="Repositório"  target="_blank" href="<?= $value['link_repository'] ?>"><i class="fa-brands fa-github"></i> Repositório</a>
              </div>
            </div>
          </div>
          <?php
            }
            echo "<script>
            const project = document.querySelectorAll('.project-single');
            project.forEach((proj, index) => {
              if(index % 2 !== 0) proj.classList.add('reverse');
            });
            </script>";
          ?>
        </div>
        <div class="more">
          <p>Ver mais<i class="fa-solid fa-chevron-down"></i></p>
        </div>
      </div>
    </section>

    <section data-scroll id="about">
      <div class="container">
        <div class="description-about">
          <h2 data-animation="top">Sobre mim</h2>
          <div  data-animation="bottom" class="text-about">
          <?php
            $contentAbout = $about->getAbout()['description'];
            $arrayAbout = explode("\n", $contentAbout );
            foreach ($arrayAbout as $key => $value) echo '<p>'.$value.'</p>';
          ?>
          </div>
        </div>
        <div data-scroll id="skills" class="competences">
          <h3 data-animation="top">Habilidades</h3>
          <div data-animation="left" class="competences-wrapper">
            <?php
              $allCompetences = $competences->getCompetences();
              foreach ($allCompetences as $key => $value) {
                if($value['id'] < 100){
            ?>
            <div class="competence">
              <img src="<?= HOME ?>assets/images/competences/<?= strtolower($value['name_competence']) ?>.png" alt="<?= $value['name_competence'] ?>">

              <div class="competence-text">
                <p><?= $value['name_competence'] ?></p>
              </div>
            </div>
            <?php
                }
              }
            ?>
          </div>
          <h4 data-animation="bottom">Iniciando em:</h4>
          <div data-animation="right" class="starting">
          <?php
              foreach ($allCompetences as $key => $value) {
                if($value['id'] > 100){
            ?>
            <div class="competence">
              <img src="<?= HOME ?>assets/images/competences/<?= strtolower($value['name_competence']) ?>.png" alt="<?= $value['name_competence'] ?>">

              <div class="competence-text">
                <p><?= $value['name_competence'] ?></p>
              </div>
            </div>
            <?php
                }
              }
            ?>
          </div>
        </div>
      </div>
    </section>

    <section data-scroll id="contact">
      <div class="container">
        <div data-animation="top" class="description-contact">
          <h2>Contato</h2>
          <p>Se tiver interesse em entrar em contato para oportunidades de negócio e projetos, ou mesmo para perguntas e feedbacks, estou disponível para conversar. Abaixo é possível entrar em contato ou acessar minhas redes.</p>
        </div>

        <div class="content-contact">
          <form data-animation="left" method="POST" action="assets/php/contact.php">
            <label for="name" hidden>Nome Completo</label>
            <input type="text" name="name" id="name" placeholder="Nome" required>
    
            <label for="email" hidden>E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail" required>
    
            <label for="cel" hidden>Celular (Opcional)</label>
            <input type="tel" name="cel" id="cel" placeholder="Celular (Opcional)" >
    
            <label for="message" hidden>Nome</label>
            <textarea name="message" id="message" placeholder="Sua mensagem" required></textarea>
    
            <input type="submit" value="Enviar">
          </form>

          <div data-animation="right" class="contacts-wrapper">
            <?php
              $email = $links->getLinks('e-mail')['nick'];
              $arrayEmail = explode('@', $email);
            ?>
            <a href="mailto:<?= $email ?>" class="email"><i class="fa-solid fa-envelope"></i><span><?=$arrayEmail[0] ?><small>@<?=$arrayEmail[1] ?></small></span></a>
            <a target="_blank" href="<?= $links->getLinks('github')['link'] ?>"><i class="fa-brands fa-github"></i> <?= $links->getLinks('github')['nick'] ?></a>
            <a target="_blank" href="<?= $links->getLinks('linkedin')['link'] ?>"><i class="fa-brands fa-linkedin"></i> <?= $links->getLinks('linkedin')['nick'] ?></a>
          </div>
        </div>
        <p data-animation="right" class="last">Obrigado (:</p>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>Copyright © Rhuan Lucas</p>
      </div>
    </footer>
    <div class="balloon"></div>
  </div>


  <script src="https://kit.fontawesome.com/dc951fd168.js" crossorigin="anonymous"></script>
  <script src="<?= HOME ?>assets/js/scripts.js"></script>
</body>
</html>