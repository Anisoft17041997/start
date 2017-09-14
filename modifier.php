<?php 

session_start();
require 'config/database.php';
require 'includes/fonctions.php';

	//Recuperation des donnees
if (!empty($_GET['id'])) {
	$id = (int)$_GET['id'];
	$rec = $db->prepare('SELECT * FROM utilisateur WHERE id = ?');
	$rec->execute(array($id));
	$data = $rec->fetch();
	$U_num = $data['U_num'];
	$nom = $data['nom'];
	$prenom = $data['prenom'];
	$pseudo = $data['pseudo'];
	$email = $data['email'];
	$telephone = $data['telephone'];
	$sexe = $data['sexe'];
	$quartier = $data['quartier'];	
}

	//Modification les information des utilisateurs
if (isset($_POST['submit']) && isset($_GET['id'])) {
	
	if(!empty($_POST['U_num']) && !empty($_POST['pseudo'])  && !empty($_POST['telephone'])   && !empty($_GET['id'])){
		
		extract($_POST);

		$errors = array();

			//S'il n'y a aucune erreur 
		if(count($errors) == 0){
			$id = (int)$_GET['id'];
			$upQuery = $db->prepare("
				UPDATE utilisateur 
				set U_num = ?,
					nom = ?,
					prenom = ?,
					pseudo = ?,
					email = ?,
					telephone = ?,
					sexe = ?,
					quartier = ?
				WHERE ID = ?
				");

			$upQuery->execute(array($U_num, $nom, $prenom, $pseudo, $email, $telephone, $sexe, $quartier, $id));

			$sexe = $_POST['sexe'];
			$success = "Modification effectuee avec succes";
			$_SESSION['success'] = $success;
			
				//Redirection vers la page admin
			header('Location: admin.php');
		}else{
				// save_input_data();
		}	
	}else{
			// save_input_data();
		$errors [] = "Veuillez renseigner tous les champs";
	}
}
include 'views/modifier.view.php';
?>