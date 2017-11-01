<?php

session_start();

require "includes/fonctions.php";

//détermination du nombre de news
$resultat_news = afficher_news();
$news = $resultat_news['news'];
$nb_news = $resultat_news['nb_news'];



include 'views/news.view.php';
