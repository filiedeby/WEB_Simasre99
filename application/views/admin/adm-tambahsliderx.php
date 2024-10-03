
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
								
								<form action="<?php echo base_url('Admin/simpansliderx'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
								
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="langbhs">Pilih Bahasa</label>
										  <div class="col-sm-10">
										  	
											<div class="form-check form-check-inline">
											  <input class="form-check-input" id="inlineRadio1" type="radio" name="bhs" value="IDN" checked=""/>
											  <label class="form-check-label" for="inlineRadio1">Bahasa Inggris</label>
											</div>
											<div class="form-check form-check-inline">
											  <input class="form-check-input" id="inlineRadio2" type="radio" name="bhs" value="ENG" />
											  <label class="form-check-label" for="inlineRadio2">Bahasa Indonesia</label>
											</div>
											
											
										  </div>
										</div>
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm" data-bs-toggle="tooltip" data-bs-placement="top" title="Diharuskan upload gambar uk. 1360 x 503 pixel">Upload Gambar Slider</label>
										  <div class="col-sm-10">

											<input class="form-control" type="file" name="berkasdata" data-bs-toggle="tooltip" data-bs-placement="top" title="Diharuskan upload gambar uk. 1360 x 503 pixel" required />
											 
											 
										  </div>
										</div>
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Title Kecil</label>
										  <div class="col-sm-10">
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="title kecil" name="isi1" value="" />
										  </div>
										</div>
																
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Title Besar</label>
										  <div class="col-sm-10">
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="title besar" name="isi2" value="" />
										  </div>
										</div>
																
										

										<div class="row mb-3">
										  <div class="col-sm-2"></div>
										  <div class="col-sm-10 d-grid gap-2"> 
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
    <?php $this->load->view('admin/include/adm-javascriptdefault'); ?>
	<script src="<?= base_url(); ?>adminassets/vendors/tinymce/tinymce.min.js"></script>
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