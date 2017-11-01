<?php 

	require 'config/database.php';

	require 'includes/fonctions.php';


	/*********** INSCRPTION  ***********/
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
				$query = $db->prepare("INSERT INTO utilisateur (pseudo,mdp,email,telephone) VALUES (?, ?, ?, ?)");//Parametres nommees
				$query->execute(array($pseudo, sha1($pass), $email, $tel));

				//message de succes
                set_flash("Enregistrement effectué avec succès !", 'success');

				header('Location: index.php');
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

	//insertion de commentaire
    if (isset($_POST['submit-comment'])) {

    if(not_empty(['nom', 'email', 'content'])){

        extract($_POST);

        $errors = [];
        secure(['nom', 'email']);

        if (mb_strlen($nom) < 3) {
            $errors [] = "Nom trop court (Minimum 3 caractères)";
        }

        if(count($errors) == 0){
            $query = $db->prepare("INSERT INTO commentaire (nom,email,content) VALUES (?, ?, ?)");//Parametres nommees
            $query->execute(array($nom, $email, $content));

            //message de succes
            set_flash("Commentaire envoyé avec succès !", 'success');

            header('Location: index.php');
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

 ?>