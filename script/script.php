<?php
include("database.php");

function getProjets()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `projets` ORDER BY CASE WHEN date_fin IS NULL THEN 0 ELSE 1 END, date_fin DESC, date_debut DESC;");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProjetById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `projets` p inner join `contexte` c on c.ext_id_projet = p.id_projet WHERE `id_projet` = :id;");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
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

function getParticipants($id)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM `membres` m INNER JOIN `groupes` g on m.id_membre = g.ext_id_membre WHERE g.ext_id_projet = :id;');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>