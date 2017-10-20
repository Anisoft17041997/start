<?php
if(isset($_POST['submit']) || isset($_POST['submitUser'])){
    if(isset($errors) && count($errors) == 0){
        echo "<div class='alert alert-success'><span type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</span>";
            echo 'Opération réussie.';
        echo '</div>';
    }
}
