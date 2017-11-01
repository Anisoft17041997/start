<?php 
	
	session_start();

    include('connectes.php');
	include 'includes/fonctions.php';

	if(check_session()){
		$_SESSION = array();

		session_destroy();

		header("Location: index.php");
	}

 ?>