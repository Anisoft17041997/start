
<?php
	session_start();
	

?>
<html>
  <head>
	<title>Index de notre forum</title>
	<link rel="stylesheet" href="index.css"/>
	<meta charset="utf-8"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	   <script src="../bootstrap/js/jquery.min.js"></script>
	   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
	   <link rel="stylesheet" href="index.css"/ >
  </head>
  <body>
		<div class="container">
		  <div class="well">
		  
				  
		 
				  <!-- on place un lien permettant d'accéder à la page contenant le formulaire d'insertion d'un nouveau sujet -->
				  <a href="insert_sujet.php"><h2><em>Pauser une question</em><h2></a>
				 
				  <br /><br />
				 
				  <?php
					  // on se connecte à notre base de données
					  $base = mysql_connect ('localhost', 'root', '');
					  mysql_select_db ('blog', $base) ; 
					 
					  // préparation de la requete
					  $sql = 'SELECT ID, auteur, titre, date_de_poster FROM forum_sujets ORDER BY date_de_poster DESC';
					 
					  // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
					  $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
					 
					  // on compte le nombre de sujets du forum
					  $nb_sujets = mysql_num_rows ($req);
					 
					  if ($nb_sujets == 0) 
					  {
						echo '<strong><h2>Aucun sujet<h2></strong>';
					  }
					  else {
						?>
					  <table width="500"><tr >
						<td class="titre">
						
						Auteur
						
						</td><td class="titre">
						Titre du sujet
						</td><td class="titre">
						DATE
						</td></tr>
						<?php
						// on va scanner tous les tuples un par un
						while ($data = mysql_fetch_array($req)) 
						{
							
					 
								// on décompose la date
								sscanf($data['date_de_poster'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
							 
								// on affiche les résultats
								echo '<tr>';
								echo '<td>';
							 
								// on affiche le nom de l'auteur de sujet
								echo htmlentities(trim($data['auteur']));
								echo '</td><td>';
							 
								// on affiche le titre du sujet, et sur ce sujet, on insère le lien qui nous	permettra de lire les différentes réponses de ce sujet
								echo '<a href="lire_sujet.php?id_sujet_a_lire=' , $data['ID'] , '">' , htmlentities(trim($data['titre'])) , '</a>';
							 
								echo '</td><td>';
							 
								// on affiche la date de la dernière réponse de ce sujet
								echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;
						}
						?>
						</td></tr></table>
						<?php
					  }
					 
					  // on libère l'espace mémoire alloué pour cette requête
					  mysql_free_result ($req);
					  // on ferme la connexion à la base de données.
					  mysql_close ();
				  ?>
				  
				 </div>
		</div>
		
		
  </body>
  </html>