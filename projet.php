<?php
include './script/script.php';
if (isset($_GET["id"])) {
    $projet = getProjetsById($_GET["id"]);
    var_dump($projet);
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
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    </body>

    </html>
<?php } else {
    header("Location: ./projets.php");
} ?>