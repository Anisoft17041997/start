<?php
	
	session_start();

	if(isset($_POST['submit'])){
		extract($_POST);

		if(!empty($nom) && !empty($prenom)){

			try {
				$dbb = new PDO("mysql:host=127.0.0.1;dbname=bbbb",'root','');
			} catch (Exception $e) {
				die('Impossible de se connecter a la base de donnee !'.$e->getMessage());
			}

			$query = $dbb->prepare("SELECT id FROM users WHERE nom = :nom and prenom = :prenom");//Parametres nommees

			$query->execute([
				'nom' => $nom,
				'prenom' => $prenom
				]
			);

			$count = $query->rowCount();
			$query->closeCursor();

			if ($count == 1) {
				$_SESSION['prenom'] = $prenom;
				
				header('Location:membre.php');
			}else{
				echo "Nom ou prenom incorrect";
			}
		}
	}

	include 'Form.view.php';