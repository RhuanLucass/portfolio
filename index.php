  <?php
  define('HOME', 'http://localhost/portfolio/');

  include 'assets/php/connect.php';
  include 'assets/php/require.php';
  $links = new Requires();
  $competences = new Requires();
  $projects = new Requires();
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
            <img data-animation="left" src="<?= HOME ?>assets/images/main/Google_web_search.png" alt="Miniatura referente ao site ">
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
            <p>Se você chegou aqui, imagino que queira me conhecer um pouco mais. Então, vamos lá!</p>
            <p>Me chamo Rhuan Lucas Barbosa Fernandes e tenho 23 anos. Em 2018, iniciei meus estudos em Engenharia de Computação no CEFET-MG, graduação que não foi possível concluir, mas aprendi muito e me apaixonei pela área. Foi o local onde aprendi lógica de programação com a linguagem C e orientação a objetos com Java.</p>
            <p>Em 2020, comecei a me aprofundar no Desenvolvimento Web e realizar cursos para me aprofundar neste segmento, onde aprendi o front-end com HTML, CSS, JavaScript e um pouco de Jquery e Bootstrap, além do back-end com PHP. Continuo buscando aprimorar meus conhecimentos e realizando novos cursos e pesquisas, também estou cursando Engenharia de Software na Unopar.</p>
            <p>Caso queira saber um pouco sobre meus interesses, gosto de alguns esportes, mas a capoeira é o mais importante em minha vida. Através dela, aprendi a ter mais responsabilidade, respeito e a realizar atividades em grupo. A leitura é algo que venho introduzindo em minha rotina, pois sei de sua importância para meu desenvolvimento. Por fim, em meu tempo livre gosto de sair com amigos, jogar e assistir séries.</p>
          </div>
        </div>
        <div data-scroll id="skills" class="competences">
            <h3 data-animation="top">Habilidades</h3>
            <div data-animation="left" class="competences-wrapper">
              <div class="text" data-ballon="html" >
                <img src="<?= HOME ?>assets/images/competences/html.png" alt="html">
                <p>Html</p>
              </div>
              <div class="text" data-ballon="css" >
                <img src="<?= HOME ?>assets/images/competences/css.png" alt="css">
                <p>Css</p>
              </div>
              <div class="text" data-ballon="javascript" >
                <img src="<?= HOME ?>assets/images/competences/js.png" alt="javascript">
              </div>
              <div class="text" data-ballon="php" >
                <img src="<?= HOME ?>assets/images/competences/php.png" alt="php">
              </div>
              <div class="text" data-ballon="sql" >              
                <img src="<?= HOME ?>assets/images/competences/sql.png" alt="sql">
              </div>
              <div class="text" data-ballon="git" >            
                <img src="<?= HOME ?>assets/images/competences/git.png" alt="git">
              </div>
              <div class="text" data-ballon="jquery" >              
                <img src="<?= HOME ?>assets/images/competences/jquery.png" alt="jquery">
              </div>
              <div class="text" data-ballon="wordpress" >              
                <img src="<?= HOME ?>assets/images/competences/wordpress.png" alt="wordpress">
              </div>
              <div class="text" data-ballon="java" >              
                <img src="assets/images/competences/java.png" alt="java">
              </div>
              <div class="text" data-ballon="linguagem c" >              
                <img src="<?= HOME ?>assets/images/competences/c.png" alt="linguagem c">
              </div>
            </div>
            <h4 data-animation="bottom">Iniciando em:</h4>
            <div data-animation="right" class="starting">
              <div class="text" data-ballon="react" >              
                <img src="<?= HOME ?>assets/images/competences/react.png" alt="react">
              </div>
              <div class="text" data-ballon="node js" >            
                <img src="<?= HOME ?>assets/images/competences/nodejs.png" alt="node js">
              </div>
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
          <form data-animation="left" action="">
            <label for="name" hidden>Nome Completo</label>
            <input type="text" name="name" id="name" placeholder="Nome">
    
            <label for="email" hidden>E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail">
    
            <label for="cel" hidden>Celular (Opcional)</label>
            <input type="tel" name="cel" id="cel" placeholder="Celular (Opcional)">
    
            <label for="message" hidden>Nome</label>
            <textarea name="message" id="message" placeholder="Sua mensagem"></textarea>
    
            <input type="submit" value="Enviar">
          </form>

          <div data-animation="right" class="contacts-wrapper">
            <a href="mailto:contactrhuanlucas@gmail.com" class="email"><i class="fa-solid fa-envelope"></i><span> contactrhuanlucas<small>@gmail.com</small></span></a>
            <a target="_blank" href="https://github.com/RhuanLucass"><i class="fa-brands fa-github"></i> rhuanlucass</a>
            <a target="_blank" href="https://www.linkedin.com/in/rhuanlucass/"><i class="fa-brands fa-linkedin"></i> rhuanlucass</a>
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