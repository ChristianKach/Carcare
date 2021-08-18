<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Employé </h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($employe)) { ?>
                        <h2>Ajouter un employe</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $employe->employe_nom; ?></h2>
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


                    <?php if(!isset($employe)) { ?>
                        <form id="form_employe" method="post" action="<?php echo site_url('employe/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_employe" 
                        method="post" action="<?php echo site_url('employe/update') . '/' . $employe_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                   

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employe_nom">
                         Nom :  <span class="required">*</span> 
                        </label>
                        <?php echo form_error('employe_nom', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($employe)) echo $employe->employe_nom; ?>" 
                           placeholder="" name="employe_nom" id="employe_nom" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employe_prenom">
                         Prénom :  <span class="required">*</span> 
                        </label>
                        <?php echo form_error('employe_prenom', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($employe)) echo $employe->employe_prenom; ?>" 
                           placeholder="" name="employe_prenom" id="employe_prenom" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employe_sexe">
                         Sexe :  <span class="required">*</span> 
                        </label>
                        <?php echo form_error('employe_sexe', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($employe)) echo $employe->employe_sexe; ?>" 
                           placeholder="" name="employe_sexe" id="employe_sexe" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employe_contact">
                         Contact :  <span class="required">*</span> 
                        </label>
                        <?php echo form_error('employe_contact', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php if(isset($employe)) echo $employe->employe_contact; ?>" 
                           placeholder="" name="employe_contact" id="employe_contact" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employe_mail">
                         E-mail :  <span class="required">*</span> 
                        </label>
                        <?php echo form_error('employe_mail', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="email" value="<?php if(isset($employe)) echo $employe->employe_mail; ?>" 
                           placeholder="" name="employe_mail" id="employe_mail" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employe_birthday">
                         Birthday :  <span class="required">*</span> 
                        </label>
                        <?php echo form_error('employe_birthday', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="date" value="<?php if(isset($employe)) echo $employe->employe_birthday; ?>" 
                           placeholder="" name="employe_birthday" id="employe_birthday" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employe_localisation">
                         Localisation :  <span class="required">*</span> 
                        </label>
                        <?php echo form_error('employe_localisation', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($employe)) echo $employe->employe_localisation; ?>" 
                           placeholder="" name="employe_localisation" id="employe_localisation" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_id">
                        Service <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="service_id" name="service_id" required="required" class="form-control col-md-8 col-xs-12">
                              <?php foreach($services as $p) {
                                    echo '<option value="'.$p->service_id.'">'.$p->service_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <?php if(isset($employe)) { ?>
                          <input type="hidden" name="employe_id" value="<?php echo $employe->employe_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_employe').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Employé </h2>
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
                        <th> Nom </th>
                        <th> Prenom </th>
                        <th> Sexe </th>
                        <th> Contact </th>
                        <th> Mail </th>
                        <th> Date Naissance </th>
                        <th> Localisation </th>
                        <th> Service </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($employes as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->employe_id; ?>">
                              
                          </td>
                          
                          <td><?php echo truncate($p->employe_nom, 20); ?></td>
                          <td><?php echo truncate($p->employe_prenom, 20); ?></td>
                          <td><?php echo truncate($p->employe_sexe, 20); ?></td>
                          <td><?php echo truncate($p->employe_contact, 20); ?></td>
                          <td><?php echo truncate($p->employe_mail, 20); ?></td>
                          <td><?php echo truncate($p->employe_birthday, 20); ?></td>
                          <td><?php echo truncate($p->employe_localisation, 20); ?></td>
                          <td>
                              <?php
                                 $services = $this->model_service->getById($p->service_id);
                                 if($employes) { 
                                     echo truncate($services[0]->service_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td>
                           <center>
                            

                            <?php if(isset($employe)) { ?>
                            <a href="" type="hidden" type="hidden" name="employe_id" class="btn btn-danger btn-xs"><i class="fa fa-exclamation-circle" /></i></a>


                            <?php } else{?>
                              <a href="<?php echo site_url(); ?>employe/update/<?php echo $p->employe_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->employe_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
                            <?php } ?>
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


        