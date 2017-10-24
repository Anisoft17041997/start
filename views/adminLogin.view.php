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

<!-- Main -->

<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3 class="thin text-center">Connecter vous ! </h3>

            <form method="post">
                <div class="top-margin">
                    <label>Nom d'utilisateur <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="pseudo">
                </div>
                <div class="top-margin">
                    <label>Mot de passe <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="mdp">
                </div><br>
                <div class="">
                    <button class="btn btn-scope" type="submit" name="connect">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>
