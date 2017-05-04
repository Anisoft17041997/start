<?php include 'partials/_header.php';?>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
				<?php include 'partials/_nav.php'; ?>
				<div class="container">
					<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="forum.php">Forum</a></li>
							<li><a href="new.php">News</a></li>
						</ul>
					</nav>
				<!-- Main -->
					<div id="main">
						<div class="">
							<h4 class="align-center" style="margin-bottom:30px;">Plus un seul dechet plastique dans la nature</h4>
							<span class="image main"><img src="img/2.png" alt="" /></span>                                 
                        </div>
					</div>
				</div>

		<?php include 'views/login.view.php'; ?>
		
    	<!-- Modal creation de profil -->
         <div class="container">
        	<div class="row col-sm-5">
        		 <!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-info btn-lg boutton btn-block"  data-toggle="modal" data-target="#myModal2">Créer un profil</button>

				<!-- Modal -->
				<div class="modal fade" id="myModal2" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<form method="post" data-parsley-validate autocomplete="off">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">
								<span type="button" class="close" data-dismiss="modal">&times;</span>
								Créer un profil</h4>
							</div>
							<div class="modal-body">
								<?php include 'partials/_error.php'; ?>
									<div class="form-group">
										<label for="pseudo">Pseudo <span class="text-danger">*</span></label>
										<input name="pseudo" type="text" class="form-control" id="email" placeholder="Nom d'utilisateur" required="required" data-parsley-minlength="5">
									</div>
									<div class="form-group">
										<label for="pwd">Mot de passe <span class="text-danger">*</span></label> 
										<input name="pass" type="password" class="form-control" id="pwd" placeholder="Mot de passe" required="required" data-parsley-minlength="6">
									</div>
									<div class="form-group">
										<label for="cpwd">Confirmation <span class="text-danger">*</span></label>
										<input name="cpass" type="password" class="form-control" id="cpwd" placeholder="Confirmer votre mot de passe" required="required" >
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input name="email" type="email" class="form-control" id="email" placeholder="Email" data-parsley-type="email" data-parsley-trigger="change">
									</div>
									<div class="form-group">
										<label for="tel">Téléphone <span class="text-danger">*</span></label>
										<input name="tel" type="tel" class="form-control" id="tel" placeholder="Téléphone" required="required" data-parsley-type="number">
									</div>
							</div>
							<div class="modal-footer">
								<div class="form-group col-sm-4 col-xs-4">
									<button type="submit" class="btn btn-primary" name="submit">Soumettre</button>
								</div>
								<div class="pull-right">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
								</div>
							</div>									
						</div>
						</form>
					</div>
				</div><!-- Modal -->
        	</div>
        </div>
        <!-- <div class="container">
                <iframe width="100%" height="800px" frameBorder="0" src="http://umap.openstreetmap.fr/fr/map/carte-des-banques-de-dechets-plastiques-de-lome_135838?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=false&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false">
                </iframe>                            
        </div> --> 
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
