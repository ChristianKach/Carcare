<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion | CarCare</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <div class="col-lg-12">
              </div>
              
            <a href="<?php echo site_url('home'); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.jpg" /></a>

            <form id="form_client" method="post" action="<?php echo site_url('client/save'); ?>" data-parsley-validate >
              <h1>Création de compte</h1>

              <div>
                 <input id="client_nom" type="text" name="client_nom" value="" class="form-control" placeholder="Nom" required="" />
                 <?php echo form_error('client_nom', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                 <input id="client_prenom" type="text" name="client_prenom" value="" class="form-control" placeholder="Prenom" required="" />
                 <?php echo form_error('client_prenom', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                 <input id="client_email" type="email" name="client_email" value="" class="form-control" placeholder="Email: exemple@gmail.com" required="" />
                 <?php echo form_error('client_email', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                 <input id="client_adresse" type="text" name="client_adresse" value="" class="form-control" placeholder="Adresse" required="" />
                 <?php echo form_error('client_adresse', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                 <input id="client_username" type="text" name="client_username" value="" class="form-control" placeholder="Login" required="" />
                 <?php echo form_error('client_username', '<span style="color: red;">', '</span>'); ?>
              </div>                 
              <div>
                 <input id="user_password" type="password" name="user_password" class="form-control" placeholder="Mot de passe" required="" />
                 <?php echo form_error('user_password', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                 <input id="client_confirm_password" type="password" name="client_confirm_password" class="form-control" placeholder="confirmer mot de passe" required="" />
                 <?php echo form_error('client_confirm_password', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                 <input id="client_reponse1" type="text" name="client_reponse1" value="" class="form-control" placeholder="Quel est l'animal que tu préferes?" required="" />
                 <?php echo form_error('client_reponse1', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                 <input id="client_reponse2" type="text" name="client_reponse2" value="" class="form-control" placeholder="Quel est le nom de votre ami d'enfance" required="" />
                 <?php echo form_error('client_reponse2', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                 <input id="client_reponse3" type="text" name="client_reponse3" value="" class="form-control" placeholder="Qu'est ce que tu aimais faire quand tu étais enfant?" required="" />
                 <?php echo form_error('client_reponse3', '<span style="color: red;">', '</span>'); ?>
              </div>
              <div>
                <button style="float:right;" type="submit" class="btn btn-success">Enregistrer</button>
                <button style="float:left;" type="button" onclick="document.getElementById('form_client').reset();" class="btn btn-primary">Annuler</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />
              </div>
                <div class="clearfix"></div>
                <div>
                  <h1><i class="fa fa-home"></i> CarCare!</h1>
                  <p>©2021 All Rights Reserved. Propulsé par <a href="">Team carcare</a></p>
                </div>
            </form>
          </section>
            
              </div>
        </div>
      </div>
    </div>
  </body>
</html>
