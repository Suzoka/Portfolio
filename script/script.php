<?php
include("database.php");

function getProjets (){
global $db;
$stmt = $db->prepare("SELECT * FROM `projets`");
$stmt->execute();
return  $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getTechnos ($id){
global $db;
$stmt = $db->prepare('SELECT * FROM `technologies` t INNER JOIN `moyens` m ON t.id_techno = m.ext_id_techno WHERE m.ext_id_projet ='.$id.';');
$stmt->execute();
return  $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>