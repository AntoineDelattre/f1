<?php
//Connexion à la base de données
require '../../class/class.database.php';
$db = Database::getInstance();

// Définir ma requête
$sql = <<<EOD
			Select place
			From resultat
EOD;
$curseur = $db->query($sql);
$lesLignes = $curseur->fetchAll(PDO::FETCH_ASSOC);
$curseur->closeCursor();
$lesDonnees['lesPoints'] = $lesLignes;

echo json_encode($lesDonnees);
