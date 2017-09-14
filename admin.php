<?php

	session_start();

	require "includes/fonctions.php";

	//détermination du nombre d'utilisateur
	$resultat = afficher_users();
	$query = $resultat['query'];
	$nb = $resultat['nb'];
	$nb_kit = nb_kit_tot();

	//incrémenter le nombre de kits rempli
	if(isset($_GET['id']) && isset($_GET['nb_kit'])){
		inc_nb_kit((int)$_GET['id'], (int)$_GET['nb_kit']);
	}

	/*  LES OPERATIONS CRUD  */ 
	//Suppression 
		if (isset($_GET['del']) AND !empty($_GET['del'])) {
		supprimer((int)$_GET['del']);
               
	}


	require 'views/admin.view.php';