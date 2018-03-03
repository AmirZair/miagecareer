<div id="modal-att-offre" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding" style="margin-bottom: 0px;">
                <button class="close" data-dismiss="modal" style="padding: 10px;">&times;</button>
            </div>

            <div class="modal-body" style="max-width: 500px; margin: auto;">
                <form method="post" action="../admin/attribue" class="form-bloc">
                    <input id="offre_id2" type="hidden" name="offre_id2">

                    <div class="form-group">
                        <label for="email_maitre">Email maitre de stage : </label>
                        <input id="email" name="email" class="form-control" required="required"></input>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom : </label>
                        <input id="Nom" name="nom" class="form-control" required="required"></input>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prenom : </label>
                        <input id="prenom" name="prenom" class="form-control" required="required"></input>
                    </div>

                    <div class="form-group" style="margin-top: 50px;">
                        <input style="width: 96%; min-width: 150px;" class="btn btn-success" type="submit" value="Ok">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".att-offre").click(function(event){
            event.preventDefault();
            $("#modal-att-offre").modal("show");

            var offre_tab = <?php echo json_encode($offres);?>;
            var id = $(this).attr('id');
            $('#offre_id2').val(id);
            for (var i=0; i<offre_tab.length; i++) {
                if(offre_tab[i]['id'] == id){
                    $('#offre_id2').val(offre_tab[i]['id']);
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