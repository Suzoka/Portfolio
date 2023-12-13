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
        <link rel="icon" href="./img/filigrane.svg" type="image/svg+xml">
        <link href="https://morganzarka.dev/projet.php" rel="canonical">
    </head>

    <body>
        <div class="wrapper">
            <header>
                <a href="./index.php" title="" class="logo"><img src="./img/filigrane.svg" alt="Accueil"></a>
                <nav>
                    <a href="./qui-suis-je.php" title="">Qui suis-je ?</a>
                    <a href="./projets.php" title="Voir tous mes projets">Mes projets</a>
                    <a href="./contacts.php" title="">Contact</a>
                </nav>
            </header>

            <main>
                <div class="ariane">
                    <div class="notDate">
                        <a href="javascript:history.back()" class="lienVersProjet lienRetour">Retour</a>
                        <p class="filAriane"><a href="./index.php">Accueil</a> > <a href="./projets.php">Projets</a> > <a
                                href="./projet.php?id=<?= $projet["id_projet"] ?>">
                                <?= $projet["nom_projet"] ?>
                            </a></p>
                    </div>
                    <p class="date">Du <span class="bold">
                            <?php echo (date('d/m/Y', strtotime($projet["date_debut"])));
                            if ($projet["date_fin"] == null) {
                                echo "</span> à aujourd'hui</span>";
                            } else {
                                echo "</span> au <span class=\"bold\">" . date('d/m/Y', strtotime($projet["date_fin"])) . "</span>";
                            }
                            ?>
                    </p>
                </div>
                <div class="projet">
                    <h1>
                        <?= $projet["nom_projet"] ?>
                    </h1>
                    <a href="<?= $projet["url"] ?>"><img src="./img/<?= $projet["url_image"] ?>"
                            alt="Lien vers le projet"></a>
                    <div class="theme">
                        <?php
                        $technos = getTechnos($projet["id_projet"]);
                        foreach ($technos as $tech) { ?>
                            <p style="--color:#<?= $tech["couleur_techno"] ?>;" role="link" class="<?= $tech["id_techno"] ?>">
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
                        if (sizeof($participants) > 1 || $participants[0]["id_membre"] != 1) {
                            ?>
                            <p class="membres">Groupe du projet :
                                <?php foreach ($participants as $key => $participant) {
                                    ?><a href="<?= $participant["url_linkedin"] ?>">
                                        <?= $participant["identite"] ?>
                                    </a>
                                    <?php if ($key != sizeof($participants) - 1) {
                                        echo ", ";
                                    }
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
                            <?php if ($projet["url"] != NULL || $projet["lien_github"] != NULL) { ?>
                                <div class="liens">
                                    <?php if ($projet["url"] != NULL) { ?>
                                        <a href="<?= $projet["url"] ?>" class="lienVersProjet" target="_blank">Lien vers le
                                            projet</a>
                                    <?php } ?>
                                    <?php if ($projet["lien_github"] != NULL) { ?>
                                        <a href="<?= $projet["lien_github"] ?>" class="lienVersProjet" target="_blank">Lien du
                                            GitHub</a>
                                    <?php }
                            } ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $competences = getCompetences($projet["id_projet"]);
                    if (sizeof($competences) > 0) { ?>
                        <div class="competences">
                            <h2>Ce que ce projet <br> <span class="decale">m'a appris</span></h2>
                            <ul>
                                <?php foreach ($competences as $competence) { ?>
                                    <li>
                                        <?php echo ($competence["skill"]); ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </main>

            <footer>
                <div class="lien">
                    <a href="./mentionslegals.php" title="">Mentions légales</a>
                    <a href="./plansite.php" title="">Plan du site</a>
                    <div class="reseaux"><a href="https://www.linkedin.com/in/morgan-zarka/" target="_blank"><img
                                src="./img/linkedin.png" alt="Profil LinkedIn"></a><a href="https://github.com/Suzoka"
                            target="_blank"><img src="./img/github.png" alt="Profil GitHub"></a></div>
                </div>
            </footer>
        </div>

        <script src="./script/script.js" defer></script>
        <script src="./script/projet.js" defer></script>
    </body>

    </html>
    <?php
} else {
    header("Location: ./projets.php");
} ?>