
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
								<?php foreach($infoedit as $u){ ?>
								<form action="<?php echo base_url('Admin/aksi_insertfrmclm'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<input type="hidden" name="id" value="<?php echo $u->id_claim ?>">
										<input type="hidden" name="judul" value="<?php echo $u->judul ?>">
										<input type="hidden" name="bhs" value="<?php echo $u->bahasa ?>">
								
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm"></label>
										  <div class="col-sm-10">
										  
											 <img src="<?= base_url('assets/images/klaim/').$u->image; ?>" alt="flow<?= $u->point; ?>" height="150" data-bs-toggle="tooltip" data-bs-placement="top" title="Diharuskan upload gambar baru uk. 750 x 473 pixel">									 
											 
										  </div>
										</div>
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm" data-bs-toggle="tooltip" data-bs-placement="top" title="Diharuskan upload gambar baru uk. 750 x 473 pixel">Upload Gambar Baru</label>
										  <div class="col-sm-10">

											<input class="form-control" name="berkas" type="file" data-bs-toggle="tooltip" data-bs-placement="top" title="Diharuskan upload gambar baru uk. 750 x 473 pixel" />
											 
											 
										  </div>
										</div>
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Title</label>
										  <div class="col-sm-10">
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="col-form-label-sm" name="point" value="<?php echo $u->point ?>" />
										  </div>
										</div>
																
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Isi Konten</label>
										  <div class="col-sm-10">
											<div class="min-vh-30">
											<textarea class="tinymce d-none" name="isi" id="default"><?php echo $u->isi_kontak ?></textarea>
											</div>
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