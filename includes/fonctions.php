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

     		$q = $db->prepare("SELECT * FROM users WHERE id = ? ");
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
            if(!empty($_SESSION['id'] && !empty($_SESSION['pseudo']))){
                return true;
            }
            return false;
        }
        
    }    

    if(!function_exists('isUser')){
        function isUser(){
            global $db;
            $q = $db->prepare("SELECT quartier FROM users WHERE id = ?");
            $q->execute(array($_SESSION['id']));

            $user = $q->fetch();

            if($user['quartier'] == null){
                return false;
            }

            return true;
        }
        
    }   