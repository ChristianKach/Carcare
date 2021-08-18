<center><div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
				      <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b style="color:#20804b;">Evenement du  <span style="color:red"><?php echo ucfirst($evenements->evenement_date);?></span> a venir</b> </h2> 
                    <div class="clearfix"></div>
                  </div>
                  <?php foreach($evenement as $p) { 

                          $vehicule = $this->model_vehicule->getById($p->vehicule_id);
                          $v = $vehicule[0]->vehicule_nom;
                          $garage = $this->model_garage->getById($p->garage_id);
                          $g = $garage[0]->garage_nom;
                        }
                          ?>
                  <div class="x_content">

                    <table class="table table-striped jambo_table bulk_action" >
                      <thead>
                        <tr>
                          <th>LIBELLE</th>
                          <th>VALEUR</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tache</td>
                          <td>
                            <?php echo ucfirst($evenements->evenement_libelle);?>
                          </td>
                        </tr>
                        <tr>
                          <td>Véhicule</td>
                          <td>
                            <?php
                                 if($evenement) { 
                                  echo truncate($v, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Garage</td>
                          <td>
                            <?php
                                 if($evenement) { 
                                  echo truncate($g, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Date du rendez-vous</td>
                          <td>
                            <?php echo ucfirst($evenements->evenement_date);?>
                          </td>
                        </tr>
                        <tr>
                          <td>Heure</td>
                          <td>
                            <?php echo ucfirst($evenements->evenement_heure);?>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              <center>
                <a href="<?php echo site_url('home'); ?>"class="btn btn-success"><i class="fa fa-home"></i> Accueil</a>
                <a href="<?php echo site_url('evenement'); ?>" data-id="" class=" btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
               <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
               </center>
              </div>
			</div>
		</div>
	</div>
</div>