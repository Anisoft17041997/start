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

<!-- Pour les pages non valides -->
<?php include 'partials/_notAvailable.php'; ?>

<!-- Main -->
<section>
    <div class="row">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Mon Tableau <small>de bord</small>
                            <span class="dropdown">
                                <button class="btn btn-scope pull-right dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span>&nbsp;Opérations
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a href="#" data-toggle="modal" data-target="#myModalUser">Ajouter un utilisateur</a></li>
                                    <li><a href="#usersList">Liste des utilisateus</a></li>
                                    <li><a href="#waitUsersList">Liste des utilisateus en attente</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#myModal">Ajouter un abonné</a></li>
                                    <li><a href="#abonnesList">Liste des abonnés</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#newsModal">Ajouter un news</a></li>
                                    <li><a href="#newsList">Liste des news</a></li>
                                    <li><a href="#commentsList">Liste des commentaires</a></li>
                                </ul>
                            </span>
                        </h1>
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
                                <h3 class="panel-title text-uppercase">Statistiques</h3>
                            </div>
                            <div class="panel-body">
                                
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="well dash-box">
                                        <h2><span class="fa fa-street-view text-success" aria-hidden="true"></span> <?php echo $nb_v ?> </h2>
                                        <h4><?php if($nb_v <= 1){echo 'Visiteur';}else{echo 'Visiteurs';} ?></h4>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="well dash-box">
                                        <h2><span class="fa fa-user text-success" aria-hidden="true"></span> <?php echo $nb['nombre']; ?></h2>
                                        <h4> Utilisateus</h4>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="well dash-box">
                                        <h2><span class="fa fa-user text-success" aria-hidden="true"></span> <?php if($nb_attentes['nombre'] == 0){echo 0;}else{echo $nb_attentes['nombre']; }?></h2>
                                        <h4> U-attentes</h4>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="well dash-box">
                                        <h2><span class="fa fa-user-o" aria-hidden="true"></span> <?php echo $nb_ab['nombre_ab']; ?></h2>
                                        <h4> Abonnés</h4>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="well dash-box">
                                        <h2><span class="fa fa-bar-chart-o text-success" aria-hidden="true"></span> <?php echo $nb_kit['kit_tot']; ?> </h2>
                                        <h4>Kits totals levés</h4>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="well dash-box">
                                        <h2><span class="fa fa-newspaper-o text-success" aria-hidden="true"></span> <?php echo $nb_news['nombre']; ?> </h2>
                                        <h4>News</h4>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="well dash-box">
                                        <h2><span class="fa fa-comments-o text-success" aria-hidden="true"></span> <?php echo $nb_comments['nombre']; ?> </h2>
                                        <h4>Commentaires</h4>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <!-- Les listes -->
                        <div class="panel-group panel-responsive">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 id="usersList" class="panel-title text-uppercase">Liste des utilsateurs <a href="#" data-toggle="modal" data-target="#myModalUser" class="btn btn-scope btn-xs pull-right">Nouvel utilisateur</a></h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-condensed table-hover table-responsive">
                                        <tr>
                                            <th></th>
                                            <th>U_num</th>
                                            <th>Nom et Prenom(s)</th>
                                            <th>Téléphone</th>
                                            <th>Sexe</th>
                                            <th>Quartier</th>
                                            <th>Nb kits</th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-center">CRUD</th>
                                        </tr>
                                        <?php while ($data = $query->fetch()) { ?>
                                            <tr>
                                                <td><img class="img-responsive img-circle img-profil" src="img/profils/<?=$data['pp']?>" alt="Profil" title=""></td>
                                                <td><?=$data['U_num'] ?></td>
                                                <td><?=$data['nom']?>&nbsp;<?=$data['prenom'] ?></td>
                                                <td><?=$data['telephone'] ?></td>
                                                <td><?=$data['sexe'] ?></td>
                                                <td><?=$data['quartier'] ?></td>
                                                <td class=""><?=$data['nb_kit'] ?></td>
                                                <td>
                                                    <a href="admin.php?inc=<?=$data['id']?>&nb_kit=<?=$data['nb_kit']?>" >
                                                        <span class="btn btn-scope btn-xs glyphicon glyphicon-plus"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="admin.php?dec=<?=$data['id']?>&nb_kit=<?=$data['nb_kit']?>" >
                                                        <span class="btn btn-warning btn-xs glyphicon glyphicon-minus"></span>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="modifier.php?id=<?=$data['id']?>" ><span class="fa fa-cog text-success"></span></a>
                                                    <a href="admin.php?del=<?=$data['id']?>"><span class="fa fa-trash-o fa-lg text-danger"></span></a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>

                            <!-- Liste des utilisateurs en attentes-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 id="waitUsersList" class="panel-title text-uppercase">Liste des utilisateurs en attente<a href="#" data-toggle="modal" data-target="#myModalUser" class="btn btn-scope btn-xs pull-right">Nouvel utilisateur</a></h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-condensed table-hover table-responsive">
                                        <tr>
                                            <th></th>
                                            <th>U_num</th>
                                            <th>Nom et Prenom(s)</th>
                                            <th>Téléphone</th>
                                            <th>Sexe</th>
                                            <th>Quartier</th>
                                            <th>Nb kits</th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-center">CRUD</th>
                                        </tr>
                                        <?php while ($data = $attentes->fetch()) { ?>
                                            <tr>
                                                <td><img class="img-responsive img-circle img-profil" src="img/profils/<?=$data['pp']?>" alt="Profil" title=""></td>
                                                <td><?=$data['U_num'] ?></td>
                                                <td><?=$data['nom']?>&nbsp;<?=$data['prenom'] ?></td>
                                                <td><?=$data['telephone'] ?></td>
                                                <td><?=$data['sexe'] ?></td>
                                                <td><?=$data['quartier'] ?></td>
                                                <td class=""><?=$data['nb_kit'] ?></td>
                                                <td>
                                                    <a href="admin.php?inc=<?=$data['id']?>&nb_kit=<?=$data['nb_kit']?>" >
                                                        <span class="btn btn-scope btn-xs glyphicon glyphicon-plus"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="admin.php?dec=<?=$data['id']?>&nb_kit=<?=$data['nb_kit']?>" >
                                                        <span class="btn btn-warning btn-xs glyphicon glyphicon-minus"></span>
                                                    </a>
                                                </td>
                                                <td class="text-center">
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
                                    <h3 id="abonnesList" class="panel-title text-uppercase" >Liste des abonnés <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-scope btn-xs pull-right">Nouvel abonné</a></h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-condensed table-hover table-responsive">
                                        <tr>
                                            <th></th>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th class="text-center">CRUD</th>
                                        </tr>
                                        <?php while ($data = $abonne->fetch()) { ?>
                                            <tr>
                                                <td><img class="img-responsive img-circle img-thumbnail img-profil" src="img/profils/<?=$data['pp']?>" alt="Profil" title=""></td>
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

                        </div>

                        <!-- liste des news -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 id="newsList" class="panel-title text-uppercase" >Liste des news <a href="#" data-toggle="modal" data-target="#newsModal" class="btn btn-scope btn-xs pull-right">Nouveau news</a></h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-condensed table-hover table-responsive">
                                    <tr>
                                        <th></th>
                                        <th>Titre</th>
                                        <th>Date</th>
                                        <th class="text-center">CRUD</th>
                                    </tr>
                                    <?php while ($data = $news->fetch()) { ?>
                                        <tr>
                                            <td><img class="img-responsive img-circle img-thumbnail img-profil" src="img/news/<?=$data['new_pp']?>" alt="imgae de news" title=""></td>
                                            <td><?=$data['title'] ?></td>
                                            <td><?=date('d/m/Y à H\hi',$data['timestamp']) ?></td>
                                            <td class="text-center">
                                                <a href="editNews.php?id=<?=$data['id']?>" ><span class="fa fa-cog text-success"></span></a>&nbsp;
                                                <a href="admin.php?del_new=<?=$data['id']?>"><span class="fa fa-trash-o fa-lg text-danger"></span></a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                        <!-- liste des commentaires -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 id="commentsList" class="panel-title text-uppercase" >Liste des commentaires </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-condensed table-hover table-responsive">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Commentaire</th>
                                    </tr>
                                    <?php while ($data = $comments->fetch()) { ?>
                                        <tr>
                                            <td><?=$data['nom'] ?></td>
                                            <td><?=$data['email'] ?></td>
                                            <td><?=$data['content'] ?></td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>

                    </div>

                    <!-- Modal ajout d'un abonné -->
                    <form method="post" data-parsley-validate autocomplete="off">
                        <?php include'partials/_error.php' ?>
                        <?php include'partials/_success.php' ?>
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
                                            <input name="tel" type="tel" class="form-control" id="tel" placeholder="Téléphone" required="required" maxlength="8" data-parsley-type="number">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-scope" name="submit">Enregistrer&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Modal ajout d'un utilisateur -->
                    <form method="post" data-parsley-validate autocomplete="off">
                        <?php include'partials/_error.php' ?>
                        <?php include'partials/_success.php' ?>
                        <div id="myModalUser" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><span type="button" class="close" data-dismiss="modal">&times;</span>Ajouter un utilisateur</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Nom <span class="text-danger">*</span></label>
                                            <input name="nom" type="text" class="form-control" id="name" placeholder="Votre nom" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname">Prénom <span class="text-danger">*</span></label>
                                            <input name="prenom" type="text" class="form-control" id="firstname" placeholder="Votre prénom" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="sexe">Sexe</label>
                                            <select class="form-control" name="sexe" id="sexe">
                                                <option value="Homme" selected="selected">Homme</option>
                                                <option value="Femme">Femme</option>
                                            </select>
                                        </div>
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
                                        <div class="form-group">
                                            <label for="adresse">Quartier <span class="text-danger">*</span></label>
                                            <input name="quartier" type="text" class="form-control" id="adresse" placeholder="Votre quartier" required="required">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-scope" name="submitUser">Enregistrer&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Modal d'ajout de news -->
                    <form method="post" action="" data-parsley-validate enctype="multipart/form-data" autocomplete="off">
                        <?php include'partials/_error.php' ?>
                        <?php include'partials/_success.php' ?>
                        <div id="newsModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><span type="button" class="close" data-dismiss="modal">&times;</span>Publier un news</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="top-margin">
                                            <label for="new_pp">Choisir une image <span class="text-danger">*</span></label>
                                            <input type="file" class="" name="new_pp" id="new_pp" value="<?=$new_pp?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Titre du new <span class="text-danger">*</span></label>
                                            <input name="title" type="text" class="form-control" id="title" placeholder="Titre du new" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Contenu du new <span class="text-danger">*</span></label>
                                            <textarea name="content" type="textarea" class="form-control" id="content" placeholder="Veuillez saisir le contenu" required="required" data-parsley-minlength="5">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-scope" name="submitNew">Publier&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
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
</div>
</section>
</body>
