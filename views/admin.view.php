<?php include 'partials/_header.php';?>

<body>
<!-- Header -->
<?php include 'partials/_nav_2.php';?>
<!-- Menu -->
<nav id="menu">
  <h2 style="padding-bottom:25px;">Menu</h2>
  <ul>
    <li><a href="a_propos.php">A propos</a></li>
    <li><a href="#">News</a></li>
    <li><a href="#">Forum</a></li>
    <li><a href="#">Jouer</a></li>
    <li><a href="blog.php">Blog</a></li>
  </ul>
</nav>

<!-- Main -->

<div class="container">
  <div class="row">
    <!-- Article main content -->
    <!-- <article class="col-xs-12 maincontent">
    -->
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Mon Tableau <small>de bord</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Statistiques</h3>
              </div>
              <div class="panel-body">
                <div class="col-xs-12 col-md-4">
                  <div class="well dash-box">
                    <h2><span class="fa fa-user text-success" aria-hidden="true"></span> <?php echo $nb['nombre']; ?></h2>
                    <h4> Utilisateus</h4>
                  </div>
                </div>

                <div class="col-xs-12 col-md-4">
                  <div class="well dash-box">
                    <h2><span class="fa fa-user-o text-succes" aria-hidden="true"></span> <?php echo $nb_ab['nombre_ab']; ?></h2>
                    <h4> Abonnés</h4>
                  </div>
                </div>

                <div class="col-xs-12 col-md-4">
                  <div class="well dash-box">
                    <h2><span class="fa fa-bar-chart-o text-succes" aria-hidden="true"></span> <?php echo $nb_kit['kit_tot']; ?> </h2>
                    <h4>Kits totals levés</h4>
                  </div>
                </div>
              </div>
            </div>

            <!-- Latest Users -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Liste des utilsateurs</h3>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-hover">
                  <tr>
                    <th>U_num</th>
                    <th>Nom</th>
                    <th>Prénoms</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Sexe</th>
                    <th>Quartier</th>
                    <th>Nombre de kits</th>
                    <th class="text-center">CRUD</th>
                  </tr>
                  <?php while ($data = $query->fetch()) { ?>
                    <tr>
                      <td><?=$data['U_num'] ?></td>
                      <td><?=$data['nom'] ?></td>
                      <td><?=$data['prenom'] ?></td>
                      <td><?=$data['email'] ?></td>
                      <td><?=$data['telephone'] ?></td>
                      <td><?=$data['sexe'] ?></td>
                      <td><?=$data['quartier'] ?></td>
                      <td class="text-center"><?=$data['nb_kit'] ?><a href="admin.php?id=<?=$data['id']?>&nb_kit=<?=$data['nb_kit']?>" ><span class="btn btn-primary glyphicon glyphicon-plus pull-right"></span></a></td>
                      <td class="text-center">
                        <a href="modifier.php?id=<?=$data['id']?>" ><span class="fa fa-cog text-success"></span></a>&nbsp;
                        <a href="admin.php?del=<?=$data['id']?>"><span class="fa fa-trash-o fa-lg text-danger"></span></a>
                      </td>
                    </tr>
                  <?php }?>
                </table>
              </div>
            </div>
            <?php include 'partials/_error.php'; ?>
            <!-- liste des abonnés -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Liste des abonnés <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs pull-right">Nouvel abonné</a></h3>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-hover">
                  <tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th class="text-center">CRUD</th>
                  </tr>
                  <?php while ($data = $abonne->fetch()) { ?>
                    <tr>
                      <td><?=$data['pseudo'] ?></td>
                      <td><?=$data['email'] ?></td>
                      <td><?=$data['telephone'] ?></td>
                      <td class="text-center">
                        <a href="modifier.php?id=<?=$data['id']?>" ><span class="fa fa-cog text-success"></span></a>&nbsp;
                        <a href="admin.php?del=<?=$data['id']?>"><span class="fa fa-trash-o fa-lg text-danger"></span></a>
                      </td>
                    </tr>
                  <?php }?>
                </table>
              </div>
            </div>

            <!-- Modal ajout d'un abonné -->
            <form method="post" data-parsley-validate autocomplete="off">
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"><span type="button" class="close" data-dismiss="modal">&times;</span>Ajouter un abonné</h4>
                    </div>
                    <div class="modal-body">
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
                      <div class="form-group col-sm-2 col-xs-2">
                        <button type="submit" class="btn btn-primary" name="submit">Enregistrer&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php include 'partials/_footer_2.php'; ?>
  </body>
