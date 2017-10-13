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
	$pseudo = $data['pseudo'];
	$email = $data['email'];
	$telephone = $data['telephone'];
    $pp = $data['pp'];
}

	//Modification les information des utilisateurs
if (isset($_POST['submit']) && isset($_GET['id'])) {
    
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['mon_pp']) AND $_FILES['mon_pp']['error'] == 0){
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['mon_pp']['size'] <= 1000000){
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['mon_pp']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG');
            if (in_array($extension_upload, $extensions_autorisees)){
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['mon_pp']['tmp_name'], 'img/profils/' .
                basename($_FILES['mon_pp']['name']));
                $pp = basename($_FILES['mon_pp']['name']);
                
                //insertion du nom du fichier image
                $id = (int)$_GET['id'];
                $updatePP = $db->prepare("
                    UPDATE utilisateur
                    SET pp = ?
                    WHERE ID = ?
                ");
                $updatePP->execute(array($pp, $id));
            }else{
                echo 'Veuillez choisir un fichier image';
            }
        }else{
            echo 'Veuillez choisir un fichier de taille inferieure ou égale à 1Mo.';
        }
    }
	
	if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_GET['id'])){
		
		extract($_POST);

		$errors = array();
        
        if (mb_strlen($pseudo) < 3) {
            $errors [] = "Pseudo trop court (Minimum 3 caractères)";
        }

        if(is_already_in_use('pseudo',$pseudo,'utilisateur')){
            $errors[] = "Pseudo déja utilisé";
        }

        if(is_already_in_use('email',$email,'utilisateur') && $email != null){
            $errors[] = "Adresse email déja utilise";
        }

        //S'il n'y a aucune erreur 
		if(count($errors) == 0){
			$id = (int)$_GET['id'];
			$upQuery = $db->prepare("
				UPDATE utilisateur 
				SET pseudo = ?,
					email = ?,
					telephone = ?
				WHERE ID = ?
				");

			$upQuery->execute(array($pseudo, $email, $telephone, $id));

			$success = "Modification effectuee avec succes";
			$_SESSION['success'] = $success;
			
            //Redirection vers la page admin
			header('Location: profil.php, id'.$id);
		}else{
				// save_input_data();
		}	
	}else{
			// save_input_data();
		$errors [] = "Veuillez renseigner tous les champs";
	}
}
include 'views/editProfil.view.php';
?>