  <style type="text/css">
    .couleur {
      color: green;
      font-weight: bold;
      background-color: #F0FA6F;
    }
    .total {
      color: green;
      font-weight: bold;
      background-color: #FBD5C8;
    }
    .span{
      color: green;
      font-weight: bold;
      background-color: #0B2FE8;
    }
    em{
      color: #0B2FE8;
    }
  }
</style>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Statistique Carcare!</h3>
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
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div class="x_panel">
          <div class="x_title">
            <h2>Evenement a venir </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <?php  foreach ($evenements as $p) { ?>
              <div class="col-md-55">
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                  </button>
                  <center><h4><strong><span class="badge badge-pull badge-success">Alert! <?php   echo ucfirst($p->evenement_libelle);?></span></strong><br>
                    votre rendez-vous du <em><b>
                     <?php   echo ucfirst($p->evenement_date);?> 
                   </b></em>
                   en approche il vous reste 1 jour .<br>
                   <a href="<?php echo site_url(); ?>evenement/view/<?php echo $p->evenement_id; ?> 
                   "><i class="fa fa-eye" style="color: yellow"></i>
                 </h4></center>
               </div>
             </div>
           <?php  }  ?>
           <br/><br/>

         </div>
         <div class="x_content">

            <?php  foreach ($event as $t) { ?>
              <div class="col-md-55">
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                  </button>
                  <center><h4><strong><span class="badge badge-pull badge-success">Alert! <?php   echo ucfirst($t->evenement_libelle);?></span></strong><br>
                    votre rendez-vous du <em><b>
                     <?php   
                          if (!$t->evenement_heure) {
                            echo "votre rendez-vous est dans une heure";
                          }
                          else
                            echo"Désole";
                     echo ucfirst($t->evenement_heure);?> 
                   </b></em>
                   en approche il vous reste 1 heure.<br>
                   <?php   echo "Bonsoir Jacque";?> 
                   <a href="<?php echo site_url(); ?>evenement/view/<?php echo $t->evenement_id; ?> 
                   "><i class="fa fa-eye" style="color: yellow"></i>
                 </h4></center>
               </div>
             </div>
           <?php  }  ?>
           <br/><br/>

         </div>
       </div>
     </div>
   </div>
   <div class="row">
    <div class="col-md-12 col-xs-12">

      <div class="x_panel">
        <div class="x_title">
          <h2>Coût total des travaux par véhicule </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
         <?php  foreach ($vehicule_noms as $p ) {

          ?>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title_center">
                <h2><b style="color:#d46c1e;"><center>Coût total des travaux sur le véhicule <?php echo $p->vehicule_nom ?></center></b></h2>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="x_content">
                    <table class="table table-striped jambo_table bulk_action" >
                      <thead>
                        <tr>
                          <th>Type de travail fait</th>
                          <th>Garage</th>
                          <th>Date</th>
                          <th>Coût</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $travaux = $this->model_travaux->getSameAll($p->vehicule_nom);

                        $total = 0;
                        foreach ($travaux as $t) {
                          $total += $t->travaux_cout; 
                          $cout_total += $t->travaux_cout;
                          ?>

                          <tr>
                            <td>
                              <?php echo ucfirst($t->travaux_libelle);?>
                            </td>
                            <td>
                              <?php
                              $garage = $this->model_garage->getById($t->garage_id);
                              if($garage) { 
                               echo truncate($garage[0]->garage_nom, 20);
                             } else {
                              echo '';
                            }
                            ?> 
                          </td>
                          <td>
                            <?php echo ucfirst($t->travaux_date);?>
                          </td>
                          <td>
                            <?php echo ucfirst(number_format($t->travaux_cout,2, ".", " ")).' $';?>
                          </td>
                        </tr>
                      <?php } ?>
                      <td class="couleur"></td>
                      <td class="couleur"></td>
                      <td class="couleur"><h2>Coût total</h2></td>
                      <td class="couleur">
                        <h2><b><?php echo ucfirst(number_format($total,2, ".", " ")).' $';?></b></h2>
                      </td>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Coût total de tous les travaux sur les véhicules </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="x_content">
                <table class="table table-striped jambo_table bulk_action" >
                  <thead>
                    <tr>
                      <th><center>Coût Total des travaux</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $travaux = $this->model_travaux->getSameAll($p->vehicule_nom);

                    $total = 0;
                    foreach ($travaux as $t) {
                      $total += $t->travaux_cout; 
                      $cout_total += $t->travaux_cout;
                    }
                    ?>
                    <td class="total">
                      <h1><b><center><?php echo ucfirst(number_format($cout_total,2, ".", " ")).' $';?></center></b></h1>
                    </td>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- /page content -->