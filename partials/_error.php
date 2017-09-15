<?php
	if(isset($_POST['submit'])){
		if(isset($errors) && count($errors) != 0){
		    echo "<div class='alert alert-danger'><span type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</span>";
		    foreach ($errors as $error) {
	    		echo $error.'<br />';
	    }
	    	echo '</div>';
		}	
	}
	