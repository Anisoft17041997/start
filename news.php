<?php

session_start();
    
include('connectes.php');
require 'register.php';
require 'login.php';

//détermination du nombre de news
$resultat_news = afficher_news();
$news = $resultat_news['news'];
$nb_news = $resultat_news['nb_news'];

include 'views/news.view.php';
