<?php

require 'config/database.php';
require 'includes/fonctions.php';

//---------------------------------------------------------------------------------
//ETAPE 1 : On verifie si l'IP se trouve deja dans la table connectes
//Pour cela, il suffit de compter le nombre d'entrées dont le champs IP
//est l'adresse IP du visiteur.
$q = $db->prepare('SELECT COUNT(*) AS nbreEntrees FROM connectes WHERE ip=\' '. $_SERVER['REMOTE_ADDR'] .'\'');
$q->execute(array());
$donnees = $q->fetch();

//l'IP ne se trouvve pas dans la table et on va l'ajouter
if($donnees['nbreEntrees'] == 0) {
    $q = $db->prepare('INSERT INTO connectes VALUES(?, ?)');
    $q->execute(array($_SERVER['REMOTE_ADDR'], time()));
} else { //l'IP se trouve deja dans la table, on met juste a jour le timestamp
    $q = $db->prepare('UPDATE connectes SET timestamp = ? WHERE ip=?');
    $q->execute(array(time(), $_SERVER['REMOTE_ADDR']));
}

//---------------------------------------------------------------------------------
//ETAPE 2 : On supprime toutes les adresses dont le timestamp est plus vieux que 5 min
//On stocke dans une variable le timestamp qu'il était il y a 5 min
$timestamp_5min = time() - (60 * 5); //nombre de seconde ecoulé en 5min
$db->exec('DELETE FROM connectes WHERE timestamp < '. $timestamp_5min);

//---------------------------------------------------------------------------------
//ETAPE 3 : On compte le nombre d'IP stocké dans la table.C'est le nombre de visiteurs
$q = $db->prepare('SELECT COUNT(*) AS nbreEntrees FROM connectes');
$q->execute(array());
$donnees = $q->fetch();

//On affiche le nombre de connectées
$nb_v = $donnees['nbreEntrees'] ;

?>