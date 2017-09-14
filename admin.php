<?php

	session_start();

	require "includes/fonctions.php";

	//détermination du nombre d'utilisateur
	$resultat = afficher_users();
	$query = $resultat['query'];
	$abonne = $resultat['abonne'];
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

	// Ajouter un abonné
	//On verifie si le formulaire a ete soumis
	if (isset($_POST['submit'])) {

		if(not_empty(['pseudo', 'pass', 'cpass', 'tel'])){

			extract($_POST);

			$errors = [];
			secure(['pseudo', 'email', 'pass']);

			if (mb_strlen($pseudo) < 3) {
				$errors [] = "Pseudo trop court (Minimum 3 caractères)";
			}

			if (mb_strlen($pass) < 6) {
				$errors [] = "Mot de passe trop court (Minimum 6 caractères)";
			}

			if ($pass != $cpass) {
				$errors [] = "Les deux mots de passe ne sont pas identiques";
			}

			if(is_already_in_use('pseudo',$pseudo,'utilisateur')){
				$errors[] = "Pseudo déja utilisé";
			}

			if(is_already_in_use('email',$email,'utilisateur') && $email != null){
				$errors[] = "Adresse email déja utilise";
			}
			
			if(count($errors) == 0){
				$insert = $db->prepare("INSERT INTO utilisateur (pseudo,mdp,email,telephone) VALUES (?, ?, ?, ?)");//Parametres nommees
				$insert->execute(array($pseudo, sha1($pass), $email, $tel));	
			}else{
				save_input_data();
				//ramener le modale
			}	
		}else{
			save_input_data();
			$errors [] = "Veuillez renseigner tous les champs";
			//ramener le modale
		}
	
	}
	require 'views/admin.view.php';