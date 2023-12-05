<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts | Morgan ZARKA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./img/filigrane.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Rubik:wght@300;500&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <header>
            <a href="./index.php" title="Accueil" class="logo"><img src="./img/filigrane.svg" alt="Accueil"></a>
            <nav>
                <a href="./qui-suis-je.php" title="">Qui suis-je ?</a>
                <a href="./projets.php" title="Voir tous mes projets">Mes projets</a>
                <a href="./contacts.php" title="">Contact</a>
            </nav>
        </header>
        <main>
            <h1 class="centre">Me contacter</h1>
            <!-- <h2>S'il vous venais à l'idée de vouloir complimenter ma moustache</h2> -->
            <div class="contacts">
                <img src="./img/devMod.jpg" alt="">
                <div class="listContacts">
                    <ul>
                        <li><a href="tel:+33674111362">+33 6 74 11 13 62</a></li>
                        <li><a href="mailto:morgan.zarka@edu.univ-eiffel.fr">morgan.zarka@edu.univ-eiffel.fr</a></li>
                        <div class="reseauxContact">
                            <li><a href="https://www.linkedin.com/in/morgan-zarka/" target="_blank"><img
                                        src="./img/linkedin.png" alt="Profil LinkedIn" width="40px"></a></li>
                            <li><a href="https://github.com/Suzoka" target="_blank"><img src="./img/github.png"
                                        alt="Profil GitHub" width="40px"></a></li>
                            <li><a href="./img/CVMorganZARKA.pdf" class="lienVersProjet lienCV" target="_blank">Mon
                                    CV</a></li>
                        </div>
                    </ul>
                </div>
            </div>
            <h2 class="centre">Formulaire de contact</h2>
            <form action="./script/mail.php" method="POST" class="contactParMail">
                    <div><label for="nom">Nom<span class="rouge">*</span> : </label><input type="text" name="nom" id="nom" required autocomplete="family-name"></div>
                    <div><label for="prenom">Prénom<span class="rouge">*</span> : </label><input type="text" name="prenom" id="prenom" required autocomplete="given-name"></div>
                    <div class="gridC2"><label for="mail">Email<span class="rouge">*</span> : </label><input type="email" name="mail" id="mail" required autocomplete="email"></div>
                    <div class="gridC2"><label for="objet">Objet : </label><input type="text" name="objet" id="objet"></input></div>
                    <div class="gridC2 gridL2"><label for="message">Message<span class="rouge">*</span> : </label><textarea name="message" id="message" cols="75" rows="12" required></textarea></div>
                    <div class="gridC2"><input type="submit" value="Envoyer"></div>
            </form>
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

        <div class="popupForm">
            <div class="resume">
                <h2>Résumé de votre message</h2>
                <p>Votre nom : <span class="nom bold"></span></p>
                <p>Votre prénom : <span class="prenom bold"></span></p>
                <p>Votre adresse Email : <span class="mail bold"></span></p>
                <p>Objet du message : <span class="obj bold"></span></p>
                <p>Votre message : <span class="msg bold"></span></p>
                <div class="flexbox"><button class="annuler"><img src="./img/fleche.svg" alt="Annuler" width="30px"></button><button class="valider lienVersProjet">Valider</button></div>
            </div>
        </div>
    </div>

    <script src="./script/contacts.js" defer></script>
</body>

</html>