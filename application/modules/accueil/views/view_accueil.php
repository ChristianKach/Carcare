<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Accueil | CarCare</title>
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
              
            <a href="<?php echo site_url('home'); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.jpg" /></a>
              <h1>Bienvenu CarCare</h1>

              <a href="<?php echo site_url('user'); ?>"><button>Se connecter</button></a>
              <a href="<?php echo site_url('client'); ?>"><button>Créer un compte</button></a>

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
          </section>
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
