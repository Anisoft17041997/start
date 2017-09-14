<?php

	require 'config/database.php';
	

	

	if(isset($_POST['submit'])){
		if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['quartier'])){

			extract($_POST);
			
	        $req = $db->prepare(
	        	'INSERT INTO users(nom,prenom,quartier) 
	        	VALUES(nom = :pseudo AND mdp = :pass)'
	        	);
	        $pass_hache = sha1($pass);

	        $req->execute(array(
	          'pseudo' => $pseudo, 
	          'pass' => $pass_hache));

	        $a = $req->fetch();


	        if($a)
	        {
	          echo "Vous etes connecter";
	        }
	        else
	        {
	          echo 'Mot de passe ou identifiant incorrect';
	        }
			}
	}

	require 'profil.php';
	