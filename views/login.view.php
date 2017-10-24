<!-- Modal se connecter -->
<div class="container-fluid">
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Se connecter
            <span type="button" class="close" data-dismiss="modal">&times;</span></h4>
            <?php include 'partials/_error.php'; ?>
          </div>
          <form method="post" data-parsley-validate autocomplete="off">
            <div class="modal-body">
              <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input name="pseudo" type="text" class="form-control" id="email" placeholder="Nom d'utilisateur" required="required" data-parsley-minlength="5">
              </div>
              <div class="form-group">
                <label for="pwd">Mot de passe</label> 
                <input name="pass" type="password" class="form-control" id="pwd" placeholder="Mot de passe" required="required" data-parsley-minlength="6">
              </div>
            </div>
            <div class="modal-footer">
              <div class="form-group pull-right">
                <button type="submit" class="btn btn-scope" name="connect">Connecter&nbsp<icon class="glyphicon glyphicon-log-in"></icon></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>