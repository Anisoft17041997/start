

<?php
session_start();
 // on teste si le formulaire a été soumis
 if (isset ($_POST['go']) && $_POST['go']=='Poster') 
 {
   // on teste le contenu de la variable $auteur
    if ( !isset($_POST['message']) || !isset($_GET['numero_du_sujet'])) 
	{
    $erreur = 'Les variables nécessaires au script ne sont pas définies.';
    }
    else {
    if ( empty($_POST['message']) || empty($_GET['numero_du_sujet']))
		{
      $erreur = '';
    }
    // si tout est bon, on peut commencer l'insertion dans la base
    else {
      // on se connecte à notre base de données
      $base = mysql_connect ('localhost', 'root', '');
      mysql_select_db ('blog', $base) ;
 
      // on recupere la date de l'instant présent
      $date = date("Y-m-d H:i:s");
 
      // préparation de la requête d'insertion (table forum_reponses)
      $sql = 'INSERT INTO forum_reponses VALUES("", "'.$_SESSION['membre'].'", "'.mysql_escape_string($_POST['message']).'", "'.$date.'", "'.$_GET['numero_du_sujet'].'")';
 
      // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
 
      // préparation de la requête de modification de la date de la dernière réponse postée (dans la table forum_sujets)
      $sql = 'UPDATE forum_sujets SET date_de_poster="'.$date.'" WHERE ID="'.$_GET['numero_du_sujet'].'"';
 
      // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
 
      // on ferme la connexion à la base de données
      mysql_close();
 
      // on redirige vers la page de lecture du sujet en cours
      header('Location: lire_sujet.php?id_sujet_a_lire='.$_GET['numero_du_sujet']); 
 
      // on termine le script courant
      exit;
    }
    }
  }
  ?>
			<?php	if(check_session()):?>
                 <h2><em>Bonjour <?php echo $_SESSION['membre'];?> ,Bienvenue sur le forum</em></h1>
				 <a href="../deconnexion.php">Déconnexion</a>
				  <!-- on fait pointer le formulaire vers la page traitant les données -->
				  <form action="insert_reponse.php?numero_du_sujet=<?php echo $_GET['numero_du_sujet']; ?>" method="post">
					  <table>
					  <tr><td>
					   
					  </td><td>
					   
					  </td></tr><tr><td>
					  
					  </td><td>
					  <?php 
						 if(isset($_POST['go']) &&empty($_POST['message']))
						 {
							 echo	'<div style="text-align:left; color:red;">Veuillez entrer votre reponse.</div>';
						 }
					   ?>
					  <textarea name="message"	class="message"	placeholder="Repondre... " cols="52" rows="7"><?php if (isset($_POST['message'])) echo htmlentities(trim($_POST['message'])); ?></textarea>
					  </td></tr><tr><td><td align="right">
					  <input type="submit" name="go" value="Poster">
					  </td></tr></table>
				  </form>
				  <?php
				  if (isset($erreur)) echo '<br /><br />',$erreur;
				  
				  ?>
				  <?php else:?>
  
				  <p>Vous devez <a href="../identifier.php">vous connecter</a> pour repondre.</p>
				  
				  <?php endif;?>
	