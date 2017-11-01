<?php

    include('connectes.php');

	require 'config/database.php';

	require 'includes/fonctions.php';
	
	if (isset($_POST['devUtil'])) {
		if(not_empty(['nom', 'prenom', 'sexe', 'quartier'])){

		}else{
			echo "Veuillez remplir tous les champs";
		}
	}
	require 'views/devenirUser.view.php';
 ?>