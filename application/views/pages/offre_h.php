<!-- Post Content -->
<article>
  <div class="container ">
<div class="row">
    <div class="col-md-1"></div>
	<div class="col-md-6">
		<div id="postlist">
			<div class="panel">
                <div class="panel-heading">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="pull-left">Mission :</h3>
                            </div>
                            <div class="col-sm-3">
                                <h4 class="pull-right">
                                <small><em><?php echo $offre_stage['date_debut']?></em></small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="panel-body">
                <?php echo $offre_stage['mission'] ?>
            </div>
            </div>
            <div class="col-md-6">
	    <div class="desc-title">
	        <h4>Maitre de stage :</h4>
          <p> <?php echo $offre_stage['nom']?>   <?php echo $offre_stage['prenom']?> </p>
	        <h5>Email :</h5>
	        <P><?php echo $offre_stage['email']?></p>
	    </div>
	   </div>


        <!--
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2 class="section-heading">Mission</h2>
                <p><?php echo $offre_stage['mission']; ?> </p>
                <p>Maitre de stage: <?php $offre_stage['nom']?>   <?php echo $offre_stage['prenom']?> </p>
                <P>Email : <?php echo $offre_stage['email']?> </p>

            </div>
        </div>
    </div>-->
</article>
<hr>
