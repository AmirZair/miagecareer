<!--Filtre-->
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
            <div class="well">
                <h3 align="center">Search Filter</h3>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="location1" class="control-label">Location</label>
                        <select class="form-control" name="" id="location1">
                            <option value="">Any</option>
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type1" class="control-label">Type</label>
                        <select class="form-control" name="" id="type1">
                            <option value="">Any</option>
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pricefrom" class="control-label">Min Price</label>
                        <div class="input-group">
                            <div class="input-group-addon" id="basic-addon1">$</div>
                            <input type="text" class="form-control" id="pricefrom" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pricefrom" class="control-label">Min Price</label>
                        <div class="input-group">
                            <div class="input-group-addon" id="basic-addon1">$</div>
                            <input type="text" class="form-control" id="pricefrom" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pricefrom" class="control-label">Min Price</label>
                        <div class="input-group">
                            <div class="input-group-addon" id="basic-addon1">$</div>
                            <input type="text" class="form-control" id="pricefrom" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="priceto" class="control-label">Max Price</label>
                        <div class="input-group">
                            <div class="input-group-addon" id="basic-addon2">$</div>
                            <input type="text" class="form-control" id="priceto" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <p class="text-center"><a href="#" class="btn btn-danger glyphicon glyphicon-search" role="button"></a></p>
                </form>
            </div>
        </div>
        <!-- fin Filtre -->


        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach($offre_stage as $offre) : ?>
            <div class="post-preview">
                <a href="<?php echo '/about/'.$offre['id'];?>">
                    <h2 class="post-title">
                        <?php echo $offre['intitule']; ?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?php echo $offre['nom_entreprise']; ?>
                    </h3>
                </a>
                <p class="post-meta">Posté par
                    <?php echo $offre['nom'].' '.$offre['prenom']; ?>
                    on <?php echo $offre['date_creation']; ?></p>
            </div>
            <hr>
            <?php endforeach; ?>
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>

<hr>