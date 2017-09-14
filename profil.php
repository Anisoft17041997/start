  <?php 
    session_start();
    require 'filters/auth_filter.php';
    require 'config/database.php';
    require 'includes/fonctions.php';


    if(!empty($_GET['id']) && $_GET['id'] >0 ){
      $getid = intval($_GET['id']);
      $q = $db->prepare("SELECT * FROM utilisateur WHERE id = ?");
      $q->execute(array($getid));
      $userinfo = $q->fetch();

      $user = find_user_by_id($_GET['id']);
      

      if(!$user){
        header('Location:index.php');
      }
    }


    /*********************** COMPLETER LE PROFIL ******************************/
    if(isset($_POST['devUtil'])){

      if(not_empty(['nom', 'prenom', 'quartier', 'sexe'])){
        extract($_POST);
        secure(['nom', 'prenom', 'quartier']);        
        
        $req = $db->prepare('UPDATE utilisateur SET 
            nom = ?, 
            prenom = ?, 
            quartier = ?, 
            sexe = ?,
            isUser = ?
            WHERE id = ?'
        );

        $req->execute(array($nom, $prenom, $quartier, $sexe, 1, $_SESSION['id']));

     }else{
        $errors[] = "Veuillez renseigner tous les champs";
     }

    }

    include 'views/profil.view.php';
  ?>