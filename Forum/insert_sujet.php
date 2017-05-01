
<?php

	session_start();
	require 'includes/fonctions.php';

	 // on teste si le formulaire a été soumis
	 if (isset ($_POST['go']) && $_POST['go']=='Poster') {
	   // on teste la déclaration de nos variables
	   if ( !isset($_POST['titre']) || !isset($_POST['message'])) {
	   $erreur = 'Les variables nécessaires au script ne sont pas définies.';
	   }
	   else {
	   // on teste si les variables ne sont pas vides
	    if ( empty($_POST['titre']) || empty($_POST['message'])) {
	      $erreur = '';
	    }
	 
	    // si tout est bon, on peut commencer l'insertion dans la base
	    else {
	      // on se connecte à notre base
	      $base = mysql_connect ('localhost', 'root', '');
	      mysql_select_db ('scope', $base) ;
	 
	      // on calcule la date actuelle
	      $date = date("Y-m-d H:i:s");
	   
	      // préparation de la requête d'insertion (pour la table forum_sujets)
	      $sql = 'INSERT INTO forum_sujets VALUES("", "'.$_SESSION['membre'].'", "'.mysql_escape_string($_POST['titre']).'","'.mysql_escape_string($_POST['message']).'",
		  "'.$date.'")';
	 
	      // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
	      mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
	 
	      // on recupère l'id qui vient de s'insérer dans la table forum_sujets
	      $id_sujet = mysql_insert_id();
	 
	      // lancement de la requête d'insertion (pour la table forum_reponses
	      $sql = 'INSERT INTO forum_reponses VALUES("", "'.mysql_escape_string($_POST['auteur']).'", "'.mysql_escape_string($_POST['message']).'", "'.$date.'", "'.$id_sujet.'")';
	 
	      // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
	      mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
	 
	      // on ferme la connexion à la base de données
	      mysql_close();
	 
	      // on redirige vers la page d'accueil
	      header('Location: index.php');
	 
	      // on termine le script courant
	      exit;
	    }
	    }
	  }
	  
	  ?>
    <?php	if(check_session()):?>
					<!-- on fait pointer le formulaire vers la page traitant les données -->
					<h2><em>Bonjour <?php echo $_SESSION['pseudo'];?> ,Bienvenue sur le forum</em></h1>
					<a href="../logout.php">Déconnexion</a>
				  <form action="insert_sujet.php" method="post">
					  <table>
					  <tr><td class="titre">
					  
					  </td><td>
					  
						
					  </td></tr><tr><td>
					  </td><td>
					  <?php 
									 if(isset($_POST['go']) &&empty($_POST['titre']))
									 {
										 echo	'<div style="text-align:left; color:red;">Veuillez entrer un titre.</div>';
									 }
						?>
					  <input type="text" class="titre"	name="titre" maxlength="50" size="50" placeholder="Titre..." value="<?php if (isset($_POST['titre'])) echo htmlentities(trim($_POST['titre'])); ?>">
					  </td></tr><tr><td>
						
					  
					  </td><td>
					  <?php 
									 if(isset($_POST['go']) &&empty($_POST['message']))
									 {
										 echo	'<div style="text-align:left; color:red;">Veuillez entrer votre message.</div>';
									 }
						?>
					  <textarea name="message"class="message" placeholder="Message..." cols="52" rows="10"><?php if (isset($_POST['message'])) echo htmlentities(trim($_POST['message'])); ?></textarea>
					  </td></tr><tr><td><td align="left">
					  <input type="submit" name="go" value="Poster">
					  </td></tr></table>
				  </form>
				  <?php 
					  // on affiche les erreurs éventuelles
					  if (isset($erreur)) echo '<br /><br />',$erreur;
				  ?>
				  <?php else:?>
  
				  <p>Vous devez <a href="../identifier.php">vous connecter</a> pour poster de questions.</p>
				  
				  <?php endif;?>
