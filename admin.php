<?php

session_start();

require "includes/fonctions.php";

//détermination du nombre d'utilisateur
$resultat = afficher_users();
$query = $resultat['query'];
$abonne = $resultat['abonne'];
$nb = $resultat['nb'];
$nb_ab = $resultat['nb_ab'];
$nb_kit = nb_kit_tot();

//détermination du nombre de news
$resultat_news = afficher_news();
$news = $resultat_news['news'];
$nb_news = $resultat_news['nb_news'];

//incrémenter le nombre de kits rempli
if(isset($_GET['inc']) && isset($_GET['nb_kit'])){
    inc_nb_kit((int)$_GET['inc'], (int)$_GET['nb_kit']);
}

//décrémenter le nombre de kits rempli
if(isset($_GET['dec']) && isset($_GET['nb_kit'])){
    dec_nb_kit((int)$_GET['dec'], (int)$_GET['nb_kit']);
}

/***  LES OPERATIONS CRUD  ***/
//Suppression d'un utilisateur ou d'un abonné
if (isset($_GET['del']) AND !empty($_GET['del'])) {
    supprimer((int)$_GET['del']);

}

//Suppression d'un news
if (isset($_GET['del_new']) AND !empty($_GET['del_new'])) {
    supprimer_new((int)$_GET['del_new']);

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
            $insert = $db->prepare("
					INSERT INTO utilisateur (pseudo,mdp,email,telephone) 
					VALUES (?, ?, ?, ?)");//Parametres nommees
            $insert->execute(array($pseudo, sha1($pass), $email, $tel));
            //Redirection de l'abonne sur sa page de profil
            header('Location: admin.php?id='.get_session('id'));
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

// Ajouter un utilisateur
//On verifie si le formulaire a ete soumis
if (isset($_POST['submitUser'])) {

    if (not_empty(['nom', 'prenom', 'sexe', 'pseudo', 'pass', 'cpass', 'tel', 'quartier'])) {

        extract($_POST);

        $errors = [];
        secure(['nom', 'prenom', 'sexe', 'pseudo', 'pass', 'email', 'tel', 'quartier']);

        if (mb_strlen($nom) < 3) {
            $errors [] = "Nom trop court (Minimum 3 caractères)";
        }

        if (mb_strlen($prenom) < 3) {
            $errors [] = "Prénom trop court (Minimum 3 caractères)";
        }

        if (mb_strlen($pseudo) < 3) {
            $errors [] = "Pseudo trop court (Minimum 3 caractères)";
        }

        if (mb_strlen($pass) < 6) {
            $errors [] = "Mot de passe trop court (Minimum 6 caractères)";
        }

        if ($pass != $cpass) {
            $errors [] = "Les deux mots de passe ne sont pas identiques";
        }

        if (is_already_in_use('pseudo', $pseudo, 'utilisateur')) {
            $errors[] = "Pseudo déja utilisé";
        }

        if (is_already_in_use('email', $email, 'utilisateur') && $email != null) {
            $errors[] = "Adresse email déja utilise";
        }

        if (count($errors) == 0) {
            $insert = $db->prepare("
					INSERT INTO utilisateur (nom,prenom,sexe,pseudo,mdp,email,telephone,quartier,isUser) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");//Parametres nommees
            $insert->execute(array($nom, $prenom, $sexe, $pseudo, sha1($pass), $email, $tel, $quartier, 1));
            //Redirection de l'admin sur sa page d'administration
            header('Location: admin.php?id=' . get_session('id'));
        } else {
            save_input_data();
            //ramener le modale
        }
    } else {
        save_input_data();
        $errors [] = "Veuillez renseigner tous les champs";
        //ramener le modale
    }
}

// Ajouter un new
//On verifie si le formulaire a ete soumis
if (isset($_POST['submitNew'])) {

    extract($_POST);

    $errors = [];

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

                if (not_empty(['title', 'content'])) {

                    secure(['title', 'content']);

                    if (mb_strlen($title) < 3) {
                        $errors [] = "Titre trop court (Minimum 3 caractères)";
                    }

                    if (mb_strlen($content) < 10) {
                        $errors [] = "Contenu invalide, trop court (Minimum 10 caractères)";
                    }

                    if (is_already_in_use('title', $title, 'news')) {
                        $errors[] = "Titre déja utilisé";
                    }

                    if (count($errors) == 0) {
                        $insert = $db->prepare("
                            INSERT INTO news (new_pp,title,content) 
                            VALUES (?, ?, ?)");//Parametres nommees
                        $insert->execute(array($new_pp, $title, $content));
                        //Redirection de l'admin sur sa page d'administration
                        header('Location: admin.php?id=' . get_session('id'));
                    } else {
                        save_input_data();
                        //ramener le modale
                    }
                } else {
                    save_input_data();
                    $errors [] = "Veuillez renseigner tous les champs";
                    //ramener le modale
                }

            }else{
                $errors [] = "Veuillez choisir un fichier image";
            }
        }else{
            $errors [] = "Veuillez choisir un fichier de taille inferieure ou égale à 1Mo.";
        }
    }



}
require 'views/admin.view.php';