 <div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Bienvenue sur l'application Carcare!</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- top tiles -->
    <div class="clearfix"></div>
    <div class="x_panel">
      <div class="x_title">
        <h2><center>Ne ratez aucune information concernant votre véhicule avec Carcare</center> </h2>
        <ul class="nav navbar-right panel_toolbox">
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-car"></i> Total Véhicules</span>
          <div class="count">
            <?php  
            $a = 0;
            foreach ($vehicule as $p) {$a += count($p->vehicule_nom);} 
            echo $a; 
            ?>  
          </div>
          <span class="count_bottom"><a href="<?php echo site_url('vehicule'); ?>">plus d'infos <i class=" fa fa-eye"></i></a></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-cogs"></i> Total Garages</span>
          <div class="count">
            <?php  
            $a = 0;
            foreach ($garage as $p) {$a += count($p->garage_nom);} 
            echo $a; 
            ?>
          </div>
          <span class="count_bottom"><a href="<?php echo site_url('garage'); ?>">plus d'infos <i class=" fa fa-eye"></i></a></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-plus-square-o"></i> Total Réparations</span>
          <div class="count green">
            <?php  
            $a = 0;
            foreach ($garage as $p) {$a += count($p->garage_nom);} 
            echo $a; 
            ?>
          </div>
          <span class="count_bottom"><a href="<?php echo site_url('garage'); ?>">plus d'infos <i class="green fa fa-eye"></i></a></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-money"></i> Depenses Total</span>
          <div class="count red">
            <?php 
              foreach ($vehicule_noms as $p ) {
                    $travaux = $this->model_travaux->getSameAll($p->vehicule_nom);

                    $total = 0;
                    foreach ($travaux as $t) {
                      $total += $t->travaux_cout; 
                      $cout_total += $t->travaux_cout;
                    }
                  }
                    echo ucfirst(number_format($cout_total,2, ".", " ")).' $';
                    ?>
          </div>
          <span class="count_bottom"><a href="<?php echo site_url('statistique'); ?>">plus d'infos <i class="red fa fa-eye"></i></a></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-line-chart"></i> Statistiques</span>
          <div class="count"><i class="blue fa fa-line-chart"></i></div>
          <span class="count_bottom"><a href="<?php echo site_url('statistique'); ?>">plus d'infos <i class="blue fa fa-eye"></i></a></span>
        </div>
      </div>
    </div>
    <!-- /top tiles -->
    <div class="clearfix"></div>
    <div class="x_panel">
      <div class="x_title">
        <h2><center>Evenement prévu</center> </h2>
        <ul class="nav navbar-right panel_toolbox">
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <?php  foreach ($evenements as $p) { ?>
        <div class="col-md-55">
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <center><h4><strong><span class="badge badge-pull badge-success">Alert! <?php   echo ucfirst($p->evenement_libelle);?></span></strong><br>
              votre rendez-vous du <em style="color:yellow"><b>
               <?php   echo ucfirst($p->evenement_date);?> 
             </b></em>
             en approche il vous reste 1 jour .<br>
             <a href="<?php echo site_url(); ?>evenement/view/<?php echo $p->evenement_id; ?> 
             "><i class="fa fa-eye" style="color: yellow"></i>
           </h4></center>
         </div>
       </div>
     <?php  }  ?>
   </div>
 </div>
</div>
</div>
        <!-- /page content -->