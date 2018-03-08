<div id="modal-entreprise-add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding" style="margin-bottom: 0px;">
                <button class="close" data-dismiss="modal" style="padding: 10px;">&times;</button>
            </div>

            <div class="modal-body" style="max-width: 500px; margin: auto;">
                <form method="post" action="../admin/add_entreprise" class="form-bloc">

                    <div class="form-group">
                        <label for="intitule_offre">Nom entreprise : </label>
                        <textarea id="nom_entreprise" name="nom_entreprise" class="form-control" required="required" placeholder="Nom entreprise"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mission">Ville : </label>
                        <textarea id="Ville" name="Ville" class="form-control" required="required"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mission">Secteur : </label>
                        <textarea id="Secteur" name="Secteur" class="form-control" required="required"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mission">adresse : </label>
                        <textarea id="adresse" name="adresse" class="form-control" required="required" ></textarea>
                    </div>

                    <div class="form-group" style="margin-top: 50px;">
                        <input style="width: 48%; min-width: 150px;" class="btn btn-success" type="submit" value="Ajouter">
                        <input style="width: 48%; min-width: 150px;" class="btn btn-danger" type="reset" value="Vider les Champs">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#add_entreprise").click(function(event){
            event.preventDefault();
            $("#modal-entreprise-add").modal("show");
        });

    });
</script>

<style type="text/css">
    .height { height: 30px; padding-top: 0px; padding-bottom: 0px;}
    a{ cursor: pointer; }
</style>