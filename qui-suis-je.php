<?php include './script/script.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Qui suis-je ? | Morgan ZARKA</title>
  <link rel="stylesheet" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Rubik:wght@300;500&display=swap"
    rel="stylesheet">
  <link rel="icon" href="./img/filigrane.svg" type="image/svg+xml">
</head>

<body>
  <div class="wrapper">
    <header>
      <a href="./index.php" title="Accueil" class="logo"><img src="./img/filigrane.svg" alt="Accueil"></a>
      <nav>
        <a href="./qui-suis-je.php" title="">Qui suis-je ?</a>
        <a href="./projets.php" title="Mes projets">Mes projets</a>
        <a href="" title="">Contact</a>
      </nav>
    </header>

    <main>
      <section class="content">
        <h1>Qui suis-je ?</h1>
        <h2>Un peu plus sur moi</h2>
        <h2>Mes passions</h2>
        </section>
        <div class="containerSlides">
          <div class="cont">
            <div class="slide slide1 active ">
              <div class="texte">
                <h1>Escalade</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores pariatur nisi animi saepe, repellat
                  autem ratione. Ipsam est non ratione rerum, distinctio omnis, corporis expedita amet maiores
                  reprehenderit
                </p>
              </div>
            </div>
            <div class="slide slide2 nonActive">
              <div class="texte">
                <h1>Plongée</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores pariatur nisi animi saepe, repellat
                  autem ratione. Ipsam est non ratione rerum, distinctio omnis, corporis expedita amet maiores
                  reprehenderit
                </p>
              </div>
            </div>
            <div class="slide slide3 nonActive">
              <div class="texte">
                <h1>Apnée</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores pariatur nisi animi saepe, repellat
                  autem ratione. Ipsam est non ratione rerum, distinctio omnis, corporis expedita amet maiores
                  reprehenderit
                </p>
              </div>
            </div>
            <div class="slide slide4 nonActive">
              <div class="texte">
                <h1>Photographie</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores pariatur nisi animi saepe, repellat
                  autem ratione. Ipsam est non ratione rerum, distinctio omnis, corporis expedita amet maiores
                  reprehenderit
                </p>
              </div>
            </div>
          </div>
        </div>
    </main>

    <footer>
      <div class="lien">
        <a href="" title="">Mentions légales</a>
        <a href="" title="">Plan du site</a>
      </div>
    </footer>

    <script src="./script/script.js"></script>
    <script src="./script/qui-suis-je.js"></script>
  </div>
</body>

</html>