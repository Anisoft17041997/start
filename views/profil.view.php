<!DOCTYPE HTML>
<html>
<head>
    <title>MIZANMIKE - Profil</title>
    <meta charset="utf-8" />
    <link rel="icon" href="img/android-contact.png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
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
<body class="container">

<!-- Header -->
<header id="header">
    <div class="container">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <img src="scope.png" alt="" />
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
    <h2 style="padding-bottom:25px;">Menu</h2>
    <ul>
        <li><a href="a_propos.php">A propos</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="#">Forum</a></li>
        <li><a href="#">Jouer</a></li>
        <li><a href="blog.php">Blog</a></li>
    </ul>
</nav>

<!-- Modal pour profil -->
<div>
    <!-- Panels -->
    <?php  require 'includes/fonctions.php'; ?>
    <?php if(!not_empty(['nom', 'prenom', 'sexe', 'quartier']) && !isUser()): ?>
        <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profil de <strong><?= $user->pseudo ?></strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="editProfil.php?id=<?=$_SESSION['id']?>" ><img class="img-responsive img-circle img-thumbnail img-pp" src="img/profils/<?= $user->pp ?>" title="Modifier profil" alt="Profil de <?= $user->pseudo ?>" class="img-circle img-responsive"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Pseudo : </b><?= $user->pseudo ?></li>
                                <li class="list-group-item"><b>Email : </b><a href="mailto:<?= $user->email ?>"><?= $user->email ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-3"><?php include 'devenirUser.php';?></div>
        <?php if(!not_empty(['nom', 'prenom', 'sexe', 'quartier']) && !isUser()): ?>
            <div class="col-md-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Completer mon profil</div>
                    <div class="panel-body">
                        <button type="button" class="btn btn-scope btn-lg boutton btn-block "  data-toggle="modal" data-target="#myModal">Devenir utilisateur</button>
                    </div>
                </div>
            </div>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Profil de <strong><?= $user->pseudo ?></strong></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="editProfil.php?id=<?=$_SESSION['id']?>" ><img class="img-responsive img-circle img-thumbnail img-pp" src="img/profils/<?=$user->pp?>" title="Modifier profil" alt="Profil de <?= $user->pseudo ?>" class="img-circle" style=""></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Pseudo : </b><?= $user->pseudo ?></li>
                                    <li class="list-group-item"><b>Email : </b><a href="mailto:<?= $user->email ?>"><?= $user->email ?></a></li>
                                    <li class="list-group-item"><b>Téléphone : </b><?= $user->telephone ?></li>
                                    <li class="list-group-item"><b>Quartier : </b><?= $user->quartier ?></li>
                                </ul>
                                <ul class="list-group">
                                    <li class="list-group-item">Nombre de kits remplits <span class="badge"><?= $user->nb_kit ?> </span></li>
                                    <li class="list-group-item">Type de déchets produit <span class="badge">Plastiques</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Géolocalisation</div>
                    <div class="panel-body">
                        <div id="mapid">
                            <iframe width="100%" height="300px" frameBorder="0" src="http://umap.openstreetmap.fr/fr/map/carte-des-banques-de-dechets-plastiques-de-lome_135838?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=false&allowEdit=false&moreControl=false&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=false&onLoadPanel=undefined&captionBar=false">
                            </iframe> <!-- <p><a href="https://framacarte.org/fr/map/carte-scope_9435">Voir en plein écran</a></p> -->
                        </div>
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


            var marker = L.marker([pos.lat, pos.lon]).addTo(map).bindPopup("<img src='img/avatar.png'>", {minWidth: 80}).openPopup();

            var info = "<a href='#' style='text-decoration:none;'><img style='width:100%' src='img/scope.png' /><br>&nbsp;&nbsp;<b style='margin-left:18px;'>Woelab<br><i>Banque plastique N°1</i></b></a>";

            var infob = "<a href='#' style='text-decoration:none;'><img style='width:100%' src='img/scope.png' /><br>&nbsp;&nbsp;<b>Woelab prime<br><i>Banque plastique N°2</i></b></a>";
            var marker1 = L.marker([6.163909, 1.208513]).addTo(map).bindPopup(info);
            var marker2 = L.marker([6.214580, 1.136198]).addTo(map).bindPopup(infob);

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
</div>
</body>
</html>
