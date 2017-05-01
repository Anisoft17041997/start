<?php 
	
	if (!isset($_SESSION['id']) && !isset($_SESSION['pseudo'])) {
		header('Location: index.php');
		exit();
	}
 ?>