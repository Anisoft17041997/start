<?php include 'partials/_header.php';?>

<body class="container">
  <!-- Header -->
  <?php include 'partials/_nav_2.php';?>
  <!-- Menu -->
  <nav id="menu">
      <h2 style="padding-bottom:25px;">Menu</h2>
      <ul>
          <li><a href="a_propos.php">A propos</a></li>
          <li><a href="news.php">News</a></li>
          <li><a href="#" data-toggle="modal" data-target="#notAv">Forum</a></li>
          <li><a href="blog.php">Blog</a></li>
      </ul>
  </nav>

  <!-- Modal de page invalide -->
  <?php include 'partials/_notAvailable.php'; ?>

  <!-- container -->
  <div class="container">
    <div class="row">
     <!-- Article main content -->
     <article class="col-xs-8 col-xs-offset-2 maincontent">
      <header class="page-header">
       <h2 class="page-title"> Info / <?=$pseudo?> </h2>
     </header>
     <!-- Modal -->
     <div class="jumbotron">
         <?php include'partials/_error.php' ?>
         <?php include'partials/_success.php' ?>
      <form method="post" action="">
        <?php if($isUser == 1){ ?>
            <div class="top-margin">
              <label for="U_num">Numéro Utilisateur <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="U_num" id="U_num" required="required" value="<?=$U_num?>">
            </div>
            <div class="top-margin">
              <label for="nom">Nom </label>
              <input type="text" class="form-control" name="nom" id="nom" value="<?=$nom?>">
            </div>
            <div class="top-margin">
              <label for="prenom">Prénom </label>
              <input type="text" class="form-control" name="prenom" id="prenom" value="<?=$prenom?>">
            </div>
        <?php } ?>
        <div class="top-margin">
          <label for="prenom">Pseudo <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="pseudo" id="pseudo" required="required" value="<?=$pseudo?>">
        </div>

        <div class="row top-margin">
          <div class="col-sm-6">
            <label for="fonction">Email </label>
            <input type="text" class="form-control" name="email" id="email" value="<?=$email?>">
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="prenom">Téléphone <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="telephone" id="telephone" required="required" value="<?=$telephone?>">
            </div>
          </div>
        </div>
        <?php if($isUser == 1) { ?>
            <div class="row top-margin">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="sexe">Sexe </label>
                  <select class="form-control" name="sexe" id="sexe">
                    <option value="Homme" selected="selected">Homme</option>
                    <option value="Femme">Femme</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <label for="fonction">Quartier </label>
                <input type="text" class="form-control" name="quartier" id="quartier" value="<?=$quartier?>">
              </div>
            </div>
        <?php } ?>
        <hr>
          <div class="form-group pull-right">
            <button type="submit" class="btn btn-scope" name="submit">Modifier&nbsp<icon class="glyphicon glyphicon-ok"></icon></button>
          </div>
      </form>
    </div>

  </article>
  <!-- /Article -->
</div>
</div>	<!-- /container -->

<?php include 'partials/_footer_2.php'; ?>
</body>

</html>