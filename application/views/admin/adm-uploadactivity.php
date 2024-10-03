
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php $this->load->view('admin/include/adm-head');?>
	<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
	<script src="<?= base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap CSS -->
		
    <!-- Include Summernote CSS -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">-->
    <link href="<?= base_url(); ?>assets/css/summernote-bs4.min.css" rel="stylesheet">
	
 </head>
 
  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">

        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          
        <?php $this->load->view('admin/include/adm-logo');?>  
        <?php $this->load->view('admin/include/adm-leftmenu');?>  
		
        </nav>
        <div class="content">
		<?php $this->load->view('admin/include/adm-topmenu');?>
		
		<div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(<?= base_url(); ?>adminassets/img/icons/spot-illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <h3><?= $title; ?></h3>
				  <hr/>
				  
				 
                  
					<div class="hide-it">
					<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
					<?php if ($this->session->flashdata('message')) :
						echo $this->session->flashdata('message');
					endif; ?>
					</div>
					
					<div class="container">
								<?php foreach($c_activity as $u){ ?>
								<form action="<?php echo base_url('Admin/aksi_insertactivity'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<input type="hidden" name="id" value="<?php echo $u->id ?>" readonly>
										<input type="hidden" name="bhs" value="<?php echo $u->bahasa ?>" readonly>

								
										
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Title</label>
										  <div class="col-sm-10">
											
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="title contactinfo" name="title" value="<?php echo $u->title ?>" />
										  </div>
						
										</div>
										
										
										<div class="row mb-3">
							
										  										  
										<label class="col-sm-2 col-form-label col-form-label-sm" for="summernote">Activity Data</label>
											<div class="col-sm-10">
												<textarea id="summernote" class="form-control" name="activity">

												<?php
												$activity =  $u->activity; 
												$koversi = bbcode_to_html($activity);
												echo $koversi;
												?>
												</textarea>
											</div>
										</div>
													
										

										<div class="row mb-3">
										  <div class="col-sm-2"></div>
										 <div class="col-sm-3 d-grid gap-2"> 
										   <a class="btn btn-outline-primary me-1 mb-1" type="icon" href="<?= base_url('Admin/mn4c'); ?>">Kembali</a>
										   </div>
											
											<div class="col-sm-7 d-grid gap-2">  
											<button class="btn btn-outline-danger me-1 mb-1" type="submit" value="Simpan">Simpan</button>									
										  </div>
										</div>

									</div>
								</form>	
								<?php } ?>
					</div>
					
                </div>
              </div>
            </div>
          </div>
		  
		  
		  




		  
		  
         
		  
		  
          <footer class="footer">
            <?php $this->load->view('admin/include/footer');?>
          </footer>
        </div>
        
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    
 <!-- Include Bootstrap JS and Popper.js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--
    <script src="<?= base_url(); ?>assets/js/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap3.min.js"></script>
-->
    <!-- Include Summernote JS -->
	
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!--
    <script src="<?= base_url(); ?>assets/js/summernote-bs4.min.js"></script>
-->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300, // Set the height of the editor
                tabsize: 3,
                //focus: true // Set focus to the editor after loading
            });
        });
    </script>


 <?php $this->load->view('admin/include/adm-javascriptdefault'); ?>
	
 <?php $this->load->view('admin/include/adm-custom');?>
	
	
	<script type="text/javascript">			
		var timeout = 4000;
		$('.hide-it').delay(timeout).fadeOut(300);
	</script>
	

	
</body>
</html>