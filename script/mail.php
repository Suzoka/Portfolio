<?php
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['message'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    if(isset($_POST['objet'])) {
        $subject = $_POST['objet'];
    } else {
        $subject = "Aucun objet défini";
    }
    $txt = $_POST['message'];

    $message = "
        $prenom $nom vous a envoyé un message via le formulaire de contact de votre portfolio

        
        Voici son message :

        $txt
    ";
    $message2 = "
        Bonjour,


        Je vous confirme l'envoie de votre message. Je vous répondrais dans les plus brefs délais.

        Cordialement,

        Morgan Zarka


        Rappel de votre message :

        Objet : $subject
        Message : $txt
        ";
    $to = "contact@morganzarka.dev";
    $headers = "From: $mail\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers2 = "From: contact@morganzarka.dev\r\n";
    $headers2 .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($to, mb_convert_encoding($subject, 'UTF-8', 'auto'), mb_convert_encoding($message, 'UTF-8', 'auto'), $headers);
    mail($mail, mb_convert_encoding("Réponse automatique à votre message", 'UTF-8', 'auto'), mb_convert_encoding($message2, 'UTF-8', 'auto'), $headers2);
}
?>

<p>Votre email a bien été envoyé. Vous allez être redirigé d'ici quelques secondes.</p>
<p>Si vous n'êtes pas redirigé, <a href="../contacts.php">cliquez ici</a></p>

<script>
    setTimeout(function() {
        window.location.replace("../contacts.php");
    }, 2000);

    document.querySelector('a').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.replace("../contacts.php");
    });
</script>