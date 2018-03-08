<div id="modal-entreprise-update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding" style="margin-bottom: 0px;">
                <button class="close" data-dismiss="modal" style="padding: 10px;">&times;</button>
            </div>

            <div class="modal-body" style="max-width: 500px; margin: auto;">
                <form method="post" action="../admin/update_entreprise" class="form-bloc">

                    <div class="form-group">
                        <label for="intitule_offre">Nom entreprise : </label>
                        <textarea id="nom_entreprise" name="nom_entreprise" class="form-control" required="required" placeholder="Nom entreprise"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mission">Ville : </label>
                        <textarea id="ville" name="ville" class="form-control" required="required"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mission">Secteur : </label>
                        <textarea id="secteur" name="secteur" class="form-control" required="required"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mission">adresse : </label>
                        <textarea id="adresse" name="adresse" class="form-control" required="required" ></textarea>
                    </div>

                    <div class="form-group" style="margin-top: 50px;">
                        <input style="width: 48%; min-width: 150px;" class="btn btn-success" type="submit" value="Mettre à Jour">
                        <input style="width: 48%; min-width: 150px;" class="btn btn-danger" type="reset" value="Vider les Champs">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $(".update-entreprise").click(function(event){
            event.preventDefault();
            $("#modal-entreprise-update").modal("show");

            var entreprise_tab = <?php echo json_encode($entreprise);?>;
            var nom_entreprise = $(this).attr('nom_entreprise');
            $('#nom_entreprise').val(nom_entreprise);
            for (var i=0; i<entreprise_tab.length; i++) {
                if(entreprise_tab[i]['nom_entreprise'] == nom_entreprise){
                    $('#nom_entreprise').val(entreprise_tab[i]['nom_entreprise']);
                    $('#ville').val(entreprise_tab[i]['ville']);
                    $('#secteur').val(entreprise_tab[i]['secteur']);
                    $('#adresse').val(entreprise_tab[i]['adresse']);
                    break;
                }
            }
        });

    });
</script>

<style type="text/css">
    .height { height: 30px; padding-top: 0px; padding-bottom: 0px;}
    a{ cursor: pointer; }
</style>