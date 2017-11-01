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

<section>

<!-- listes des news -->
    <?php while ($data = $news->fetch()) { ?>
        <div class="col-md-offset-1 col-md-10">
            <blockquote ><?=$data['title']?></blockquote><hr>
            <div class="row">
                <div class="col-md-12"><img class="img-responsive img-thumbnail img-new img-float" src="img/news/<?=$data['new_pp']?>"><p class="text-justify"><?=$data['content']?></p></div>
            </div><br><br>
        </div>
<?php }?>

</section>

<?php include 'partials/_footer.php'; ?>
</body>

</html>
