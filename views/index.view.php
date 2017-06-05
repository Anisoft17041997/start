<?php include 'partials/_header.php';?>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
				<?php include 'partials/_nav.php';?>
				<div class="container">
					<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="forum.php">Forum</a></li>
							<li><a href="new.php">News</a></li>
							<li><a href="#">Jouer</a></li>
						</ul>
					</nav>
				<!-- Main -->
					<div id="main">
						<div class="">
							<h4 class="align-center">Plus un seul déchet plastique dans la nature</h4>
							<span class="image main"><img src="img/2.png" alt="" /></span>                                 
                        </div>
					</div>
				</div>
				<?php include 'views/login.view.php'; ?>
				<div class="container">

				</div>
		    	<!-- Modal creation de profil -->
		         <div class="container">
		        	<div class="row col-sm-5">
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
											<div class="form-group col-sm-3 col-xs-4">
												<button type="submit" class="btn btn-primary" name="submit">Soumettre</button>
											</div>
											<div class="pull-right">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
											</div>
										</div>									
									</div>
								</form>
								<?php if(count($errors) > 0): ?>
									<script type="text/javascript">
										$('#submit').click();
									</script>
								<?php endif; ?>
							</div>
						</div><!-- Modal -->
		        	</div>
		        	<!-- <div class="row">
		        		<button  class="btn btn-primary align-center">Devenir utilisateur</button>
		        	</div> -->

		        </div>
		        <div class="container">
		        	<!-- class="col-md-8 col-md-offset-2 col-xs-12" -->
	        		<div>
		                <div class="panel panel-primary">
		                  <div class="panel-heading">Répartition de banques plastiques</div>
		                  <div class="panel-body">
		                    <div id="mapid"></div>
		                  </div>
		                </div>                          
		            </div>
		        </div>
		        <div class="container">
			        <iframe width="100%" height="200px" frameBorder="0" src="http://umap.openstreetmap.fr/fr/map/carte-des-banques-de-dechets-plastiques-de-lome_135838?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=false&allowEdit=false&moreControl=false&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=false&onLoadPanel=undefined&captionBar=false">
			        </iframe>                            
		        </div> 
				<!-- Footer -->
					<footer id="footer">
						<div class="container">							
							<div class="col-md-6">
								<section>
									<h4>Nous contacter</h4>
									<form method="post" action="" autocomplete="off">
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
							</div>
							<div class="col-md-6">
								<section>
									<h4>Nous suivre</h4>
									<ul class="icons">
										<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon style2 fa-phone"><span class="label">Phone</span></a></li>
										<li><a href="scope@lafircaindarchitecture.com" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
									</ul>
								</section>
							</div>
							<div class="row">
								<div class="col-md-2">
								    <div class="thumbnail">
								      <a href="#">
								        <img src="img/woelab.jpg" alt="Lights" style="width:70%; height:100px;">
								        <!-- <div class="caption">
								          <p>Woelab</p>
								        </div> -->
								      </a>
								    </div>
								</div>
								<div class="col-md-2">
								    <div class="thumbnail">
								      <a href="#">
								        <img src="img/WAZI_UP_logo.png" alt="Nature" style="width:100%; height:150%;">
								      </a>
								    </div>
								</div>
								<div class="col-md-2">
								    <div class="thumbnail">
								      <a href="#">
								        <img src="img/test.PNG" alt="Fjords" style="width:100%">
								      </a>
								    </div>
								</div>
								<div class="col-md-2">
								    <div class="thumbnail">
								      <a href="#">
								        <img src="img/archi.PNG" alt="Fjords" style="width:100%">
								      </a>
								    </div>
								</div>
								<div class="col-md-2">
								    <div class="thumbnail">
								      <a href="#">
								        <img src="img/ispace.PNG" alt="Fjords" style="width:100%">
								      </a>
								    </div>
								</div>
							</div>
							<!-- <ul class="copyright">
								<li>&copy; SCoPE. All rights reserved</li><li>Design: <a href="#">woelab</a></li>
							</ul> -->
						</div>
					</footer>
			</div>
        <script type="text/javascript">
        	va$(function(){
              if("geolocation" in navigator){
                  navigator.geolocation.getCurrentPosition(function(position){
                      console.log(position);
                      var pos = {};
                      pos.lat = position.coords.latitude;
                      pos.lon = position.coords.longitude;
                      console.log(pos);
                      dibujarMmapa(pos);
                      obtenerDireccion(pos);
                  });
              }else{
                  alert('Votre navigateur ne supporte pas la geolocation !!');
              }
          });

         
          var dibujarMmapa =  function(pos){
              var map = L.map('mapid').setView([pos.lat, pos.lon], 16);
                L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {foo: 'bar'}).addTo(map);
            
                  // L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                  //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB</a>',
                  //     subdomains: 'abcd',
                  //     maxZoom: 18,
                  // }).addTo(map);
                  
                var marker = L.marker([pos.lat, pos.lon]).addTo(map).bindPopup("<img src='img/avatar.png'>", {minWidth: 80}).openPopup();

                var info = "<a href='#' style='text-decoration:none;'><img style='width:100%' src='img/scope.png' /><br>&nbsp;&nbsp;<b style='margin-left:18px;'>Woelab<br><i>Banque plastique N°1</i></b></a>";  

                var infob = "<a href='#' style='text-decoration:none;'><img style='width:100%' src='img/scope.png' /><br>&nbsp;&nbsp;<b>Woelab prime<br><i>Banque plastique N°2</i></b></a>";    
                var marker1 = L.marker([6.163909, 1.208513]).addTo(map).bindPopup(info);
                var marker2 = L.marker([6.214580, 1.136198]).addTo(map).bindPopup(infob);

            // var marker1 = L.marker([6.06648, 1.23047]).addTo(map).bindPopup(info, {minWidth: 80}).openPopup();
            // var marker2 = L.marker([6.1129, 1.09863]).addTo(map).bindPopup(infob, {minWidth: 80}); 
          } eLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {foo: 'bar'}).addTo(map);
        </script>
        <?php include 'partials/_footer.php'; ?>
    </body>

    </html>
