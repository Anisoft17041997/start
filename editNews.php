<?php

session_start();

include('connectes.php');
require 'config/database.php';
require 'includes/fonctions.php';

//Recuperation des donnees
if (!empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    $rec = $db->prepare('SELECT * FROM news WHERE id = ?');
    $rec->execute(array($id));
    $data = $rec->fetch();
    $id = $data['id'];
    $title = $data['title'];
    $content = $data['content'];
    $new_pp = $data['new_pp'];
}

$errors = array();

//Modification les information des utilisateurs
if (isset($_POST['submitEditNew'])) {
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['new_pp']) AND $_FILES['new_pp']['error'] == 0){
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['new_pp']['size'] <= 25000000){
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['new_pp']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG');
            if (in_array($extension_upload, $extensions_autorisees)){
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['new_pp']['tmp_name'], 'img/news/' .
                    basename($_FILES['new_pp']['name']));
                $new_pp = basename($_FILES['new_pp']['name']);

                //insertion du nom du fichier image
                $updatePP = $db->prepare("
                    UPDATE news
                    SET new_pp = ?
                    WHERE ID = ?
                ");
                $updatePP->execute(array($new_pp, $id));
            }else{
                $errors [] = "Veuillez choisir un fichier image";
            }
        }else{
            $errors [] = "Veuillez choisir un fichier de taille inferieure ou égale à 25Mo.";
        }
    }

    if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_GET['id'])){

        extract($_POST);

        if (mb_strlen($title) < 3) {
            $errors [] = "Titre trop court (Minimum 3 caractères)";
        }

        //S'il n'y a aucune erreur
        if(count($errors) == 0){
            $upQuery = $db->prepare("
				UPDATE news 
				SET title = ?,
					content = ?
				WHERE ID = ?
				");

            $upQuery->execute(array($title, $content, $id));

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
include 'views/editNews.view.php';
?>