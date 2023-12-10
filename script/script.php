<?php
include("database.php");

function getProjets($techno, $etat, $contexte)
{
    global $db;
    if ($techno != 0 || $etat != 0 || $contexte != 0) {
        $requete = "SELECT * FROM `projets` p ";
        if ($techno) {
            $requete .= "INNER JOIN `moyens` m ON p.id_projet = m.ext_id_projet ";
        }
        if ($contexte) {
            $requete .= "INNER JOIN `contexte` c ON p.id_projet = c.ext_id_projet ";
        }
        if ($techno) {
            $requete .= "WHERE m.ext_id_techno = :techno ";
        }
        if ($etat) {
            if ($techno||$contexte) {
                if ($etat == 1) {
                    $requete .= "AND date_fin IS NOT null ";
                } else {
                    $requete .= "AND date_fin IS null ";
                }
            } else {
                if ($etat == 1) {
                    $requete .= "where date_fin IS NOT null ";
                } else {
                    $requete .= "where date_fin IS null ";
                }
            }
        }
        if ($contexte) {
            if ($techno || $etat) {
                $requete .= "AND c.nom_contexte = :contexte ";
            } else {
                $requete .= "WHERE c.nom_contexte = :contexte ";
            }
        }
        $requete .= "ORDER BY CASE WHEN date_fin IS NULL THEN 0 ELSE 1 END, date_fin DESC, date_debut DESC;";
    } else {
        $requete = "SELECT * FROM `projets` ORDER BY CASE WHEN date_fin IS NULL THEN 0 ELSE 1 END, date_fin DESC, date_debut DESC;";
    }
    $stmt = $db->prepare($requete);
    if ($techno) {
        $stmt->bindValue(':techno', $techno, PDO::PARAM_INT);
    }
    if ($contexte) {
        $stmt->bindValue(':contexte', str_replace("insec", "&nbsp;", $contexte), PDO::PARAM_STR);
    }
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
    $stmt = $db->prepare("SELECT * FROM `projets` WHERE `note_perso`>3 ORDER BY RAND() LIMIT 6;");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTechnos($id)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM `technologies` t INNER JOIN `moyens` m ON t.id_techno = m.ext_id_techno WHERE m.ext_id_projet =:id;');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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

function filtreTechno()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM `technologies` order by nom_techno;');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function filtreContexte()
{
    global $db;
    $stmt = $db->prepare('SELECT DISTINCT nom_contexte from contexte;');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCompetences($id)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM `apprentissage` where ext_id_projet = :id;');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>