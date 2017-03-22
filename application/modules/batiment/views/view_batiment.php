<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Batiment</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Recherche...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($batiment)) { ?>
                        <h2>Ajouter un batiment</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $batiment->batiment_libelle; ?></h2>
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


                    <?php if(!isset($batiment)) { ?>
                        <form id="form_batiment" method="post" action="<?php echo site_url('batiment/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_batiment" 
                        method="post" action="<?php echo site_url('batiment/update') . '/' . $adherant_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programme_id">
                            Programme <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="programme_id" name="programme_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($programmes as $p) {
                                    if(isset($programme_id) && $p->programme_id == $programme_id)
                                        echo '<option selected="selected" value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                    else
                                      echo '<option value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batiment_libelle">
                         Batiment libellé <span class="required">*</span> 
                        </label>
                        <?php echo form_error('batiment_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($batiment)) echo $batiment->batiment_libelle; ?>" 
                           placeholder="Libellé" name="batiment_libelle" id="batiment_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batiment_number_room">
                         Nombre de salle <span class="required">*</span> 
                        </label>
                        <?php echo form_error('batiment_number_room', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" 
                          value="<?php
                           if(isset($batiment)) echo $batiment->batiment_number_room; ?>" 
                           placeholder="Nombre de salle" name="batiment_number_room" id="batiment_number_room" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($batiment)) { ?>
                          <input type="hidden" name="batiment_id" value="<?php echo $batiment->batiment_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_batiment').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Batiment</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
                           <form style="float: left;" method="post" action="<?php echo site_url('adherant/import-adherant'); ?>" id="form_import_excel" enctype="multipart/form-data">
                              
                            <span style="float: left;">Programmes</span>
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control" style="width: 250px;" id="table_programme_id" name="table_programme_id" required="required">

                                   <option value="">Tous les programmes</option>

                                   <?php foreach($programmes as $p) {

                                      if($programme_id = (int) $this->uri->segment(3)) {
                                        if($programme_id == $p->programme_id) {
                                        echo '<option selected="selected" value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                         } else {
                                            echo '<option value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                         }

                                        } else {
                                          echo '<option value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                        } 

                                   }

                                   ?>
                               </select>
                              </div>
                              
                           </form>
                           <br/>
                            
                           <a id="btn_delete_many" href="#">
                               <i class="fa fa-minus-circle" style="color: red;"></i> Supprimer
                           </a>
                  </p>

                    <table id="table_data" aria-describedby="datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer">

                      <thead>
                        <tr>
                        <th>
                          
                              <input type="checkbox" id="check_all">
                          
                        </th>
                        <th>Programme</th>
                        <th>Batiment libellé</th>
                        <th>Nombre de salle</th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($batiments as $p) { ?>       
                      <tr>
                          <td>
                              <input type="checkbox" class="check_item" value="<?php echo $p->batiment_id; ?>">
                          </td>
                          <td>
                              <?php
                                 $programme = $this->model_programme->getById($p->programme_id);
                                 if($programme) { 
                                     echo truncate($programme[0]->programme_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td><?php echo truncate($p->batiment_libelle, 20); ?></td>
                          <td><?php echo truncate($p->batiment_number_room, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>batiment/update/<?php echo $p->batiment_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->batiment_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        