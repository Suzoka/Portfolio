<!-- Edit this file with your database's informations and rename this file to "database.php" -->

<?php
$login = "root";
$password = "root";
$database = "portfolio";

$db = new PDO("mysql:host=localhost;dbname=$database;charset=utf8", $login, $password);
?>