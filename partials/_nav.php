
<header id="header" class="container">					
	<!-- Logo -->
	<a href="index.php" title="SCoPE/Accueil" class="logo">
		<img class="img-responsive" src="img/scope.png" alt="" />
	</a>
	<!-- Nav -->
	<nav>
        <ul>
            <?php
            if(check_session()){
                ?>
                <li style="margin-right:10px;"><a href="logout.php" title="Se déconnecter" class="btn btn-lg"><span style="color:#67cd67;" class="glyphicon glyphicon-user"></span></a></li>
                <a href="profil.php?id=<?=$_SESSION['id']?>" title="Voir profil"><li style="margin-right:10px; font-family: 'Century Gothic',Century, SansSerif; font-size: small;"><?=$_SESSION['pseudo']?></li></a>
                <?php
            }else{
                ?>
                <li style="margin-right:10px;">
                    <a href="#" title="S'inscrire" id="submit" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-edit"></span></a>
                </li>
                <li style="margin-right:10px;"><a href="../logout.php" title="Se connecter" id="isConnect" class="btn btn-lg" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-user"></span></a></li>
                <?php
            }
            ?>
            <li><a href="#menu" class="glyphicon glyphicon-list">Menu</a></li>
        </ul>
    </nav>
</header>