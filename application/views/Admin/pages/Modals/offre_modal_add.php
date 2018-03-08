<div id="modal-offre-add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding" style="margin-bottom: 0px;">
                <button class="close" data-dismiss="modal" style="padding: 10px;">&times;</button>
            </div>

            <div class="modal-body" style="max-width: 500px; margin: auto;">
                <form method="post" action="../admin/add_offre_h" class="form-bloc">
                    <input id="email_utilisateur" type="hidden" name="email_utilisateur">

                    <div class="form-group">
                        <label for="intitule_offre">Intitule de l'offre : </label>
                        <textarea id="int_offre" name="intitule_offre" class="form-control" required="required" placeholder="Intitule de l'offre"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mission">Mission : </label>
                        <textarea id="mission_desc2" name="mission_description" class="form-control" required="required" placeholder="Mission"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="offre_duree">Durée en mois : </label>
                        <select id="offre_duree" name="offre_duree" required="required" class="form-control height">
                            <option disabled selected value></option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="niveau_etude">Niveau : </label>
                        <select id="niv_etu" name="niveau_etude" required="required" class="form-control height">
                            <option disabled selected value></option>
                            <option value="Bac +3">Bac +3</option>
                            <option value="Bac +4">Bac +4</option>
                            <option value="Bac +5">Bac +5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Date debut : </label>
                        <input id="date_debut2"  type="text" name="date_debut" class="form-control height" required="required" placeholder="Date début du stage">
                    </div>

                    <div class="form-group">
                        <label for="entreprise">Entreprise : </label>
                        <select id="entreprise" name="entreprise" class="form-control height" required="required">
                            <option disabled selected value></option>
                            <?php
                            if(!empty($offres)){
                                foreach ($entre as $e) {
                                    echo '<option value="'.$e['nom_entreprise'].'">'.$e['nom_entreprise'].'</option>';
                                }
                            }
                            ?>
                        </select>
                        <a href="gerer_entreprise">
                            <input  style="width: 48%; min-width: 150px;" type="button" class="btn"  value="Ajouter une nouvelle entreprise ?"/>
                        </a>
                    </div>

                    <div class="form-group" style="margin-top: 50px;">
                        <input style="width: 48%; min-width: 150px;" class="btn btn-success" type="submit" value="Ajouter offre">
                        <input style="width: 48%; min-width: 150px;" class="btn btn-danger" type="reset" value="Vider les Champs">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $("#add_offre").click(function(event){
            event.preventDefault();
            $("#modal-offre-add").modal("show");

            $('#date_debut2').datetimepicker({format: 'yyyy-mm-dd',autoclose: true, minView: 2});
            CKEDITOR.replace('mission_desc2');

            $('#email_utilisateur').val('00000000@parisnanterre.fr'); /*à remplacer par la variable de saission*/
        });

    });
</script>

<style type="text/css">
    .height { height: 30px; padding-top: 0px; padding-bottom: 0px;}
    a{ cursor: pointer; }
</style>