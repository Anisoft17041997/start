<?php

session_start();

$titre="Connexion";

include('identifier.php');

include('index.php');

//include("includes/menu.php");

echo '<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> Connexion';

?>