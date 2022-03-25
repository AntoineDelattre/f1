<?php
require '../../class/class.database.php';
$db = Database::getInstance();

$sql = <<<EOD
    Select grandprix.nom as nomGP, pilote.nom as nomPilote, ecurie.nom as nomEcurie, place, resultat.point, idGrandprix
	From resultat
        join grandprix on resultat.idGrandprix = grandprix.id
        join pilote on resultat.numeroPilote = pilote.numero
        join ecurie on pilote.idEcurie = ecurie.id
    Order by place;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();
$lesDonnees['lesResultats'] = $lesLignes;

$sql = <<<EOD
    SELECT id, nom 
    FROM grandprix
    ORDER BY id;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();
$lesDonnees['lesGrandprix'] = $lesLignes;

echo json_encode($lesDonnees);