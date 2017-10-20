<?php include 'partials/_header.php';?>
<body class="container">
<!-- Header -->
<?php include 'partials/_nav.php';?>
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

<!-- Modal de page invalide -->

<!-- Main -->
<div id="main">
    <!--carousel-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
            <li data-target="#myCarousel" data-slide-to="8"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img/2_2.png" alt="New York">
                <div class="carousel-caption">
                    <h3>SCoPE</h3>
                    <p>   </p>
                </div>
            </div>

            <div class="item">
                <img src="img/3_2.png" alt="Chicago">
                <div class="carousel-caption">
                    <h3>SCoPE</h3>
                    <p>   </p>
                </div>
            </div>

            <div class="item">
                <img src="img/4_2.png" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>SCoPE</h3>
                    <p>  </p>
                </div>
            </div>

            <div class="item">
                <img src="img/5_2.png" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>SCoPE</h3>
                    <p>   </p>
                </div>
            </div>

            <div class="item">
                <img src="img/6_2.png" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>SCoPE</h3>
                    <p>   </p>
                </div>
            </div>

            <div class="item">
                <img src="img/8_2.png" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>SCoPE</h3>
                    <p>   </p>
                </div>
            </div>

            <div class="item">
                <img src="img/9_2.png" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>SCoPE</h3>
                    <p>   </p>
                </div>
            </div>

            <div class="item">
                <img src="img/1_2.png" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>SCoPE</h3>
                    <p>   </p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>
<!-- </div> -->
<?php include 'views/login.view.php'; ?>
<!--Texte concernat SCoPE-->
<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <p style="text-align:justify;">
            En vue de sauver, d'assainir l'environnement et apprendre à la population de mieux gérer les déchets plastiques, SCoPE est une entreprise idéale dans le sujet qui propose des services d'un dispositif intelligent qu'elle a mise en place: assainir la ville.Créé et accéléré par la communauté WoeLab, prise en chage par son programme d'incubation, elle fait partie du groupe #SilliconVillage et bénéficie à ce titre de la proximité d'autres startups tech qui la complète idéalement.
        </p>
    </div>
</div><br/>

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
                                <input name="tel" type="tel" class="form-control" id="tel" placeholder="Téléphone" required="required" maxlength="8" data-parsley-type="number">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group col-sm-2 col-xs-2">
                                <button type="submit" class="btn btn-primary" name="submit">Inscrire&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <?php if(count($errors) > 0): ?>
 <script type="text/javascript">

  $('#submit').click();

</script>
<?php endif; ?>
 -->
            </div>
        </div><!-- Modal -->
    </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10">
            <button href="../logout.php" data-toggle="modal" data-target="#myModal2" type="submit" class="btn btn-lg btn-block btn-primary align-center" name="submit"> Devenir utilisateur</button>
        </div>
    </div>

</div><hr>

<!-- la map interactive -->
<iframe width="100%" height="300px" frameBorder="0" src="http://umap.openstreetmap.fr/fr/map/carte-des-banques-de-dechets-plastiques-de-lome_135838?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=false&allowEdit=false&moreControl=false&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=false&onLoadPanel=undefined&captionBar=false">
</iframe>
<!--</div>-->

<!-- Footer -->

<!-- </div> -->
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
            alert('Votre navigateur ne supporte pas la geolocation');
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

    } eLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {foo: 'bar'}).addTo(map);
</script>
<?php include 'partials/_footer.php'; ?>
</body>

</html>
