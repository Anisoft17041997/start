
	<?php
		session_start();
		require 'includes/fonctions.php';
		require 'config/database.php';
	?>

<html>
  <head>
	<title>MIZANMIKE - Forum</title>
	<link rel="icon" href="img/favicon.gif">	
  </head>
  <body>
		<?php include 'partials/_header.php';?>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
			<header id="header">
				<div class="container">
				<!-- Logo -->
					<a href="index.php" class="logo">
						<img src="scope.png" alt="" />  <span class="title">SCoPE</span>
					</a>

						<!-- Nav -->
                <nav>
                    <ul>
                        <li style="margin-right:10px;"><a href="logout.php" class="btn btn-lg"><span class="glyphicon glyphicon-user"></span></a></li>
                        <li><a href="#menu">Menu</a></li>
                    </ul>
                </nav>
  				</div>
  					</header>
				<div class="container">
					<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="forum.php">Forum</a></li>
							<li><a href="#">News</a></li>
						</ul>
					</nav>
				</div>

				<div class="container">
					<div>
						<h5 class="align-center">Bienvenu sur le forum des abonnés de SCoPE</h5>
					</div>
		 			<div class="well">		 
				 		 <!-- on place un lien permettant d'accéder à la page contenant le formulaire d'insertion d'un nouveau sujet -->
				  <a href="insert_sujet.php"><em>Pauser une question</em></a>
				 
				  <br /><br />
				 
				  <?php
					  // on se connecte à notre base de données
					  $base = mysql_connect ('localhost', 'root', '');
					  mysql_select_db ('scope', $base) ; 
					 
					  // préparation de la requete
					  // $q = $db->prepare("SELECT ID, titre, datePost FROM forum_sujets ORDER BY datePost DESC");
					  $q = $db->prepare(
					  		"SELECT pseudo, email, telephone 
					  		FROM users 
							INNER JOIN forum_sujets
							ON forum_sujets.id_user = users.id"
						);

					  $q->execute();
					  $rep = $q->fetchAll(PDO::FETCH_OBJ);
					  // $rep = $q->fetchAll();
					  print_debug($rep);
					  // echo $rep[0]->pseudo.'<br>';
					  foreach ($rep as $r) {
					  	echo  $r->pseudo.' '.$r->email.'<br>';
					  }
					  
					   // $user = $q->fetch();
					   // $pseudo = $user['pseudo']; 
					  $sql = 'SELECT ID, titre, datePost FROM forum_sujets ORDER BY datePost DESC';

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
						
						</td>
                        <td class="titre">
						  Titre du sujet
						</td>
                        <td class="titre">
						DATE
						</td></tr>
						<?php
						// // on va scanner tous les tuples un par un
						// $data['pseudo'] = $pseudo['pseudo'];
						// var_dump($data);
						while ($data = mysql_fetch_array($req)) 
						{
							
					 			
								// on décompose la date
								sscanf($data['datePost'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
							 
								// on affiche les résultats
								echo '<tr>';
								echo '<td>';
							 
								// on affiche le nom de l'auteur de sujet
								//echo htmlentities(trim($data['pseudo']));
								echo '</td>'.$data['pseudo'].'<td>';
							 
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

				<div class="container">
					<div class="">
						<div class="row h-forum">
							<div class="col-md-8 col-xs-8">Sujets actifs</div>
							<div class="col-md-4 col-xs-4">Derniers sujets</div>
						</div>
						<div class="b-forum">
							<div class="row">
								<div class="col-md-8 col-xs-8"><a href="">Good topic</a> <br>by Gramziu » 01 Oct 2015, 17:38</div>
								<div class="col-md-4 col-xs-4">Last post <br> by KamziuUser avatar 07 Dec 2015, 21:06 </div>
							</div><hr>
							<div class="row">
								<div class="col-md-8 col-xs-8">Good topic <br>by Gramziu » 01 Oct 2015, 17:38</div>
								<div class="col-md-4 col-xs-4">Last post <br>by KamziuUser avatar 07 Dec 2015, 21:06 </div>
							</div><hr>
							<div class="row">
								<div class="col-md-8 col-xs-8">Good topic <br>by Gramziu » 01 Oct 2015, 17:38</div>
								<div class="col-md-4 col-xs-4">Last post <br>by KamziuUser avatar 07 Dec 2015, 21:06 </div>
							</div><hr>
							<div class="row">
								<div class="col-md-8 col-xs-8">Good topic <br>by Gramziu » 01 Oct 2015, 17:38</div>
								<div class="col-md-4 col-xs-4">Last post <br>by KamziuUser avatar 07 Dec 2015, 21:06 </div>
							</div>
						</div>
					</div>
				</div>
				<!-- Footer -->
					<footer id="footer">
						<div class="inner container">
							<section>
								<h4>Nous contacter</h4>
								<form method="post" action="">
									<div class="field half first">
										<input type="text" name="name" id="name" placeholder="Name" />
									</div>
									<div class="field half">
										<input type="email" name="email" id="email" placeholder="Email" />
									</div>
									<div class="field">
										<textarea name="message" id="message" placeholder="Message"></textarea>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Envoyer" class="special" /></li>
									</ul>
								</form>
							</section>
							<section>
								<h4>Nous suivre</h4>
								<ul class="icons">
									<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="scope@lafircaindarchitecture.com" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; SCoPE. All rights reserved</li><li>Design: <a href="#">woelab</a></li>
							</ul>
						</div>
					</footer>

			</div>        
      

        <?php include 'partials/_footer.php'; ?>
		
  </body>
  </html>