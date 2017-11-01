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
        <li><a href="#" data-toggle="modal" data-target="#notAv">Forum</a></li>
        <li><a href="blog.php">Blog</a></li>
    </ul>
</nav>

<!-- Modal de page invalide -->
<?php include 'partials/_notAvailable.php'; ?>

<section>
    <!-- listes des news -->
    <div class="col-md-12 news">
        <?php while ($data = $news->fetch()) { ?>
            <div  id="new" class="col-md-offset-1 col-md-10">
                <blockquote ><?=$data['title']?></blockquote><hr>
                <div class="row">
                    <div class="col-md-12"><img class="img-responsive img-thumbnail img-new img-float" src="img/news/<?=$data['new_pp']?>"><p class="text-justify"><?=$data['content']?></p></div>
                </div><br><br>
            </div>
        <?php }?>
    </div>

</section>

<!-- Modal creation de profil -->
<div class="container">
    <div class="row col-sm-5">
        <!-- Modal -->
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">
                <?php include 'partials/_error.php'; ?>
                <?php include 'partials/_success.php'; ?>
                <!-- Modal content-->
                <form method="post" data-parsley-validate autocomplete="off">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <span type="button" class="close" data-dismiss="modal">&times;</span>
                                Créer un profil</h4>
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
                            <button type="submit" class="btn btn-scope" name="submit">Inscrire &nbsp<icon class="glyphicon glyphicon-ok"></icon></button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- fin Modal -->
    </div>
</div>

<!-- Modal de connexion -->
<?php include 'views/login.view.php'; ?>

<?php include 'partials/_footer.php'; ?>
</body>

</html>
