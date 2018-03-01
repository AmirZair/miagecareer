<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
            <div class="well">
                <h3 align="center">Search Filter</h3>
                <form class="form-horizontal" action="<?=site_url('pages/search');?>" method="get">
                    <div class="form-group">
                        <label for="location1" class="control-label">Entreprise</label>
                        <select class="form-control" name="entreprise" id="entreprise" >
                                <option value="">Any</option>
                            <?php foreach ($entreprise as $entreprise) : ?>
                                <option value="<?php echo $entreprise['nom_entreprise']?>"><?php echo $entreprise['nom_entreprise']?></option>
                            <?php  endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="niveau_etude" class="control-label">Niveau d'étude</label>
                        <select class="form-control" name="niveau_etude" id="niveau_etude">
                          <option value="">Any</option>
                      <?php foreach ($niveau as $niveau) : ?>
                          <option value="<?php echo $niveau['niveau_etude']?>"><?php echo $niveau['niveau_etude']?></option>
                      <?php  endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="duree" class="control-label">Durée</label>
                        <select class="form-control" name="duree" id="duree">
                          <option value="">Any</option>
                      <?php foreach ($duree as $duree) : ?>
                          <option value="<?php echo $duree['duree']?>"><?php echo $duree['duree']?></option>
                      <?php  endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ville" class="control-label">Ville</label>
                        <select class="form-control" name="ville" id="ville">
                          <option value="">Any</option>
                      <?php foreach ($entreprise as $ville) : ?>
                          <option value="<?php echo $ville['ville']?>"><?php echo $ville['ville']?></option>
                      <?php  endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txt" class="control-label">Mot clé</label>
                        <input type="text" name="txt" class="form-control" id="txt" placeholder="Mot clé">
                    </div>
              <div class="text-center">
                <button class="btn btn-danger"><span class="glyphicon glyphicon-search"></span> Valider</button>
              </div>
               </form>
            </div>
        </div>
        <!-- fin Filtre -->

        <div class="col-lg-8 col-md-10 mx-auto" id="offres">
          <?php if (empty($offre_stage)) {?>
          <h2 class="text-center">Aucune offre ne correspond à ces critères</h2>
        <?php }?>
            <?php foreach($offre_stage as $offre) : ?>
            <div class="post-preview">
                <a href="<?php echo site_url('/offre/'.$offre['id']);?>">
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
