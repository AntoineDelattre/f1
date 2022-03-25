<?php
//Connexion à la base de données
require '../../class/class.database.php';
$db = Database::getInstance();

// Définir ma requête
$sql = <<<EOD
			update ecurie
			    set point = (select sum(point) from resultat where id = id)
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();

// Envoyer le résultat au format Json
echo json_encode($lesLignes);