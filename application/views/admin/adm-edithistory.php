
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <?php $this->load->view('admin/include/adm-head');?>
	<style>
		.tox{
		height: 300px !important;
		}
		
		div.toggle-icon-wrapper{
		display: none !important;
		}

		.navbar-vertical .navbar-expand-xl .navbar-vertical-toggle{
		display: none !important;	
		}


		@media only screen and (min-width: 500px) {
			div.toggle-icon-wrapper{
			display:block !important;
			}
			.navbar-vertical .navbar-expand-xl .navbar-vertical-toggle{
			display: block !important;	
			}
			
		}


			
	</style>
	
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          // var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          // if (isFluid) {
            // var container = document.querySelector('[data-layout]');
            // container.classList.remove('container');
            // container.classList.add('container-fluid');
          // }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          
        <?php $this->load->view('admin/include/adm-logo');?>  
        <?php $this->load->view('admin/include/adm-leftmenu');?>  
		
        </nav>
        <div class="content">
		<?php $this->load->view('admin/include/adm-topmenu');?>
		
		<div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(<?=base_url(); ?>adminassets/img/icons/spot-illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <h3><?= $title; ?></h3>
				  <hr/>
                  
					<div>
					<!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
					<?php if ($this->session->flashdata('message')) :
						echo $this->session->flashdata('message');
					endif; ?>
					</div>
					
					<div class="container">
								<?php foreach($historyedit as $u){
										$lang = $u->bahasa;
										if($lang == 'IDN'){
											$bhs = 'INGGRIS';
										}
										else if($lang == 'ENG'){
											$bhs = 'INDONESIA';
										}
										else{
											$bhs = '-';
										}


									?>
								<form action="<?php echo base_url(). 'admin/updatehistory'; ?>" method="post">
									<div class="row">
									
										<input type="hidden" name="id" value="<?php echo $u->id_history ?>">
										<input type="hidden" name="bhs" value="<?php echo $u->bahasa ?>">
								
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Bahasa</label>
										  <div class="col-sm-10">
											<b><?php echo $bhs; ?></b>
										  </div>
										</div>
										
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Title</label>
										  <div class="col-sm-10">
											<input class="form-control form-control-sm" id="colFormLabelSm" type="text" placeholder="col-form-label-sm" name="judul" value="<?php echo $u->title ?>" />
										  </div>
										</div>
										
										
																
										<div class="row mb-3">
										  <label class="col-sm-2 col-form-label col-form-label-sm" for="colFormLabelSm">Info Kontak</label>
										  <div class="col-sm-10">
											<div class="min-vh-60">
											<textarea class="tinymce d-none" rows="5" name="kontak" id="default"><?php echo $u->isi ?></textarea>
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
		  selector: 'textarea',
		  menubar: true,
			menu: {
			file: { title: 'File', items: 'preview' },
			edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
			view: { title: 'View', items: 'visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
			
			format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
			tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
			table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },

			},

		  
		  powerpaste_word_import: 'clean',
		  powerpaste_html_import: 'clean',
		  branding: false,
		  statusbar: false,
		});

  
	</script>
	
	 <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	 <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	 
	 <script>
		$(document).ready(function () {
			$('#example').DataTable({
				order: [[0, 'desc']],
			});
		});
	</script>
	
	<script type="text/javascript">			
	var timeout = 4000;
	$('.hide-it').delay(timeout).fadeOut(300);
	</script>
	


	
	

  </body>

</html>