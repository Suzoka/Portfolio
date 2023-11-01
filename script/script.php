<?php
include("database.php");

function getProjets()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `projets`");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProjetsById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `projets` WHERE `id_projet` = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSlider()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `projets` WHERE `note_perso`>3 ORDER BY RAND() LIMIT 6");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTechnos($id)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM `technologies` t INNER JOIN `moyens` m ON t.id_techno = m.ext_id_techno WHERE m.ext_id_projet =' . $id . ';');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>