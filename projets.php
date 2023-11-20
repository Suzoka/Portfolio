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
                        <option value="1" <?php 
                            if ($_POST["etat"] == 1) { ?> selected="selected" <?php } ?>>Terminé</option>
                        <option value="2" <?php 
                            if ($_POST["etat"] == 2) { ?> selected="selected" <?php } ?>>En cours</option>
                    </select>
                </div>
                <div class="filtre">
                    <label for="contexte">Contexte : </label>
                    <select name="contexte" id="contexte">
                        <option value="0">Tous</option>
                        <?php $contextes = filtreContexte();
                        foreach ($contextes as $contexte) {
                            ?>
                            <option value="<?= str_replace("&nbsp;", "insec",$contexte["nom_contexte"]) ?>" <?php 
                            if ($_POST["contexte"] == str_replace("&nbsp;", "insec",$contexte["nom_contexte"])) { ?> selected="selected" <?php } ?>>
                                <?= ucfirst($contexte["nom_contexte"]) ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </form>

            <div class="timeline">
                <?php
                $projets = getProjets($_POST["techno"], $_POST["etat"], $_POST["contexte"]);
                foreach ($projets as $row) {
                    ?>
                    <div class="container"> <a class="lienProjet" id="<?= $row["id_projet"] ?>" href="./projet.php?id=
                    <?= $row["id_projet"] ?>">
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