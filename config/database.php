<?php

	try{
   		$db = new PDO('mysql:host=localhost;dbname=scope','root','BU5517');
   		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   	}catch(PDOException $e){
   		die('Impossible de se connecter a la base de donnee !'.$e->getMessage());
   	}