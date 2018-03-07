<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="<?php echo base_url(); ?>/lib/css/commentaire_saisie.css">
<div class="container">
    <div class="row">
       <!-- <h3>Status Upload Snipp</h3> -->
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                    <form id="comm" method="post" action="../offre/add_comm">
                        <input id="id_user" type="hidden" name="id_user">
                        <input id="id_offre" type="hidden" name="id_offre">
                        <textarea id="commentaire" name="commentaire" placeholder="Saisir un commentaire" ></textarea>
                        <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>Envoyer votre commentaire</button>
                    </form>
                </div><!-- Status Upload  -->
            </div><!-- Widget Area -->
        </div>

    </div>
</div>

<script type="text/javascript">



</script>