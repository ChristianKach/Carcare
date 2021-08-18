  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Evenement a venir </h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($evenement)) { ?>
                        <h2>Ajouter un evenement</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $evenement->evenement_libelle; ?></h2>
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


                    <?php if(!isset($evenement)) { ?>
                        <form id="form_evenement" method="post" action="<?php echo site_url('evenement/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_evenement" 
                        method="post" action="<?php echo site_url('evenement/update') . '/' . $evenement_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                   

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="evenement_libelle">
                         Tache <span class="required">*</span> 
                        </label>
                        <?php echo form_error('evenement_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($evenement)) echo $evenement->evenement_libelle; ?>" 
                           placeholder="Nom de la tache" name="evenement_libelle" id="evenement_libelle" required="required" class="form-control col-md-7 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="evenement_date">
                         Date <span class="required">*</span> 
                        </label>
                        <?php echo form_error('evenement_date', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="date" 
                          value="<?php
                           if(isset($evenement)) echo $evenement->evenement_date; ?>" 
                            name="evenement_date" id="evenement_date" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="evenement_heure">
                         Heure <span class="required">*</span> 
                        </label>
                        <?php echo form_error('evenement_heure', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="time"
                          value="<?php
                           if(isset($evenement)) echo $evenement->evenement_heure; ?>" 
                           placeholder="" name="evenement_heure" id="evenement_heure" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($evenement)) { ?>
                          <input type="hidden" name="evenement_id" value="<?php echo $evenement->evenement_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_evenement').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Evenement a venir </h2>
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
                        <th> Date </th>
                        <th> Heure </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($evenements as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->evenement_id; ?>">
                              
                          </td>
                          
                          <td><?php echo truncate($p->evenement_libelle, 20); ?></td>
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
                          <td><?php echo truncate($p->evenement_date, 20); ?></td>
                          <td><?php echo truncate($p->evenement_heure, 20); ?></td>

                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>evenement/update/<?php echo $p->evenement_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-id="<?php echo $p->evenement_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i></a>
                            <a href="<?php echo site_url(); ?>evenement/view/<?php echo $p->evenement_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
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


        