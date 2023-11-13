<?php include './script/script.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets | Morgan ZARKA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Rubik:wght@300;500&display=swap"
        rel="stylesheet">
    <link rel="icon" href="./img/filigrane.svg" type="image/svg+xml">
</head>

<body>

    <div class="wrapper">
        <header>
            <a href="./index.php" title="" class="logo"><img src="./img/filigrane.svg" alt="Accueil"></a>
            <nav>
                <a href="" title="">Qui suis-je ?</a>
                <a href="./projets.php" title="">Mes projets</a>
                <a href="" title="">Contact</a>
            </nav>
        </header>

        <main>
            <div class="timeline">
                <?php
                $projets = getProjets();
                foreach ($projets as $row) {
                    ?>
                    <div class="container">
                        <a class="lienProjet" id="<?= $row["id_projet"] ?>" href="./projet.php?id=<?= $row["id_projet"] ?>">
                            <img src="./img/<?= $row["url_logo"] ?>" alt="" width="130px" class="logo">
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
                    </div>
                <?php } ?>
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
    <script src="./script/projets.js" defer></script>
</body>

</html>