  <!DOCTYPE HTML>
    <html>
    	<head>
    		<title>MIZANMIKE - Profil</title>
    		<meta charset="utf-8" />        
        <link rel="icon" href="img/android-contact.png">
    		<meta name="viewport" content="width=device-width, initial-scale=1" />
    		
    		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="style.css">
            
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"  href="bootstrap/css/bootstrap-theme.min.css">
        <!-- Parsley validator -->
        <link rel="stylesheet" type="text/css" href="css/parsley.css">   
    	</head>
    	<body>
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
                              <div class="col-md-6 col-sm-6">
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
                      <?php if(!not_empty(['nom', 'prenom', 'sexe', 'quartier']) && isUser()): ?>
                      <div class="col-md-6 col-sm-6">
                        <div class="panel panel-primary">
                          <div class="panel-heading">Completer mon profil</div>
                          <div class="panel-body">
                            <button type="button" class="btn btn-info btn-lg boutton btn-block "  data-toggle="modal" data-target="#myModal">Devenir utilisateur</button>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                      <!-- Trigger the modal with a button -->
                      <?php include 'devenirUser.php';?>
                      <?php if(isset($_POST['devUtil'])): ?>                      
                          <div class="col-md-6">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Map interactive</div>
                              <div class="panel-body" id="mapid">
                                
                              </div>
                            </div>                          
                          </div>                      
                      <?php endif; ?>
                </div>       
            <!-- Footer -->        

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
                    alert('no soportado');
                }
            });

           
            var dibujarMmapa =  function(pos){
            var myMap = L.map('mapid').setView([pos.lat, pos.lon], 16);

                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB</a>',
                    subdomains: 'abcd',
                    maxZoom: 18,
                }).addTo(myMap);
                
                var marker = L.marker([pos.lat, pos.lon]).addTo(myMap);

            }

            var obtenerDireccion = function(pos){
                $.ajax({
                    method:'GET',
                    url:"https://www.geocode.farm/v3/json/reverse/?lat="+pos.lat+"&lon="+pos.lon,
                    success:function(data){
                        var dir = data.geocoding_results.RESULTS[0].formatted_address;
                        var msg = "<h1>"+dir+"</h1>";
                        $('#direccion').append(msg);
                    }
                });
            }
            L.control.locate().addTo(map);
        </script>
          <!-- Localisation -->
           <!-- <iframe width="100%" height="300px" frameBorder="0" src="https://framacarte.org/fr/map/carte-scope_9435?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe><p><a href="https://framacarte.org/fr/map/carte-scope_9435">Voir en plein écran</a></p> -->
        </body>

        </html>
