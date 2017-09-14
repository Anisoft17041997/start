<?php include 'partials/_header.php';?>

<body>
  <!-- Header -->
  <?php include 'partials/_nav_2.php';?>
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
                  <div class="col-md-6">
                    <div class="well dash-box">
                      <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $nb['nombre']; ?></h2>
                      <h4> Utilisateus</h4>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="well dash-box">
                      <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <?php echo $nb_kit['kit_tot']; ?> </h2>
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
                      <td>
                        <a href="modifier.php?id=<?=$data['id']?>" ><span class="fa fa-cog text-success"></span></a>
                        <a href="admin.php?del=<?=$data['id']?>"><span class="fa fa-trash-o fa-lg text-danger"></span></a>
                      </td>
                    </tr>
                    <?php }?>
                  </table>
                </div>
              </div>

              <!-- liste des abonnés -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Liste des abonnés</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <tr>
                      <th>Pseudo</th>
                      <th>Email</th>
                      <th>Téléphone</th>
                      <th class="text-center">CRUD</th>
                    </tr>
                    <?php while ($data = $query->fetch()) { ?>
                    <tr>
                      <td><?=$data['pseudo'] ?></td>
                      <td><?=$data['email'] ?></td>
                      <td><?=$data['telephone'] ?></td>
                      <td>
                        <a href="modifier.php?id=<?=$data['id']?>" ><span class="fa fa-cog text-success"></span></a>
                        <a href="admin.php?del=<?=$data['id']?>"><span class="fa fa-trash-o fa-lg text-danger"></span></a>
                      </td>
                    </tr>
                    <?php }?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php include 'partials/_footer_2.php'; ?>
    </body>
