<?php
    

	require 'config/database.php';
    
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

	if(!function_exists('set_flash')){
 		function set_flash($msg, $type = 'info'){
 			$_SESSION['notification']['msg'] = $msg;
 			$_SESSION['notification']['type'] = $type;
 		} 		
 	}

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
   
    if(!function_exists('save_input_data')){
		function save_input_data(){		
			foreach ($_POST as $key => $value) {
				if(strpos($key, 'pass') === false){
					$_SESSION['input'][$key] = $value;	
				}
				
			}
		}       
    }


     if(!function_exists('get_input')){
     	function get_input($key){

     		if(!empty($_SESSION['input'][$key])){
     			
     			return $_SESSION['input'][$key];
     		}
     		return null;
     	}
		
    }

    if(!function_exists('clear_input_data')){
     	function clear_input_data(){
     		
     		$_SESSION['input'] = [];     		
     	}
		
    }

    if(!function_exists('get_session')){
     	function get_session($key){

     		if(!empty($_SESSION[$key])){
     			return $_SESSION[$key];
     		}
     		return null;
     	}
		
    }

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

	if(!function_exists('get_avatar_url')){
     	function get_avatar_url($email){   		
     		return "http://gravatar.com/avatar/".md5(strtolower(trim(email)));
     	}
		
    }    

    if(!function_exists('check_session')){
        function check_session(){
            if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
                if(!empty($_SESSION['id'] && !empty($_SESSION['pseudo']))){
                    return true;
                }
            }
            return false;
        }
        
    }    

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
            $query = $db->prepare("SELECT * FROM utilisateur WHERE isUser=? ORDER BY nom");
            $val = '1';
            $query->execute(array($val));
            $abonne = $db->prepare("SELECT * FROM utilisateur WHERE isUser=? ORDER BY nom");
            $val = '0';
            $abonne->execute(array($val));
            $q = $db->prepare("SELECT count(*) nombre FROM utilisateur WHERE isUser=?");
            $val = '1';
            $q->execute(array($val));
            $nb = $q->fetch();

            return array('query' =>  $query,'abonne' =>  $abonne , 'nb' => $nb);
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

    //incrémenter lennombre de kit
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


    //fonction permettant d'obtenir le nmbre de kits levés
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

    //fonction permettant d'attribuer des U_ aux utilisateurs
    if(!function_exists('les_U_')){
        function les_U_()
        {
            global $db;
            $u_ = $db->prepare("SELECT SUM(nb_kit) kit_tot FROM utilisateur");
            $u_->execute();
            
            return $donnee;
        }
    }