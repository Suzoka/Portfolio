<?php include './script/script.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Morgan ZARKA</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Rubik:wght@300;500&display=swap"
        rel="stylesheet">

<body>

    <div class="video">
        <video src="./img/Composition 1.mp4" class="logo" muted></video>
    </div>
    <div class="wrapper">
        <header>
            <a href="" title="" class="logo"><img src="./img/filigrane.svg" alt="Accueil"></a>
            <nav>
                <a href="" title="">Qui suis-je ?</a>
                <a href="" title="">Mes projets</a>
                <a href="" title="">Contact</a>
            </nav>
        </header>

        <main>
            <div class="banner">
                <h1 class="title">Morgan ZARKA<br>Développeur<br>fullstack</h1>
                <div class="dynamique">
                    <p>Je suis&nbsp;<span class="savoirEtre"></span></p>
                    <p>J'aime l<span class="savoirFaire"></span></p>
                </div>
            </div>
            <section class="content">
                <h2>Bienvenue sur mon portfolio !</h2>
                <p>Je m'appel Morgan, et suis étudiant en <span class="bold">BUT MMI</span>. Dans cette filière, j'ai choisis de suivre le parcours <span class="bold">"Développement Web et dispositifs intéractifs"</span>. Vous trouverez dans ce portfolio différents de mes projets, qu'ils soient personnels ou scolaire. <br><br> Avec ce portfolio, vous avez un moyen de plonger dans ce que je suis capable de faire ! <br><br>J'espère sincèrement que cette exploration à travers mon univers vous plaira.</p>
                <a href="" class="linkAlone">En savoir plus sur moi</a>
            </section>
            <h2 class="projet">Quelques-uns de mes projets :</h2>
            <div class="hide">
                <div class="flexbox">
                    <?php
                    $projets = getProjets();
                    foreach ($projets as $row) {
                        ?>
                        <a class="lienProjet" id="<?= $row["id_projet"] ?>" href="./projet.php?id=<?= $row["id_projet"] ?>">
                            <img src="./img/projet/<?= $row["id_projet"] ?>.png" alt="" width="150px" class="logo">
                            <div class="text">
                                <h3>
                                    <?= $row["nom_projet"] ?>
                                </h3>
                                <p>
                                    <?= $row["description_rapide"] ?>
                                </p>
                            </div>
                            <div class="theme">
                                <?php
                                $technos = getTechnos($row["id_projet"]);
                                foreach ($technos as $tech) { ?>
                                    <p style="--color:#<?= $tech["couleur_techno"] ?>;">
                                        <?= $tech["nom_techno"] ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <img src="./img/fleche.svg" alt="" width="75" class="sliderDroite">
                <img src="./img/fleche.svg" alt="" width="75" class="sliderGauche">
            </div>
        </main>

        <footer>
            <div class="lien">
                <a href="" title="">Mentions légales</a>
                <a href="" title="">Plan du site</a>
            </div>
        </footer>

    </div>


    <script src="./script/script.js" defer></script>
</body>

</html>

<!--Pour un chargement de l'image au moment où elle apaprait : loading="lazy" -->