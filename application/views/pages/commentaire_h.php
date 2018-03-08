
<!------ Include the above in your HEAD tag ---------->
<?php foreach ($commentaire_h as $comm) : ?>
<div class="container">



    <div class="row">
        <div class="col-sm-12">
        </div><!-- /col-sm-12 -->
    </div><!-- /row -->
    <div class="row">
        <div class="col-sm-1">
            <div class="thumbnail">
                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
            </div><!-- /thumbnail -->
        </div><!-- /col-sm-1 -->

        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <strong> <?php echo $comm['nom']." ".$comm['prenom']; ?></strong> <span class="text-muted"><?php echo $comm['date_commentaire']; ?></span>
                </div>
                <div class="panel-body">
                    <?php echo $comm['contenu']; ?>

                </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
        </div><!-- /col-sm-5 -->
        <br>

        <?php  endforeach;?>
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
                            <form id="comm" method="post" action="<?php echo base_url()."offre_h/add_comm";?>">
                                <input id="id_user" type="hidden" name="id_user"> <!-- id user caché -->
                                <input id="id_offre" type="hidden" name="id_offre"> <!-- id offre caché -->
                                <textarea id="commentaire" name="commentaire" placeholder="Saisir un commentaire" ></textarea>
                                <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>Envoyer votre commentaire</button>
                            </form>
                        </div><!-- Status Upload  -->
                    </div><!-- Widget Area -->
                </div>

            </div>
        </div>

        <script type="text/javascript">

            $('#id_user').val('37008708@parisnanterre.fr'); /*à remplacer par la variable de saission*/
            $('#id_offre').val( <?php echo $offre_stage['id'];?>);

        </script>
