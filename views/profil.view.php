<!DOCTYPE HTML>
  <html>
  	<head>
  		<title>MIZANMIKE - Profil</title>
  		<meta charset="utf-8" />        
      <link rel="icon" href="img/android-contact.png">
  	  <meta name="viewport" content="width=device-width, initial-scale=1" />
  		
      <link rel="stylesheet" href="assets/css/main.css" />
  	  <link rel="stylesheet" href="css/main.css" />
      <link rel="stylesheet" href="style.css">
      
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>

      <!-- Bootstrap -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet"  href="bootstrap/css/bootstrap-theme.min.css">
      <!-- Parsley validator -->
      <link rel="stylesheet" type="text/css" href="css/parsley.css">  
      <style>
            #mapid{
                width: 100%;
                height: 300px;
            }
        </style> 
  	</head>
  	<body>

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
                  <li style="margin-right:10px;"><a href="logout.php" class="btn btn-lg"><span style="color:#67cd67;" class="glyphicon glyphicon-user"></span></a></li>
                  <li><a href="#menu">Menu</a></li>
              </ul>
          </nav>
				</div>
			</header>

		<!-- Menu -->
			<nav id="menu">
				<h2>Menu</h2>
				<ul>
					<li><a href="forum.php">Forum</a></li>
					<li><a href="#">News</a></li>
        </ul>
      </nav>
        
    <!-- Modal pour profil -->
     <div class="container">
        
         <!-- Panels -->
        <?php if(!not_empty(['nom', 'prenom', 'sexe', 'quartier']) && !isUser()): ?>
            <div class="row">
                <div class="col-md-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">Profil de <?= $user->pseudo ?></div>
                    <div class="panel-body">
                      <?php $gravatar_url = "http://gravatar.com/avatar/".md5(strtolower(trim($user->email))); ?>
                      <div class="row">
                        <div class="col-md-5">
                          <a href="" ><img src="img/avatar.png" title="Changer de photo de profil" alt="Image de profil de <?= $user->pseudo ?>" class="img-circle" style=""></a>
                        </div>
                       <!--  <div class="row col-md-6">
                          <strong><?= $user->pseudo ?><br></strong>
                          <a href="mailto:<?= $user->email ?>"><?= $user->email ?></a>
                        </div> -->
                        <div class="col-md-6">
                          <ul class="list-group">
                              <li class="list-group-item"><b>Pseudo: </b><?= $user->pseudo ?></li>
                              <li class="list-group-item"><b>Email: </b><a href="mailto:<?= $user->email ?>"><?= $user->email ?></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php  require 'includes/fonctions.php'; ?>
              <?php include 'devenirUser.php'; ?>
              <?php if(!not_empty(['nom', 'prenom', 'sexe', 'quartier']) && !isUser()): ?>
                <div class="col-md-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">Completer mon profil</div>
                    <div class="panel-body">
                      <button type="button" class="btn btn-info btn-lg boutton btn-block "  data-toggle="modal" data-target="#myModal">Devenir utilisateur</button>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div> 
        <?php else: ?>
        <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Profil de <?= $user->pseudo ?></div>
                  <div class="panel-body">
                    <?php $gravatar_url = "http://gravatar.com/avatar/".md5(strtolower(trim($user->email))); ?>
                    <div class="row">
                      <div class="col-md-5">
                        <a href="" ><img src="img/avatar.png" title="Changer de photo de profil" alt="Image de profil de <?= $user->pseudo ?>" class="img-circle" style=""></a>
                      </div>
                     <!--  <div class="row col-md-6">
                        <strong><?= $user->pseudo ?><br></strong>
                        <a href="mailto:<?= $user->email ?>"><?= $user->email ?></a>
                      </div> -->
                      <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Pseudo: </b><?= $user->pseudo ?></li>
                            <li class="list-group-item"><b>Email: </b><a href="mailto:<?= $user->email ?>"><?= $user->email ?></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>                     
              <div class="col-md-6 col-xs-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Map interactive</div>
                  <div class="panel-body">
                    <div id="mapid"></div>
                  </div>
                </div>                          
              </div> 
          </div>  
        <?php endif; ?>     
          <!-- Footer -->        
        <script>

          $(function(){
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


          }

             

        </script>
          <!-- jQuery -->
          <script src="vendor/jquery/jquery.js"></script>

          <!-- Bootstrap Core JavaScript -->
          <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

          <!-- Plugin JavaScript -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
          <!-- Theme JavaScript -->
          <script src="js/grayscale.min.js"></script>

          
      <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        <!-- Parsley js-->
        <script type="text/javascript" src="js/parsley.min.js"></script>
        <script type="text/javascript" src="js/fr.js"></script>
        
        
        <!-- Localisation -->
         <!-- <iframe width="100%" height="300px" frameBorder="0" src="https://framacarte.org/fr/map/carte-scope_9435?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe><p><a href="https://framacarte.org/fr/map/carte-scope_9435">Voir en plein écran</a></p> -->
    </body>
</html>
