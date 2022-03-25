<?php
// connexion à la base de données
require '../../class/class.database.php';
$db = Database::getInstance();

// définir ma requête
$sql = <<<EOD
	Select numero, pilote.nom, prenom, ecurie.nom as nomEcurie, pilote.codePays, pilote.nbtitre, pilote.point, idEcurie
    from pilote
        JOIN ecurie on pilote.idEcurie = ecurie.id
    Order by ecurie.id;
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();

// Ajout d'une propriété photo et les drapeaux des pays dans $leslignes
$rep = '../photoP/';
$nb = count($lesLignes);
for ($i = 0; $i < $nb; $i++) {
    $logo = $lesLignes[$i]['numero'] . ".jpg";
    $lesLignes[$i]['photo'] = file_exists("$rep$logo") ? $logo : "defaut.jpg";
}
$rep = '../../pays/';
$nb = count($lesLignes);
for ($i = 0; $i < $nb; $i++) {
    $image = $lesLignes [$i]['codePays'] . ".png";
    $lesLignes [$i]['drap'] = file_exists("$rep$image") ? $image : "defaut.jpg";
}

// envoyer le résultat au format JSON
echo json_encode($lesLignes);