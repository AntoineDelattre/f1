<?php
require '../../class/class.database.php';
$db = Database::getInstance();

$sql = <<<EOD
    Select pilote.nom as nompilote, ecurie.nom as nomecurie, place, resultat.point, idgrandprix
	From resultat
        join grandprix on resultat.idgrandprix = grandprix.id
        join pilote on resultat.numeroPilote = pilote.numero
        join ecurie on pilote.idEcurie = ecurie.id
    Order by place;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();
$lesDonnees['lesresultats'] = $lesLignes;

$sql = <<<EOD
    SELECT id, nom 
    FROM grandprix
    ORDER BY id;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();
$lesDonnees['lesgrandprix'] = $lesLignes;

echo json_encode($lesDonnees);