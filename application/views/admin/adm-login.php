<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php $this->load->view('admin/include/adm-head');
	// $bg = ;
	
	?>
	
	<style>
			body {
			color: #000 !important;
			direction: ltr;
			font-size: 14px;
			font-family: 'Open Sans', Arial, sans-serif;
			background-image: url("<?= base_url('assets/img/bgbg.jpg'); ?>") !important;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center top; 
			}


		</style>

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <div class="row flex-center py-6" style="margin-top:120px;"> 
          <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
								<a class="d-flex flex-center mb-4" href="<?= base_url('main'); ?>">
									<img class="me-2" src="<?= base_url(); ?>assets/images/lgsimasre.png" alt="" width="178" />
								</a>
							
								<h4 class="d-flex flex-center mb-4">PT.KBRU REINSURANCE BROKERS</h4>						
            <div class="card">
              <div class="card-body p-4 p-sm-5">
                <div class="row flex-between-center mb-2">
                  <div class="col-auto">
                    <h5>Log in</h5>
						<?php
						if($this->session->flashdata('userinvalid')):
						?>
						<div class="alert alert-danger noborder text-center weight-400 nomargin noradius alertmsg">
						<strong>
							<?php
							echo $this->session->flashdata('userinvalid');
							?>
						</strong> 
						</div>
						<?php endif; ?>	
                  </div>
                  
                </div>
                <form action="<?= base_url('admin/aksi_login'); ?>" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />


                  <div class="mb-3">
                    <input class="form-control" type="text" placeholder="username" id="username" name="username" />
                  </div>
                  <div class="mb-3">
                    <input class="form-control" type="password" placeholder="Password" id="password" name="password" />
                  </div>
                  <div class="row flex-between-center">
                    <div class="col-auto">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="basic-checkbox" checked="checked" />
                        <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
                      </div>
                    </div>
                   
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
                  </div>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

		<?php $this->load->view('admin/include/adm-javascriptdefault'); ?>


    <!-- <script src="<?= base_url(); ?>adminassets/vendors/popper/popper.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/anchorjs/anchor.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/is/is.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/fontawesome/all.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?= base_url(); ?>adminassets/vendors/list.js/list.min.js"></script>
    <script src="<?= base_url(); ?>adminassets/js/theme.js"></script> -->
	
	<!-- JAVASCRIPT FILES -->
		<script>
			window.setTimeout(function() {
				$(".alertmsg").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 2000);
		</script>

  </body>

</html>
