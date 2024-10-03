
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
				  <div align="right" style="padding-right:70px;">
				  <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#error-modal">Code Icon</button>
				  </div>
				  <hr/>
                  
					<div class="hide-it">
					<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
					<?php if ($this->session->flashdata('message')) :
						echo $this->session->flashdata('message');
					endif; ?>
					</div>
					
					<div class="container">
								<?php foreach($c_iconpro as $u){ ?>
								<form action="<?php echo base_url('Admin/aksi_inserticonpro'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<input type="hidden" name="id" value="<?php echo $u->id ?>">
										<input type="hidden" name="bhs" value="<?php echo $u->bahasa ?>">
								
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Title</label>
										  <div class="col-sm-10">
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="title" name="title" value="<?php echo $u->title ?>" />
										  </div>
										</div>
										  
										  
									
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Code Icon</label>
										  <div class="col-sm-4">
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="paste code icon disini" name="codeico" data-bs-toggle="tooltip" data-bs-placement="top" title='ambil code nya di tombol "code icon"' value="<?php echo $u->icon ?>" />
										  </div>
										  
										   <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Code Url</label>
										  <div class="col-sm-4">
											
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="" name="urlicon" data-bs-toggle="tooltip" data-bs-placement="top" title='tidak boleh ada spasi dan hanya dibuat 1 kata saja, misal nya "marinecargo"' value="<?php echo $u->url ?>" />
											
										  </div>
										</div>

																
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Content</label>
										  <div class="col-sm-10">
											<div class="min-vh-60">
											<textarea class="tinymce d-none" rows="5" name="isi" id="default"><?php echo $u->isi ?></textarea>
											</div>
										  </div>
										</div>
										
										
																
										

										<div class="row mb-3">
										  <div class="col-sm-2"></div>
										  
										   <div class="col-sm-3 d-grid gap-2"> 
										   <a class="btn btn-outline-primary me-1 mb-1" type="icon" href="<?= base_url('Admin/mn1c'); ?>">cancel/Kembali</a>
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
		  
		<!--modal icon awsome-->         
		<div class="modal fade" id="error-modal" tabindex="-1" role="dialog" data-keyboard="false" tabindex="-1" aria-labelledby="scrollinglongcontentLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1024px">
			<div class="modal-content position-relative">
			  <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
				<button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body p-0">
				<div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
				  <h4 class="mb-1" id="modalExampleDemoLabel">Code icon </h4>
				  <span>(copy code ini untuk dimasukan ke inputan icon)</span>
				</div>
				<div class="p-4 pb-0">
				  
					<div class="mb-3">
					  
					  
					   <?php $this->load->view('admin/include/icon');?>
					  
					  
					</div>
				   
				 
				</div>
			  </div>
			  <div class="modal-footer">
				<button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
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
    <?php $this->load->view('admin/include/adm-javascriptdefault'); ?>
	<script src="<?= base_url(); ?>adminassets/vendors/tinymce/tinymce.min.js"></script>
	<script>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
		})

	
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