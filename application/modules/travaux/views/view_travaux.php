  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Travaux </h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($travaux)) { ?>
                        <h2>Ajouter un travaux</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $travaux->travaux_libelle; ?></h2>
                    <?php } ?>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link">
                          <i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content row">
                    <br />

                    <div class="col-lg-12">
                        <?php if($this->session->flashdata('add')) {?>
                          <div class="alert alert-success" role="alert" id="add">
                        <?php echo $this->session->flashdata('add'); ?>
                       </div>
                        <?php }?>
                        <?php if($this->session->flashdata('delete')){?>
                          <div class="alert alert-success" role="alert" id="delete">
                        <?php echo $this->session->flashdata('delete'); ?>
                       </div>
                        <?php }?>

                        <?php if($this->session->flashdata('update')){?>
                          <div class="alert alert-success" role="alert" id="update">
                        <?php echo $this->session->flashdata('update'); ?>
                       </div>
                        <?php }?>
                    </div>


                    <?php if(!isset($travaux)) { ?>
                        <form id="form_travaux" method="post" action="<?php echo site_url('travaux/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_travaux" 
                        method="post" action="<?php echo site_url('travaux/update') . '/' . $travaux_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                   

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="travaux_libelle">
                         Tache <span class="required">*</span> 
                        </label>
                        <?php echo form_error('travaux_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($travaux)) echo $travaux->travaux_libelle; ?>" 
                           placeholder="Nom de la tache" name="travaux_libelle" id="travaux_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vehicule_id">
                        Vehicule <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="vehicule_id" name="vehicule_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($vehicules as $p) {
                                    echo '<option value="'.$p->vehicule_id.'">'.$p->vehicule_nom.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="garage_id">
                        Garage <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="garage_id" name="garage_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($garages as $p) {
                                    echo '<option value="'.$p->garage_id.'">'.$p->garage_nom.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>


                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_id">
                        Service <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="service_id" name="service_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($services as $p) {
                                    echo '<option value="'.$p->service_id.'">'.$p->service_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="travaux_date">
                         Date <span class="required">*</span> 
                        </label>
                        <?php echo form_error('travaux_date', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="date" 
                          value="<?php
                           if(isset($travaux)) echo $travaux->travaux_date; ?>" 
                           placeholder="Nom de la tache" name="travaux_date" id="travaux_date" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="travaux_info">
                         Information <span class="required">*</span> 
                        </label>
                        <?php echo form_error('travaux_info', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($travaux)) echo $travaux->travaux_info; ?>" 
                           placeholder="Nom de la tache" name="travaux_info" id="travaux_info" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="travaux_cout">
                         Coût <span class="required">*</span> 
                        </label>
                        <?php echo form_error('travaux_cout', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" step = "any"
                          value="<?php
                           if(isset($travaux)) echo $travaux->travaux_cout; ?>" 
                           placeholder="coût des travaux" name="travaux_cout" id="travaux_cout" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($travaux)) { ?>
                          <input type="hidden" name="travaux_id" value="<?php echo $travaux->travaux_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_travaux').reset();" class="btn btn-primary">Annuler</button>
                          <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-12 col-xs-12">

                  <div class="x_panel">
                  <div class="x_title">
                    <h2>Travaux </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="table_data" aria-describedby="datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer">

                      <thead>
                        <tr>
                        <th>
                          
                              <input type="checkbox" id="check_all">
                          
                        </th>
                        <th> Tache </th>
                        <th> Véhicule </th>
                        <th> Garage </th>
                        <th> Service </th>
                        <th> Date </th>
                        <th> Infos </th>
                        <th> Coût </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($travauxs as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->travaux_id; ?>">
                              
                          </td>
                          
                          <td><?php echo truncate($p->travaux_libelle, 20); ?></td>
                          <td>
                              <?php
                                 $vehicule = $this->model_vehicule->getById($p->vehicule_id);
                                 if($vehicule) { 
                                     echo truncate($vehicule[0]->vehicule_nom, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td>
                              <?php
                                 $garage = $this->model_garage->getById($p->garage_id);
                                 if($garage) { 
                                     echo truncate($garage[0]->garage_nom, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td>
                              <?php
                                 $service = $this->model_service->getById($p->service_id);
                                 if($service) { 
                                     echo truncate($service[0]->service_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td><?php echo truncate($p->travaux_date, 20); ?></td>
                          <td><?php echo truncate($p->travaux_info, 20); ?></td>
                          <td><?php echo truncate($p->travaux_cout, 20).' $'; ?></td>

                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>travaux/update/<?php echo $p->travaux_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->travaux_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
                           </center>
                          </td>
                      </tr>
                          <?php } ?>
                          
                      </tbody>
                    </table>
                    <br/><br/><br/><br/>

                    </div>
                    </div>
                   </div>
                  </div>
                </div>



              </div>

          </div>
        </div>

        
        <!-- /page content -->


        