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
              
              <!-- <div class="btn-group form-group"><br>
                <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                  <input class="form-control" type="text" name="pseudo" placeholder="Pseudo" value="">
                </div>
                <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input class="form-control" type="password" name="pass" placeholder="Password" value="">
                </div>
              </div>
              <div class="form-group col-sm-6 col-xs-6">
                <button type="submit" class="btn btn-primary" name="connect">Se connecter</button>
              </div>
              <div class="pull-right">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
              </div> -->
          </div>
          <div class="modal-footer">
              <div class="form-group col-sm-6 col-xs-6" style="text-align: left;">
                <button type="submit" class="btn btn-primary" name="connect">Se connecter</button>
              </div>
              <div class="form-group col-sm-6 col-xs-6">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>