<?php


    require 'config/database.php';

        //Fonction permettant de vérifier si un champ est vide ou pas
    if(!function_exists('not_empty')){
      function not_empty($fields = []){
         if(count($fields) != 0){
            foreach ($fields as $field) {
               if(empty($_POST[$field]) || trim($_POST[$field]) == ""){
                  return false;
              }
          }
          return true;
      }
    }
    }

        //Fonction permettant de vérifier si une valeur est deja utilisé
    if(!function_exists('is_already_in_use')){
      function is_already_in_use($field, $value, $table){
         global $db;
         $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
         $q->execute([$value]);
         $count = $q->rowCount();
         $q->closeCursor();

         return $count;
     }
    }

        //Fonction permettant de mettre des messages flash(succes ou error)
    if(!function_exists('set_flash')){
     function set_flash($msg, $type = 'info'){
        $_SESSION['notification']['msg'] = $msg;
        $_SESSION['notification']['type'] = $type;
    } 		
    }

        //Fonction permettant de sécuriser des données
    if(!function_exists('secure')){
     function secure($fields = []){
        if(count($fields) != 0){
           foreach ($fields as $field) {
              if($field == 'pass'){
                 $_POST[$field] = sha1($_POST[$field]);
             }

             $_POST[$field] = htmlspecialchars(strip_tags(trim($_POST[$field])));
         }
     }
    }
    }

        //Fonction permettant de sauvegarder des données entrées dans les champs
    if(!function_exists('save_input_data')){
      function save_input_data(){		
         foreach ($_POST as $key => $value) {
            if(strpos($key, 'pass') === false){
               $_SESSION['input'][$key] = $value;	
           }

       }
    }       
    }

        //Fonction permettant de répérer des données saisies
    if(!function_exists('get_input')){
      function get_input($key){

         if(!empty($_SESSION['input'][$key])){

            return $_SESSION['input'][$key];
        }
        return null;
    }

    }

        //Fonction permettant de supprimer des données saisies
    if(!function_exists('clear_input_data')){
      function clear_input_data(){

         $_SESSION['input'] = [];     		
     }

    }

        //Fonction permettant de récupérer la clé dans une session
    if(!function_exists('get_session')){
      function get_session($key){

         if(!empty($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return null;
    }

    }

        //Fonction permettant de rétrouver un utlisateur par son id
    if(!function_exists('find_user_by_id')){
      function find_user_by_id($id){
         global $db;

         $q = $db->prepare("SELECT * FROM utilisateur WHERE id = ? ");
         $q->execute([$id]);

         $data = current($q->fetchAll(PDO::FETCH_OBJ));
         $q->closeCursor();

         return $data;
     }

    }

        //Fonction permettant de récupérer un avatar
    if(!function_exists('get_avatar_url')){
      function get_avatar_url($email){   		
         return "http://gravatar.com/avatar/".md5(strtolower(trim(email)));
     }

    }    

        //Fonction permettant de checker une session
    if(!function_exists('check_session')){
        function check_session(){
            if(!empty($_SESSION['id']) && !empty($_SESSION['pseudo'])){
                return true;
            }
            return false;
        }

    }    

    //Fonction permettant de vérifier si un abonné est un utilisateur
    if(!function_exists('isUser')){
        function isUser(){
            global $db;
            $q = $db->prepare("SELECT quartier FROM utilisateur WHERE id = ?");
            $q->execute(array($_SESSION['id']));

            $user = $q->fetch();

            if(mb_strlen($user['quartier']) == 0){
                return false;
            }

            return true;
        }        
    }   

    //Aide pour developpeur
    if(!function_exists('var_debug')){
        function var_debug(){
            echo '<pre>';
            var_dump($monVar);
            echo '</pre>'; 
        }        
    }

    //Fonction affichant les erreur
    if(!function_exists('print_debug')){
        function print_debug($monVar){
            echo '<pre>';
            print_r($monVar);
            echo '</pre>'; 
        }        
    }

    //function pour afficher les users
    if(!function_exists('afficher_users')){
        function afficher_users(){
            global $db;
            
            //sélection des utilisateurs
            $query = $db->prepare("SELECT * FROM utilisateur WHERE isUser=? ORDER BY U_num");
            $val = '1';
            $query->execute(array($val));
            //sélection des abonnes
            $abonne = $db->prepare("SELECT * FROM utilisateur WHERE isUser=? ORDER BY nom");
            $val = '0';
            $abonne->execute(array($val));
            
            //nombre d'utilisateurs
            $q = $db->prepare("SELECT count(*) nombre FROM utilisateur WHERE isUser=?");
            $val = '1';
            $q->execute(array($val));
            $nb = $q->fetch();
            
            //nombre d'abonnés
            $q_ab = $db->prepare("SELECT count(*) nombre_ab FROM utilisateur WHERE isUser=?");
            $val = '0';
            $q_ab->execute(array($val));
            $nb_ab = $q_ab->fetch();

            return array('query' =>  $query,'abonne' =>  $abonne , 'nb' => $nb, 'nb_ab' => $nb_ab);
        }
    }

        //fonction permettant de supprimer un utilisateur
    if(!function_exists('supprimer')){
        function supprimer($key)
        {
            global $db;
            $query = $db->prepare("DELETE FROM utilisateur WHERE id = ?");
            $query->execute(array($key));
            header('Location: admin.php');
        }
    }

    //incrémenter le nombre de kit
    if(!function_exists('inc_nb_kit')){
        function inc_nb_kit($key, $nb_kit_courant)
        {
            global $db;
            $query = $db->prepare("
                UPDATE utilisateur 
                set nb_kit = ?
                WHERE id = ?
                ");
            $temp = $nb_kit_courant+1;
            $query->execute(array($temp, $key));
            header('Location: admin.php');
        }
    }

    //decrémenter le nombre de kit
    /*if(!function_exists('dec_nb_kit')){
        function dec_nb_kit($key, $nb_kit_courant)
        {
            global $db;
            $query_dec = $db->prepare("
                UPDATE utilisateur 
                set nb_kit = ?
                WHERE id = ?
                ");
            $temp_dec = $nb_kit_courant-1;
            $query_dec->execute(array($temp_dec, $key));
            header('Location: admin.php');
        }
    }*/


    //fonction permettant d'obtenir le nombre de kits levés
    if(!function_exists('nb_kit_tot')){
        function nb_kit_tot()
        {
            global $db;
            $nb_kit = $db->prepare("SELECT SUM(nb_kit) kit_tot FROM utilisateur");
            $nb_kit->execute();
            $donnee = $nb_kit->fetch();

            return $donnee;
        }
    }
    