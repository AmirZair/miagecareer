
<!------ Include the above in your HEAD tag ---------->
<?php foreach ($commentaire as $comm) : ?>
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