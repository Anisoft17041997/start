<?php

	session_start();
 
    include('connectes.php');

	require 'config/database.php';
	require 'includes/fonctions.php'; 
	
	/********* CONNEXION  **********/
	//On verifie si le formulaire a ete soumis
	if(isset($_POST['connect'])){

		if(not_empty(['pseudo', 'mdp'])){

			extract($_POST);

			$errors = [];

			secure(['pseudo', 'mdp']);
			
			$q = $db->prepare("SELECT * FROM admin WHERE mdp = ? AND pseudo = ?");
			$q->execute(array($mdp, $pseudo));
			$res = $q->rowCount();
			

			if($res == 1){
				print_r($_SESSION);
				// echo "Redirection";
				$userinfo = $q->fetch();//On recupere le resultat
				//Et on le memorise en session
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				$_SESSION['pass'] = $userinfo['mdp'];

				//Redirection de l'abonne sur sa page de profil
				header('Location: admin.php?id='.$_SESSION['id']);
			}else{
				echo "Mauvais identifiant ou mot de passe";
				$errors[] = "Mauvais identifiant ou mot de passe";				
			}

		}else{
			save_input_data();
			$errors[] = "Tous les champs doivent être remplit ! ";
			
		}
	}



	require 'views/adminLogin.view.php';