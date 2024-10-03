<?php

$sesdata = $this->session->userdata['data_seslogin'];
$useradm = $sesdata['username'];
$statadm = $sesdata['level']; 
// die();
?>


<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="<?= base_url(); ?>">
              <div class="d-flex align-items-center"><img class="me-2" src="<?= base_url(); ?>assets/images/logo.png" alt="" width="120" /><span class="font-sans-serif"></span>
              </div>
            </a>
            <ul class="navbar-nav align-items-center d-none d-lg-block">
              <li class="nav-item">
               | Administrator Website
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

    
              
              <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="<?= base_url(); ?>/adminassets/img/user.png" alt="" />
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                  
				  
				  <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#!">Welcome <?= $useradm; ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#!">Login as : <?= $statadm; ?></a>
                  </div>
		  
				  
				  
				  <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <a class="dropdown-item" href="<?=base_url('admin/logout'); ?>">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </nav>
