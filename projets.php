<?php include './script/script.php';
if (!isset($_POST["techno"])) {
    $_POST["techno"] = 0;
}
if (!isset($_POST["etat"])) {
    $_POST["etat"] = 0;
}
if (!isset($_POST["contexte"])) {
    $_POST["contexte"] = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets | Morgan ZARKA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./img/filigrane.svg" type="image/svg+xml">
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
            <h1 class="centre">Mes projets</h1>
            <div class="flex">
                <form class="filtres" action="" method="post">
                    <div class="filtre">
                        <label for="techno">Technologie : </label>
                        <select name="techno" id="techno">
                            <option value="0">Toutes</option>
                            <?php
                            $techno = filtreTechno();
                            foreach ($techno as $tech) {
                                ?>
                                <option value="<?= $tech["id_techno"] ?>" <?php
                                  if ($_POST["techno"] == $tech["id_techno"]) { ?> selected="selected" <?php } ?>>
                                    <?= $tech["nom_techno"] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="filtre">
                        <label for="etat">Etat : </label>
                        <select name="etat" id="etat">
                            <option value="0">Tous</option>
                            <option value="1" <?php if ($_POST["etat"] == 1) {
                                echo ("selected=\"selected\"");
                            } ?>>Terminé
                            </option>
                            <option value="2" <?php if ($_POST["etat"] == 2) {
                                echo ("selected=\"selected\"");
                            } ?>>En
                                cours</option>
                        </select>
                    </div>
                    <div class="filtre">
                        <label for="contexte">Contexte : </label>
                        <select name="contexte" id="contexte">
                            <option value="0">Tous</option>
                            <?php $contextes = filtreContexte();
                            foreach ($contextes as $contexte) {
                                ?>
                                <option value="<?= str_replace("&nbsp;", "insec", $contexte["nom_contexte"]) ?>" <?php
                                    if ($_POST["contexte"] == str_replace("&nbsp;", "insec", $contexte["nom_contexte"])) { ?>
                                        selected="selected" <?php } ?>>
                                    <?= ucfirst($contexte["nom_contexte"]) ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <?php if ($_POST["techno"] != 0 || $_POST["etat"] != 0 || $_POST["contexte"] != 0) { ?>
                        <a href="./projets.php"><img src="./img/reset.png" alt="réinitialiser les filtres" width="40"></a>
                    <?php } ?>
                </form>
                <div class="flexCenter">
                    <div class="timeline">
                        <?php
                        $projets = getProjets($_POST["techno"], $_POST["etat"], $_POST["contexte"]);
                        foreach ($projets as $row) {
                            ?>
                            <div class="container">
                                <a class="lienProjet" id="<?= $row["id_projet"] ?>"
                                    href="./projet.php?id=<?= $row["id_projet"] ?>">
                                    <img src="./img/<?= $row["url_logo"] ?>" alt="" width="130px" class="logo">
                                    <div class="text">
                                        <h2>
                                            <?= $row["nom_projet"] ?>
                                        </h2>
                                        <p>
                                            <?= $row["description_rapide"] ?>
                                        </p>
                                    </div>
                                    <div class="theme">
                                        <?php
                                        $technos = getTechnos($row["id_projet"]);
                                        foreach ($technos as $tech) { ?>
                                            <p style="--color:#<?= $tech["couleur_techno"] ?>;" tabindex="0" role="link"
                                                class="<?= $tech["id_techno"] ?>">
                                                <?= $tech["nom_techno"] ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <p class="lienVersProjet">En savoir plus</p>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="lien">
                <a href="" title="">Mentions légales</a>
                <a href="" title="">Plan du site</a>
                <div class="reseaux"><a href="https://www.linkedin.com/in/morgan-zarka/" target="_blank"><img
                            src="./img/linkedin.png" alt="Profil LinkedIn"></a><a href="https://github.com/Suzoka"
                        target="_blank"><img src="./img/github.png" alt="Profil GitHub"></a></div>
            </div>
        </footer>

    </div>


    <script src="./script/script.js" defer></script>
    <script src="./script/projets.js" defer></script>
</body>

</html>