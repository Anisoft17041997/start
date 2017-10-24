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
        <li><a href="#">Forum</a></li>
        <li><a href="#">Jouer</a></li>
        <li><a href="blog.php">Blog</a></li>
    </ul>
</nav>

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
                <form method="post" action="" enctype="multipart/form-data">
                    <?php include'partials/_error.php' ?>
                    <?php include'partials/_success.php' ?>
                    <div class="top-margin">
                        <label for="mon_pp">Photo de profil</label>
                        <input type="file" class="form-control" name="mon_pp" id="mon_pp" value="<?=$mon_pp?>">
                    </div>
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
                    <hr>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-scope" name="submit">Modifier <span class="glyphicon glyphicon-ok"></span></button>
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