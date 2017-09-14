<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Completer votre profil
                    <span type="button" class="close" data-dismiss="modal">&times;</span></h4>
                </div>
                <div class="modal-body">
                    <form data-parsley-validate method="post" action="">
                        <div class="form-group">
                            <label for="name">Nom <span class="text-danger">*</span></label>
                            <input name="nom" type="text" class="form-control" id="name" placeholder="Votre nom" required="required">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Prénom <span class="text-danger">*</span></label>
                            <input name="prenom" type="text" class="form-control" id="firstname" placeholder="Votre prénom" required="required">
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select class="form-control" name="sexe" id="sexe">
                                <option value="Homme" selected="selected">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Quartier <span class="text-danger">*</span></label>
                            <input name="quartier" type="text" class="form-control" id="adresse" placeholder="Votre quartier" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="devUtil">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>