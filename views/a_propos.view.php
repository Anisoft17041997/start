<?php include 'partials/_header.php';?>
<body>
  <!-- Wrapper -->
  <div id="wrapper">
    <!-- Header -->
    <?php include 'partials/_nav.php';?>
    <div class="container">
     <!-- Menu -->
     <nav id="menu">
      <h2 style="padding-bottom:25px;">Menu</h2>
      <ul>
        <li><a href="a_propos.php">A propos</a></li>
        <li><a href="new.php">News</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="#">Jouer</a></li>
        <li><a href="blog.php">Blog</a></li>
      </ul>
    </nav>

    <!-- Main -->
    <?php include 'views/login.view.php'; ?>
    
    <!--Texte concernat SCoPE-->
    <!-- <div class="container text-center"> -->
      <div class="row">
        <div class="col-xs-12  col-md-6" style="text-align: center;">
          <h3 style="color: #00ffff;">Que faisons nous</h3>
          En vue de sauver, d'assainir l'environnement et apprendre à la population de mieux gérer les déchets plastiques, SCoPE est une entreprise idéale dans le sujet qui propose des services d'un dispositif intelligent qu'elle a mise en place: assainir la ville.Créé et accéléré par la communauté WoeLab, prise en chage par son programme d'incubation, elle fait partie du groupe #SilliconVillage et bénéficie à ce titre de la proximité d'autres startups tech qui la complète idéalement.
        </div><br>
        <div class="col-xs-12 col-md-6 align-center">
          <br>
          <img class="img-responsive" src="img/1b.jpg" alt="">
        </div>
      </div><br><br>

      <div class="row">
        <div class="col-xs-12  col-md-6  align-center">
          <br>
          <img class="img-responsive" src="img/img2.jpg" alt="">
        </div>
        <div class="col-xs-12  col-md-6"  style="text-align: center;">
          <h3 style="color: #00ffff">Pourquoi le faisons-nous</h3>
          Fleurs du Sahel et destructeur de la flore, multiplication des poches d'insalubrité persistantes, imperméabilisation des sols et leur corollaire d'inondation, l'absence de politiques ambitieuses de tri sélectif fait de lomé une des villes au mondes les plus vulnérables à la pollution plastique.<br/>
          Les besoins et la dépendance à ce matériau ont tellement imprégné les mentalités qu'ils sont aujourd'hui parallèles au besoin de se nourir. Par conséquent, des tnnes de plastiques sont utilisés tous les jours dans les ménages, dans les services, les marchés, les écoles, etc.,mais les déchets qui en découlent sont très mal gérés et mettent en péril l'environnement.<br/>
          Cependant on distingue des entreprises qui s'intéressent au recyclage, mais leurs fournisseurs, c'est-à-dire la pollulation collectrice, se heurtent à un géant problème de santé qui ne dit pas son nom vu les conditions et les endroits où il vont collecter ces déchets(dépotoirs, poubelles, canivaux, etc). SCoPE veut connecter le problème à sa solution en proposant de collecter les déchets plastiques pour ces entreprises de façcon smart.
        </div>
      </div><br><br>
      
      <div class="row">
        <div class="col-xs-12  col-md-6" style="text-align: center;">
          <h3 style="color: #00ffff">Notre travail</h3>
          SCoPE(<em><strong>S</strong>orting & <strong>C</strong>ollecting <strong>P</strong>lastics in <strong>o</strong>ur <strong>E</strong>nvironment</em>) veut connecter de façon efficace et grâce à un dispositif web/mobil adapté, le problème des déchets plastiques aux solutions existantes, dans une d'absence totale de politique de tri-sélectf. Il existe en effet des structures intéressées à la ressources déchets plastiques et sa valorisation, pour lesquelles <strong>SCoPE veut se charger de collecter...</strong> Son appronche IT positionne la startup à la pointe de l'innovation écologique en contexte africain:système d'alerte(ecobip), suivi en temps réel de la collecte, information et sensibilisation des  populations, mise à disposition de la Data, sont les quelques fonctionnalité de la plate-forme #Mizamiké. SCoPE est l'interface idéale permettant aux ménages et instituts d'intégrer petit à petit de bonnes pratiques de gestion du cadre de vie en attendant un horizon où des poubelles smart, fruit du développement souhaité par la startup, seraient déployées dans le paysage urbain.
        </div>
        <div class="col-xs-12  col-md-6 align-center">
          <br>
          <img class="img-responsive" src="img/3b.jpg" alt="">
        </div>
      </div>
    </div><hr>
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
    
    var marker = L.marker([pos.lat, pos.lon]).addTo(map).bindPopup("<img src='img/avatar.png'>", {minWidth: 80}).openPopup();

    var info = "<a href='#' style='text-decoration:none;'><img style='width:100%' src='img/scope.png' /><br>&nbsp;&nbsp;<b style='margin-left:18px;'>Woelab<br><i>Banque plastique N°1</i></b></a>";  

    var infob = "<a href='#' style='text-decoration:none;'><img style='width:100%' src='img/scope.png' /><br>&nbsp;&nbsp;<b>Woelab prime<br><i>Banque plastique N°2</i></b></a>";    
    var marker1 = L.marker([6.163909, 1.208513]).addTo(map).bindPopup(info);
    var marker2 = L.marker([6.214580, 1.136198]).addTo(map).bindPopup(infob);

  } eLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {foo: 'bar'}).addTo(map);
</script>
<?php include 'partials/_footer.php'; ?>
</body>
