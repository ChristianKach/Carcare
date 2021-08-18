  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Vehicule </h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($vehicule)) { ?>
                        <h2>Ajouter un vehicule</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $vehicule->vehicule_nom; ?></h2>
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


                    <?php if(!isset($vehicule)) { ?>
                        <form id="form_vehicule" method="post" action="<?php echo site_url('vehicule/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_vehicule" 
                        method="post" action="<?php echo site_url('vehicule/update') . '/' . $vehicule_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                   

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vehicule_nom">
                         Vehicule : <span class="required">*</span> 
                        </label>
                        <?php echo form_error('vehicule_nom', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($vehicule)) echo $vehicule->vehicule_nom; ?>" 
                           placeholder="Entrer le nom du vehicule" name="vehicule_nom" id="vehicule_nom" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vehicule_marque">
                         Marque : <span class="required">*</span> 
                        </label>
                        <?php echo form_error('vehicule_marque', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($vehicule)) echo $vehicule->vehicule_marque; ?>" 
                           placeholder="Honda, Toyota..." name="vehicule_marque" id="vehicule_marque" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vehicule_modele">
                         Modele : <span class="required">*</span> 
                        </label>
                        <?php echo form_error('vehicule_modele', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($vehicule)) echo $vehicule->vehicule_modele; ?>" 
                           placeholder="Crv, berling,4X4 " name="vehicule_modele" id="vehicule_modele" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vehicule_annee">
                         Annee : <span class="required">*</span> 
                        </label>
                        <?php echo form_error('vehicule_annee', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($vehicule)) echo $vehicule->vehicule_annee; ?>" 
                           placeholder="2010, 2015, ..." name="vehicule_annee" id="vehicule_annee" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($vehicule)) { ?>
                          <input type="hidden" name="vehicule_id" value="<?php echo $vehicule->vehicule_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_vehicule').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Vehicule </h2>
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
                        <th> Vehicule </th>
                        <th> Marque </th>
                        <th> Modele </th>
                        <th> Année </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($vehicules as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->vehicule_id; ?>">
                              
                          </td>
                          
                          <td><?php echo truncate($p->vehicule_nom, 20); ?></td>
                          <td><?php echo truncate($p->vehicule_marque, 20); ?></td>
                          <td><?php echo truncate($p->vehicule_modele, 20); ?></td>
                          <td><?php echo truncate($p->vehicule_annee, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>vehicule/update/<?php echo $p->vehicule_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->vehicule_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
                           </center>
                          </td>
                      </tr>
                          <?php } ?>
                          
                      </tbody>
                    </table>
                    <br/>
                    </div>
                    </div>
                   </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

        
        <!-- /page content -->


        