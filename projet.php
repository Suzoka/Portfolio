<?php
include './script/script.php';
if (isset($_GET["id"])) {
    $projet = getProjetById($_GET["id"]);
    if (empty($projet)) {
        header("Location: ./projets.php");
    }
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $projet["nom_projet"] ?> | Morgan ZARKA
        </title>
        <link rel="stylesheet" href="style.css">
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

            <main class="projet">
                <h1>
                    <?= $projet["nom_projet"] ?>
                </h1>
                <img src="./img/<?= $projet["url_image"] ?>" alt="">
                <div class="theme">
                    <?php
                    $technos = getTechnos($projet["id_projet"]);
                    foreach ($technos as $tech) { ?>
                        <p style="--color:#<?= $tech["couleur_techno"] ?>;">
                            <?= $tech["nom_techno"] ?>
                        </p>
                    <?php } ?>
                </div>
                <p class="description">
                    <?= $projet["description_totale"] ?>
                </p>
                <div class="infoAll">
                    <?php
                    $participants = getParticipants($projet["id_projet"]);
                    if (sizeof($participants) > 1) {
                        ?>
                        <p class="membres">Groupe du projet :
                            <?php foreach ($participants as $participant) {
                                ?><a href="<?= $participant["url_linkedin"] ?>">
                                    <?= $participant["identite"] ?>
                                </a>,
                                <?php
                            } ?>
                        </p>
                        <?php
                    } else {
                        ?>
                        <p class="membres">Projet individuel</p>
                        <?php
                    }
                    ?>
                    <div class="infoSup">
                        <p>Projet
                            <?= $projet["nom_contexte"] ?>
                        </p>

                        <?php if ($projet["note_finale"] != NULL) { ?>
                            <p>Note :
                                <?= $projet["note_finale"] ?>/20
                            </p>
                        <?php } ?>
                        <?php if ($projet["url"] != NULL) { ?>
                            <a href="<?= $projet["url"] ?>">Lien vers le projet</a>
                        <?php } ?>
                    </div>
                </div>
            </main>

            <footer>
                <div class="lien">
                    <a href="" title="">Mentions légales</a>
                    <a href="" title="">Plan du site</a>
                </div>
            </footer>
        </div>
    </body>

    </html>
<?php } else {
    header("Location: ./projets.php");
} ?>