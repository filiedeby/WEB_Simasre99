<div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">

					<a class="nav-link" href="<?= base_url('admin/beranda'); ?>" aria-expanded="false">
					<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fa fa-book"></span></span><span class="nav-link-text ps-1">BERANDA</span>
					</div>
					</a>

                </li>
				
				
				
				
				
				
            <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Menu
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>
                  
                  
                 <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fa fa-chevron-right"></span></span><span class="nav-link-text ps-1">Home</span>
                    </div>
                  </a>
                  <ul class="nav collapse false" id="events">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn1a'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Modul History</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn1b'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Slider</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn1c'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Icon Product</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
					
					
                  </ul>
                  
				  
				  
				  <a class="nav-link dropdown-indicator" href="#Solusi" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="Solusi">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fa fa-chevron-right"></span></span><span class="nav-link-text ps-1">Service Excellent</span>
                    </div>
                  </a>
                  <ul class="nav collapse false" id="Solusi">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn3a'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">COB</span>
                        </div>
                      </a>
                    </li>
					
					 <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn3b'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Supported Cedant</span>
                        </div>
                      </a>
                    </li>
					<li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn3c'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Supporting Reinsurance</span>
                        </div>
                      </a>
                    </li>
				  </ul>
				  
				  <a class="nav-link dropdown-indicator" href="#aboutus" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="aboutus">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fa fa-chevron-right"></span></span><span class="nav-link-text ps-1">About Us</span>
                    </div>
                  </a>
				  
                  <ul class="nav collapse false" id="aboutus">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn4a'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Visi & Misi</span>
                        </div>
                      </a>
                    </li>
					
					<li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn4b'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Team</span>
                        </div>
                      </a>
                    </li>
					
					<li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn4c'); ?>" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Our Activity</span>
                        </div>
                      </a>
                    </li>
					
					
					
				  </ul>
					
				 <a class="nav-link dropdown-indicator" href="#kontak" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="kontak">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fa fa-chevron-right"></span></span><span class="nav-link-text ps-1">Contact Us</span>
                    </div>
                  </a>

					<ul class="nav collapse false" id="kontak">
					
						<li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn4f'); ?>" aria-expanded="false">
							<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lokasi MAP</span>
							</div>
						  </a>
						</li>
						
						<li class="nav-item"><a class="nav-link" href="<?= base_url('admin/mn4g'); ?>" aria-expanded="false">
							<div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lokasi Alamat</span>
							</div>
						  </a>
						</li>
					</ul>
					
				<a class="nav-link" href="<?= base_url('admin/mn5a'); ?>" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fa fa-chevron-right"></span></span><span class="nav-link-text ps-1">Gallery Photo</span>
                    </div>
                  </a>


				  
			</li>
                
								<?php 
									if ($sesdata['level'] == "Administrator"){ 
								?>
										<li class="nav-item">
											<!-- label-->
											<div class="row navbar-vertical-label-wrapper mt-3 mb-2">
												<div class="col-auto navbar-vertical-label">Checker System
												</div>
												<div class="col ps-0">
													<hr class="mb-0 navbar-vertical-divider" />
												</div>
											</div>
											<!-- parent pages-->
											<a class="nav-link" href="<?= base_url('assets/linfo'); ?>" role="button" aria-expanded="false">
												<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-rocket"></span></span><span class="nav-link-text ps-1">Check HW Server</span>
												</div>
											</a>

										</li>
								<?php
									}else{
										
									}
								?>

              </ul>
              
            </div>
          </div>
