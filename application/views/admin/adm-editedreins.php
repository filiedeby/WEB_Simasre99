<?php
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    return;
  }
  
  

foreach ($c_ins as $row):
			
		$idtr	 	= $row['id'];
		$id_negara 	= $row['id_country'];
		$negara 	= $row['negara'];
		$asuransi	= $row['insurance'];
		$logoas		= $row['upload_ins'];
		// var_dump($row);
		
endforeach; 		
													
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php $this->load->view('admin/include/adm-head');?>
	 
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
					

								
								<form action="<?php echo base_url('Admin/simpan_reins'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="ins">Negara</label>
										  <div class="col-sm-3">
											
												<select id="dropdownjob" name="negara" class="form-control pointer select2 required">
													<option value="<?= $id_negara; ?>"><b>-- <?= $negara; ?> -- </b></option>
													
													<?php
													foreach ($c_reins as $rwjob):
													echo "<option value='".$rwjob['id_country']."'>".$rwjob['negara']."</option>";		
													endforeach; 		
													?>
												</select>
										  </div>
										  
										   <label class="col-sm-2 col-form-label col-form-label-sm" for="ins">Nama Asuransi</label>
										  <div class="col-sm-5">
											<input class="form-control form-control-sm" id="ins" type="text" placeholder="asuransi" name="insurance" value="<?= $asuransi; ?>" />
										  </div>
										</div>
										
																				
										
										<div class="row mb-3">
											<label class="col-sm-2 col-form-label col-form-label-sm" for="url">Upload Ins Logo</label>
											  
											<div class="col-sm-8">
												<input class="form-control form-control-sm" type="file" name="logo" data-bs-placement="top" >
												<span style="font-size:11px; color: red;"><i>note : untuk update, harap upload kembali logo asuransinya.</i></span>
											</div>
											
											<div class="col-sm-2">
												<img src="<?= base_url('assets/gbrupload/').$logoas; ?>" alt="<?= $asuransi; ?>" height="40">

											</div>
										  
										</div>	
										
									
										
										
									
										

										<div class="row mb-3">
										  <div class="col-sm-2"></div>
										  
										   <div class="col-sm-3 d-grid gap-2"> 
										   <a class="btn btn-outline-primary me-1 mb-1" type="icon" href="<?= base_url('Admin/mn3c'); ?>">Kembali</a>
										   </div>
											
											<div class="col-sm-7 d-grid gap-2"> 
											<button class="btn btn-outline-danger me-1 mb-1" type="submit" value="Simpan">Simpan</button>									
										  </div>
										</div>

									</div>
								</form>	
								
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
 <?php $this->load->view('admin/include/adm-custom');?>




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <?php //$this->load->view('admin/include/adm-javascriptdefault'); ?>

	<?php $this->load->view('admin/include/adm-javascriptdefault'); ?>


	<!-- <script src="../adminassets/vendors/popper/popper.min.js"></script>
    <script src="../adminassets/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../adminassets/vendors/anchorjs/anchor.min.js"></script>
    <script src="../adminassets/vendors/is/is.min.js"></script>
    <script src="../adminassets/vendors/echarts/echarts.min.js"></script>
    <script src="../adminassets/vendors/fontawesome/all.min.js"></script>
    <script src="./adminassets/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../adminassets/vendors/list.js/list.min.js"></script>
    <script src="../adminassets/js/theme.js"></script> -->
	
	<script src="../adminassets/vendors/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
		  selector: 'textarea#default',
		  menubar: false,
		  plugins: [
		 'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
			   'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
			   'powerpaste','fullscreen','formatpainter','insertdatetime','table','help','wordcount'
			 ],
		  
		  powerpaste_word_import: 'clean',
		  powerpaste_html_import: 'clean',
		  branding: false,
		  statusbar: false,
		});
	</script>
	
	<script type="text/javascript">			
		var timeout = 4000;
		$('.hide-it').delay(timeout).fadeOut(300);
	</script>
	
	

  </body>

</html>
