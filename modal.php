<!-- Modal creation de profil -->
<div class="container">
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-info btn-lg boutton btn-block" data-toggle="modal" data-target="#myModal2">Créer un profil</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal2" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
              	<h4 class="modal-title">
                <span type="button" class="close" data-dismiss="modal">&times;</span>
                Créer un profil</h4>
              </div>
              <div class="modal-body">
              	<?php include 'partials/_error.php'; ?>
              <form method="post" data-parsley-validate autocomplete="off">
                <div class="form-group">
                  <label for="pseudo">Pseudo</label>
                  <input name="pseudo" type="text" class="form-control" id="email" placeholder="Nom d'utilisateur" required="required" data-parsley-minlength="5">
                </div>
                <div class="form-group">
                  <label for="pwd">Mot de passe</label> 
                  <input name="pass" type="password" class="form-control" id="pwd" placeholder="Mot de passe" required="required" data-parsley-minlength="6">
                </div>
                <div class="form-group">
                  <label for="cpwd">Confirmation</label>
                  <input name="cpass" type="password" class="form-control" id="cpwd" placeholder="Confirmer votre mot de passe" required="required" >
                </div>
                  <div class="form-group">
                  <label for="email">Email</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="Email" data-parsley-type="email" data-parsley-trigger="change">
                </div>
                  <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input name="tel" type="tel" class="form-control" id="tel" placeholder="Téléphone" required="required" data-parsley-type="number">
                  </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
              </div>
            </div>

          </div>
        </div><!-- Modal -->
</div>