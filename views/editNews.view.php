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
            <div class="jumbotron">
                <form method="post" action="" enctype="multipart/form-data">
                    <?php include'partials/_error.php' ?>
                    <?php include'partials/_success.php' ?>
                    <div class="top-margin">
                        <label for="new_pp">Choisir une image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="new_pp" id="new_pp" value="<?=$new_pp?>">
                    </div>
                    <div class="form-group">
                        <label for="title">Titre du new <span class="text-danger">*</span></label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Titre du new" required="required" value="<?=$title?>">
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu du new <span class="text-danger">*</span></label>
                        <textarea name="content" type="textarea" class="form-control" id="content" placeholder="Veuillez saisir le contenu" required="required" data-parsley-minlength="5">
                            <?=$content?>
                        </textarea>
                    </div>
                    <hr>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-scope" name="submitEditNew">Modifier <span class="glyphicon glyphicon-ok"></span></button>
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