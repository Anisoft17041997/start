<?php
  require 'config/database.php';
  require 'includes/fonctions.php';
  // require 'index_2.php';


  //On verifie si le formulaire a ete soumis
  if (isset($_POST['connect'])) 
  {
    //On verifie si tous les champs sonts remplis : !empty($_POST['pseudo']) && !empty($_POST['pass'])
    if(not_empty(['pseudo', 'pass']))
    {
        $errors = [];
        extract($_POST);
        $req = $db->prepare('SELECT id FROM abonnes WHERE pseudo = :pseudo AND motdepasse = :pass');
        $pass_hache = sha1($pass);

        $req->execute(array(
          'pseudo' => $pseudo, 
          'pass' => $pass_hache));

        $a = $req->fetch();


        if($a)
        {
          echo "Vous etes connecter";
          session_start();
          $_SESSION['pseudo'] = $pseudo;
          
        }
        else
        {
          echo 'Mot de passe ou identifiant incorrect';
        }

    }
    else
    {

    }
  }
