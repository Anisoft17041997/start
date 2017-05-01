<?php 
	
	session_start();
	include 'includes/fonctions.php';

	if(check_session()){
		$_SESSION = array();

		session_destroy();

		header("Location: index.php");
	}

 ?>