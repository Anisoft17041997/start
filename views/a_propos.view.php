<?php include 'partials/_header.php';?>
<body class="container">
<!-- Wrapper -->
<div id="wrapper">
    <!-- Header -->
    <?php include 'partials/_nav.php';?>
    <div class="container">
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
        <?php include 'views/login.view.php'; ?>

        <!--Texte concernat SCoPE-->
        <!-- <div class="container text-center"> -->
        <section>
            <div class="row">
                <div class="col-xs-12 col-md-6 text-left">
                    <blockquote>
                        <h3 style="color: #00ffff;">Que faisons nous</h3>
                        En vue de sauver, d'assainir l'environnement et apprendre à la population de mieux gérer les déchets plastiques, SCoPE est une entreprise idéale dans le sujet qui propose des services d'un dispositif intelligent qu'elle a mise en place: assainir la ville.Créé et accéléré par la communauté WoeLab, prise en chage par son programme d'incubation, elle fait partie du groupe #SilliconVillage et bénéficie à ce titre de la proximité d'autres startups tech qui la complète idéalement.
                    </blockquote>
                </div>
                <div class="col-xs-12 col-md-6"><hr>
                    <img class="img-responsive" src="img/1b.jpg" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12  col-md-6"><hr>
                    <img class="img-responsive" src="img/img2.jpg" alt="">
                </div>
                <div class="col-xs-12  col-md-6 text-right">
                    <blockquote class="blockquote-reverse">
                        <h3 style="color: #00ffff">Pourquoi le faisons-nous</h3>
                        Fleurs du Sahel et destructeur de la flore, multiplication des poches d'insalubrité persistantes, imperméabilisation des sols et leur corollaire d'inondation, l'absence de politiques ambitieuses de tri sélectif fait de lomé une des villes au mondes les plus vulnérables à la pollution plastique.<br/>
                        Les besoins et la dépendance à ce matériau ont tellement imprégné les mentalités qu'ils sont aujourd'hui parallèles au besoin de se nourir. Par conséquent, des tnnes de plastiques sont utilisés tous les jours dans les ménages, dans les services, les marchés, les écoles, etc.,mais les déchets qui en découlent sont très mal gérés et mettent en péril l'environnement.<br/>
                        Cependant on distingue des entreprises qui s'intéressent au recyclage, mais leurs fournisseurs, c'est-à-dire la pollulation collectrice, se heurtent à un géant problème de santé qui ne dit pas son nom vu les conditions et les endroits où il vont collecter ces déchets(dépotoirs, poubelles, canivaux, etc). SCoPE veut connecter le problème à sa solution en proposant de collecter les déchets plastiques pour ces entreprises de façcon smart.
                    </blockquote>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12  col-md-6 text-left">
                    <blockquote>
                        <h3 style="color: #00ffff">Notre travail</h3>
                        SCoPE(<em><strong>S</strong>orting & <strong>C</strong>ollecting <strong>P</strong>lastics in <strong>o</strong>ur <strong>E</strong>nvironment</em>) veut connecter de façon efficace et grâce à un dispositif web/mobil adapté, le problème des déchets plastiques aux solutions existantes, dans une d'absence totale de politique de tri-sélectf. Il existe en effet des structures intéressées à la ressources déchets plastiques et sa valorisation, pour lesquelles <strong>SCoPE veut se charger de collecter...</strong> Son appronche IT positionne la startup à la pointe de l'innovation écologique en contexte africain:système d'alerte(ecobip), suivi en temps réel de la collecte, information et sensibilisation des  populations, mise à disposition de la Data, sont les quelques fonctionnalité de la plate-forme #Mizamiké. SCoPE est l'interface idéale permettant aux ménages et instituts d'intégrer petit à petit de bonnes pratiques de gestion du cadre de vie en attendant un horizon où des poubelles smart, fruit du développement souhaité par la startup, seraient déployées dans le paysage urbain.
                    </blockquote>
                </div>
                <div class="col-xs-12  col-md-6"><hr>
                    <img class="img-responsive" src="img/3b.jpg" alt="">
                </div>
            </div>
        </section>

        <!-- Presentation de l'equipe -->
        <section>
            <div class="row ">
                <!-- Carousel -->
                <div class="col-md-offset-3 col-md-6"><hr>
                    <h3  class="text-center" style="color: #00ffff;">Notre équipe</h3>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="img/img1.jpg" alt="Chania">
                                <div class="carousel-caption">
                                    <h3>SCoPE Team</h3>
                                    <p>Rendons notre evironnement propre</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/img3.jpg" alt="Chania">
                                <div class="carousel-caption">
                                    <h3> </h3>
                                    <p>Notre cible</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/img4.jpg" alt="Flower">
                                <div class="carousel-caption">
                                    <h3>Mizamiké</h3>
                                    <p>Tout est réutilisable</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/img5.jpg" alt="Flower">
                                <div class="carousel-caption">
                                    <h3>Tech</h3>
                                    <p>Travaillons ensemble</p>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </section>
    </div>
</div>

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

<?php include 'partials/_footer.php'; ?>
</body>

</html>
