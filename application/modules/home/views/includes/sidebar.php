<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>

            <ul class="nav side-menu">

                  <li>
                    <a href="<?php echo site_url('home'); ?>">
                    <i class="fa fa-home"></i> Acceuil</a>
                  </li>

                      <?php //if($this->session->userdata("role_libelle") != 'Boss') { ?>

                  <li>
                    <a><i class="fa fa-book"></i> Note <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('vehicule'); ?>">Véhicule</a></li>
                      <li><a href="<?php echo site_url('garage'); ?>">Garage</a></li>
                      <li><a href="<?php echo site_url('service'); ?>">Service</a></li>
                    </ul>
                  </li>              
                  <li><a><i class="fa fa-calendar-o"></i> Evenement <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo site_url('travaux'); ?>">
                          <i class="fa fa-cogs"></i>Travaux </a>
                      </li>
                      <li>
                        <a href="<?php echo site_url('evenement'); ?>">
                          <i class="fa fa-bell-o"></i>Evenement à venir</a>
                      </li>
                      <li>
                          <a href="<?php echo site_url('statistique'); ?>">
                          <i class="fa fa-line-chart"></i> Statistique</a>
                      </li>
                    </ul>
                  </li>

                <?php //} else { ?>
                 
                <?php //} ?>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>